<template>
  <main>
    <div>
      <form action="">
        <img src="../../assets/image/logo/logo.png" alt="" />
        <div>
          <div>
            <label>管理員帳號:</label>
            <input type="text" v-model="account" />
          </div>
          <div>
            <label>管理員密碼:</label>
            <input type="password" v-model="pwd" />
          </div>
          <div>
            <button type="button" @click="login()">登入</button>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
import { AudioAnalyser } from "three";

export default {
  data() {
    return {
      account: "",
      pwd: "",
    };
  },
  methods: {
    login() {
      if (this.account.length > 0) {
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        emailPattern.test(this.account);

        if (!emailPattern.test(this.account)) {
          alert("無效帳號");
          return false;
        }
      } else {
        alert("請輸入帳號");
        return false;
      }
      if (this.pwd.length <= 3) {
        alert("密碼長度不符");
        return false;
      }
      const url = `${this.$store.state.publicpath}manager_login.php`;
      let headers = {
        "Content-Type": "application/json",
        Accept: "application/json",
      };
      // let body = {
      //     account: this.account,
      //     pwd: this.pwd,
      // };
      //---------------
      let body = {
        account: this.account,
        pwd: this.pwd,
      };
      let formData = new FormData();
      formData.append("account", this.account);
      formData.append("pwd", this.pwd);
      fetch(url, {
        method: "POST",
        body: formData,
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("取得失敗");
          }
        })
        .then((json) => {
          if (json.result["ma_id"]) {
            let manager = JSON.stringify(json.result);
            document.cookie =
              "manager= " + manager + "; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
            document.location.href = `${this.$store.state.imgpublicpath}DashBoard`;
          } else {
            alert(json.result);
          }
        });
      if (localStorage["nowpage"]) {
        this.avtiveId = localStorage.getItem("nowpage");
      } else {
        localStorage.setItem("nowpage", "1-1");
      }
      if (localStorage["open"]) {
        this.open = localStorage.getItem("open");
      } else {
        localStorage.setItem("open", "1");
      }
    },
  },
  mounted() {
    const name = "manager" + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(";");

    for (let i = 0; i < cookieArray.length; i++) {
      let cookie = cookieArray[i];
      while (cookie.charAt(0) === " ") {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) === 0) {
        console.log(cookie.substring(name.length, cookie.length));
        if (cookie.substring(name.length, cookie.length)) {
          document.location.href = `${this.$store.state.publicURL}DashBoard`;
        }
      }
    }
    return "";
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
main {
  width: 100vw;
  height: 100vh;
  // background-image: linear-gradient(to bottom right, #009CA8, #FBF796);
  // background-image: linear-gradient(to bottom right, #000000, #ffffff);
  justify-content: center;
  display: flex;
  box-shadow: inset -20px -17px 20px 17px rgba(247, 0, 0, 0.2);
  padding: 20px;
  border-radius: 10px;

  div {
    form {
      background-color: rgba(255, 255, 255, 0.6);
      border-radius: 10px;
      align-items: center;
      border-radius: 10px;
      padding: 10px;
      display: block;
      color: #fff;

      img {
        display: block;
        padding: 10px;
        width: 200px;
        margin: 0 auto;
      }

      div {
        margin: 0 auto;
        text-align: center;

        div {
          align-items: center;
          margin: 10px;

          input {
            background-color: transparent;
            border: 0;
            box-shadow: 2px 4px 6px 0px #1e5289;
            border-radius: 10px;
            padding: 5px;
            margin-top: 10px;
            margin-left: 5px;
            text-align: center;
          }

          button {
            background-color: transparent;
            padding: 5px;
            border: 0;
            box-shadow: 1px 1px 3px 0px #1e5289;
            border-radius: 10px;

            &:active {
              box-shadow: inset 1px 1px 6px 0px #1e5289;
            }
          }
        }
      }
    }
  }
}
</style>

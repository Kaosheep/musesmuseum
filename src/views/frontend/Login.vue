<template>
  <div class="bgcGY cardCenter">
    <main>
      <span v-for="i in mem">{{ i.mbr_name }}123</span>   <!-- 使用者姓名 -->
      <span id="spanLogin"></span>  
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button
              :class="[a.name === '會員登入' ? 'pinkBtnLight' : 'pinkBtn']"
            >
              {{ a.name }}
            </button>
          </router-link>
        </div>
        <form @submit.prevent>
          <div class="memloginActi" v-for="i in memAllInfo">
            <label :key="i.id">{{ i.memTitColumn }}</label>
            <input
              :key="i.id"
              :type="i.type"
              :id="i.id"
              :name="i.name"
              :class="i.class"
              :placeholder="i.placeholder"
              required
            />
          </div>

          <div class="memloginActi">
            <label for="verification">驗證碼:</label>
            <div id="verification-code"></div>
            <input
              type="text"
              id="entered-code"
              class="fillInClumn"
              placeholder="輸入隨機碼"
            />
            <p id="message"></p>
          </div>
          <div class="resetPswEmail">
            <a href="#">忘記密碼</a>
          </div>

          <div class="memloginSubmit">
            <input
              type="submit"
              id="btnLogin"
              class="submitBtn"
              value="登入"
              @click="checkLoginData"
            />
            <!-- <input type="button" id="btnCancel" value="取消"> -->
          </div>
        </form>
      </div>
    </main>
  </div>
</template>

<script>
// import $ from "jquery";
import Footer from "@/components/Footer.vue";
export default {
  components: {
    Footer,
  },
  data() {
    return {
      memAllInfo: [
        {
          memTitColumn: "帳號",
          type: "text",
          id: "mbr_email",
          name: "mbr_email",
          class: "fillInClumn",
          placeholder: "帳號",
        },
        {
          memTitColumn: "密碼",
          type: "password",
          id: "mbr_psw",
          name: "mbr_psw",
          class: "fillInClumn",
          placeholder: "密碼",
        },
      ],
      memBtnLink: [
        { link: "/Home/MemberSignUp", name: "會員註冊" },
        { link: "", name: "會員登入" },
      ],
      mbr_email: "",
      mem: {},
    };
  },
  methods: {
    checkLoginData() {
      console.log("checkLoginData");

      let input = {
        mbr_email: document.getElementById("mbr_email").value,
        mbr_psw: document.getElementById("mbr_psw").value,
      };

      const data = new URLSearchParams({ mbr_email, mbr_psw });
      fetch("http://localhost/musesmuseum/public/phps/login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams(input),
      })
      .then((response) => {
        return response.json();
      })
      .then((result) => {
        console.log(this.mem)
        this.mem = result;
        this.memEmail = result.mbr_email;
        if (
          this.mem.mbr_email == document.getElementById("mbr_email").value &&
          this.mem.mbr_psw == document.getElementById("mbr_psw").value
        ) {
          window.alert("登入成功");
          this.router.push("/Home/MemberInfo");
        } else {
          window.alert("帳密錯誤");
        }

      })  
        //寫記住id
        .then(() => {
          if (this.memEmail) {
            let members = JSON.stringify(this.mem);
            document.cookie = "members= " + members + "; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
            document.location.href = "/Home/MemberInfo";
          } else {
            alert("無法獲取 mbr_email");
          }
        })
      // .then((json) => {
      //     if (json.result['mbr_email']) {
      //         let members = JSON.stringify(json.result);
      //         document.cookie = "members= " + members + "; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
      //         document.location.href = "/MemberInfo";
      //     } else {
      //         alert(json.result);
      //     }
      // })
      .catch(function (error) {
        console.log(error);
      });
    },
  },
  mounted() {
    this.router = this.$router; 
    document.body.style.height = `auto`;
    const name = "members" + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');

    for (let i = 0; i < cookieArray.length; i++) {
      let cookie = cookieArray[i];
      while (cookie.charAt(0) === ' ') {
          cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) === 0) {
          console.log(cookie.substring(name.length, cookie.length));
          if(cookie.substring(name.length, cookie.length)){
              document.location.href = "/Home/MemberInfo";
          }
      }
    }
    return "";
   
  },
};
</script>
<style scoped lang="scss">
span{
  justify-content: flex-end;
}
@include t() {
  .backGroundCard {
    height: 100%;
    min-height: 0;

    form {
      margin: 30px auto;

      button {
        margin: 5px;
      }
    }
  }
}
</style>

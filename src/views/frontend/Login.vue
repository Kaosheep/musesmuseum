<template>
  <div class="bgcGY cardCenter">
    <main>
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
          <!-- <reca></reca> -->
          <div class="memloginActi">
            <label for="verification">驗證碼:</label>
            <div id="verification-code">{{ verificationCode }}</div>
            <input
              type="text"
              id="entered-code"
              class="fillInClumn"
              placeholder="輸入隨機碼"
              v-model="enteredCode"
            />
            <p id="message">{{ message }}</p>
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
import reca from "@/components/reca.vue";

export default {
  components: {
    reca,
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
      verificationCode: '',
      enteredCode: '',
      message: '',
    };
  },
  methods: {
    generateVerificationCode() {
      this.verificationCode = Math.floor(Math.random() * 9000) + 1000;
    },
    verifyCode() {
      if (this.enteredCode === this.verificationCode.toString()) {
        this.message = '驗證成功';
      } else {
        this.message = '驗證失敗，請檢查輸入的隨機碼';
        this.generateVerificationCode(); // 重新生成隨機碼
      }
    },
    checkLoginData() {
      // 驗證
      if (this.enteredCode === this.verificationCode.toString()) {
        let input = {
          mbr_email: document.getElementById("mbr_email").value,
          mbr_psw: document.getElementById("mbr_psw").value,
        };

        const data = new URLSearchParams({ mbr_email, mbr_psw });
        fetch(`${this.$store.state.publicpath}login.php`, {
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
        this.mem = result;
        this.memEmail = result.mbr_email;
        this.memName = result.mbr_name;
        if (
          this.mem.mbr_email == document.getElementById("mbr_email").value &&
          this.mem.mbr_psw == document.getElementById("mbr_psw").value
        ) {
          window.alert("登入成功");
          document.location.href = `${this.$store.state.imgpublicpath}Home/Login`;
        } else {
          window.alert("帳密錯誤");
        }
      })  
      .then(() => {
        if (this.memEmail) {
          let members = JSON.stringify(this.mem);
          document.cookie = "members= " + members + "; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
          document.location.href = `${this.$store.state.imgpublicpath}Home/MemberInfo`;
        } else {
          alert("無法獲取 mbr_email");
        }
      })
      .then((json) => {
          if (json.result['mbr_email']) {
              let members = JSON.stringify(json.result);
              document.cookie = "members= " + members + "; expires=Thu, 01 Jan 2025 00:00:00 UTC; path=/";
              document.location.href = `${this.$store.state.imgpublicpath}Home/MemberInfo`;
          } else {
              alert(json.result);
          }
      })
      .catch(function (error) {
        console.log(error);
      });
      } else {
        // 驗證失敗
        this.message = '驗證失敗，請重新輸入驗證碼';
        this.generateVerificationCode(); // 重新產生隨機碼
      }
    },
  },
  mounted() {
    this.generateVerificationCode(); 
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
          if(cookie.substring(name.length, cookie.length)){
              // document.location.href = "/Home/MemberInfo";
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

<template>
   <div class="bg">
    <main>
           
      <div class="backGroundCard">
        
      </div>
      <div class="backGroundCardbBlue">123456789000000</div>
      <!-- <div id="lightBox" style="display: block"> -->
        <form class="memlogin_group">
          <button class="pinkBtn">
            會員註冊
          </button>
          <button class="pinkBtn">
            會員登入
          </button>
          <!-- <h1>登入</h1> -->
          <!-- <p>帳號</p> -->
          <div class="memlogin_acti">
            <label for="memId">帳號</label>
            <input
              type="text"
              id="memId"
              name="memId"
              class="fillInClumn"
              placeholder="電子郵件"
              v-model="memId"
              required
            />
          </div>
          <div class="memlogin_acti">
            <label for="memPsw">密碼</label>
            <input
              type="password"
              id="memPsw"
              name="memPsw"
              class="fillInClumn"
              placeholder="密碼"
              v-model="memPsw"
              required
            />
          </div>
          <div class="memlogin_acti">
              <label for="verification">驗證碼:</label>
              <div id="verification-code"></div>
              <input 
              type="text" 
              id="entered-code"  
              class="fillInClumn"
              placeholder="輸入隨機碼">
              <p id="message"></p>
          </div>
          <div class="resetPsw_email">
            <a href="#">忘記密碼</a>
          </div>

          <div class="memlogin_submit">
            <input
              type="button"
              id="btnLogin"
              class="submitBtn"
              value="登入"
              @click="checkLoginData"
            />
            <!-- <input type="button" id="btnCancel" value="取消"> -->
          </div>
        </form>
              <!-- </div> -->
    </main>
  </div>
</template>

<script>
import Footer from "@/components/Footer.vue";
export default {
  components: {
    Footer,
  },
  data() {
    return {
      memId: "",
      memPsw: "",
    };
  },
  methods: {
    checkLoginData() {
      if (this.memId === "test" && this.memPsw === "test") {
        window.alert("登入成功");
      } else {
        window.alert("帳密錯誤");
      }
    },
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
@import "@/assets/sass/style.scss";
// main {
//   min-height: calc(100vh - 130px);
//   margin: auto;
// }
</style>

<template>
   <div class="bg">
    <main>
           
      <div class="backGroundCard">
        
      </div>
      <div class="backGroundCardbBlue"></div>
      <!-- <div id="lightBox" style="display: block"> -->
        <form class="memloginGroup">
          <router-link :to="a.link" v-for="a in memBtnLink">
          <button :class="[a.name === '會員登入' ? 'pinkBtn' : 'pinkBtnLight']">
            {{a.name}}
          </button>
          </router-link>
          <!-- <h1>登入</h1> -->
          <!-- <p>帳號</p> -->
          <div class="memloginActi">
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
          <div class="memloginActi">
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
          <div class="memloginActi">
              <label for="verification">驗證碼:</label>
              <div id="verification-code"></div>
              <input 
              type="text" 
              id="entered-code"  
              class="fillInClumn"
              placeholder="輸入隨機碼">
              <p id="message"></p>
          </div>
          <div class="resetPswEmail">
            <a href="#">忘記密碼</a>
          </div>

          <div class="memloginSubmit">
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
      memBtnLink:[
        { link:"/MemberSignUp", name:"會員註冊" },
        { link:"", name:"會員登入" },
      ]
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
.pinkBtnLight{
  width: 100px;
  height: 37px;
  padding: 5px 10px;
  margin: 5px 0;
  font-size: 16px;
  text-align: center;
  border: 1px solid #EB5F86;
  border-radius: 4px;
  color: #fff;
  background-color: #EB5F86;
}
</style>

<template>
  <main>
    <div id="lightBox" style="display: block">
      <form class="memlogin_group">
        <h1>登入</h1>
        <p>立即登入，隨時收到獨家優惠</p>
        <div class="memlogin_acti">
          <input
            type="text"
            id="memId"
            name="memId"
            placeholder="&nbsp&#128231; 電子郵件 或 手機號碼"
            v-model="memId"
            required
          />
        </div>
        <div class="memlogin_acti">
          <input
            type="password"
            id="memPsw"
            name="memPsw"
            placeholder="&nbsp&#x1F513;&nbsp 密碼"
            v-model="memPsw"
            required
          />
        </div>

        <div class="resetPsw_OTP">
          <a href="#">透過簡訊 OTP 重設密碼</a>
        </div>
        <div class="resetPsw_email">
          <a href="#">透過Email 重設密碼</a>
        </div>

        <div class="memlogin_submit">
          <input
            type="button"
            id="btnLogin"
            value="登入"
            @click="checkLoginData"
          />
          <!-- <input type="button" id="btnCancel" value="取消"> -->
        </div>
      </form>
    </div>
  </main>
  <Footer></Footer>
</template>

<script>
import Footer from '/src/components/Footer.vue'
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
};
</script>
<style scoped lang="scss">
@import "../assets/sass/style.scss";
main {
  min-height: calc(100vh - 238px);
}
</style>

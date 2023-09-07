<template>
    <div class="login">
      <h1>This is an login page</h1>
    </div>
    <div id="lightBox" style="display:block">
              <form class="memlogin_group">
                  <div class="memlogin_title">
                      <div class="memlogin_title_text">登入</div>
                  </div>
                  <div class="memlogin_slogan">
                      立即登入，隨時收到獨家優惠
                  </div>
                  <div class="memlogin_acti">
                      <input type="text" id="memId" name="memId" placeholder="&nbsp&#128231; 電子郵件 或 手機號碼" required>
                  </div>
  
                  <div class="memlogin_acti">
                      <input type="password" id="memPsw" name="memPsw" placeholder="&nbsp&#x1F513;&nbsp 密碼" required>
                  </div>
                  
                  <div class="resetPsw_OTP">
                      <a href="#">透過簡訊 OTP 重設密碼</a>
                  </div>
                  <div class="resetPsw_email">
                      <a href="#">透過Email 重設密碼</a>
                  </div>
  
                  <div class="memlogin_submit">
                      <input type="button" id="btnLogin" value="登入">
                      <!-- <input type="button" id="btnCancel" value="取消"> -->
                  </div>
                  <div id="closeButton" style="font-size: 30px; color:#ccc">
                      &#9746;
                  </div>
              </form>
          </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        lightBoxVisible: false,
        spanLogin: "登入",
        memId: "",
        memPsw: "",
        isLoggedIn: false,
      };
    },
    methods: {
      showLightBox() {
        if (this.spanLogin === "登入") {
          this.lightBoxVisible = true;
        } else {
          this.memId = "";
          this.memPsw = "";
          this.memName = "";
          this.spanLogin = "登入";
          this.lightBoxVisible = false;
        }
      },
      checkLoginData() {
        if (this.memId === "test" && this.memPsw === "test") {
          window.alert("登入成功");
          this.memName = "Sara";
          this.spanLogin = "登出";
          this.lightBoxVisible = false;
        } else {
          window.alert("帳密錯誤");
        }
      },
      cancelLogin() {
        this.memId = "";
        this.memPsw = "";
        this.lightBoxVisible = false;
      },
      logout() {
        this.memId = "";
        this.memPsw = "";
        this.memName = "";
        this.spanLogin = "登入";
      },
    },
    mounted() {
      
    },
  };
  </script>
  
  <style>
  #lightBox {
      position: absolute;
      top: 35%;
      left: 50%;
      transform: translate(-50%, -50%);
  }
  .memlogin_title {
      padding-bottom: 8px;
  }
  .memlogin_title_text {
      text-align: center;
  }
  .memlogin_slogan {
      text-align: center;
      margin-bottom: 10%;
  }
  .memlogin_acti #memId {
      width: 208px;
      height: 25px;
      margin-bottom: 3%;
  }
  .memlogin_acti #memPsw {
      width: 208px;
      height: 25px;
      margin-bottom: 3%;
  }
  .resetPsw_OTP {
      margin-bottom: 3%;
      text-align: right;
  }
  .resetPsw_email {
      margin-bottom: 16%;
      text-align: right;
  }
  .memlogin_submit #btnLogin {
      width: 208px;
      height: 40px;
      color: #ad0000;
  }
  #closeButton {
      position: absolute;
      top: -5%;
      right: -40%;
      cursor: pointer;
  }
  </style>
  
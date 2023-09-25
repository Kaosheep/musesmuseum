<template>
  <div class="bgcGY cardCenter">
    <main>
      <div class="backGroundCardbBlue"></div>
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button :class="[a.name === '會員登入' ? 'pinkBtnLight' : 'pinkBtn']">
              {{ a.name }}
            </button>
          </router-link>
        </div>
        <form method="post">
          <div class="memloginActi" v-for="i in memAllInfo">
            <label :key="i.id">{{ i.memTitColumn }}</label>
            <input 
            :key="i.id" 
            :type="i.type" 
            :id="i.id" 
            :name="i.name" 
            :class="i.class" 
            :placeholder="i.placeholder"
              required />
          </div>

          <div class="memloginActi">
            <label for="verification">驗證碼:</label>
            <div id="verification-code"></div>
            <input type="text" id="entered-code" class="fillInClumn" placeholder="輸入隨機碼">
            <p id="message"></p>
          </div>
          <div class="resetPswEmail">
            <a href="#">忘記密碼</a>
          </div>

          <div class="memloginSubmit">
            <input type="button" id="btnLogin" class="submitBtn" value="登入" @click="checkLoginData" />
            <!-- <input type="button" id="btnCancel" value="取消"> -->
          </div>
        </form>
      </div>
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
      memAllInfo: [
        { memTitColumn: "帳號", type: "email", id: "memId", name: "memId", class: "fillInClumn", placeholder: "電子郵件" },
        { memTitColumn: "密碼", type: "password", id: "memPsw", name: "memPsw", class: "fillInClumn", placeholder: "密碼" },
      ],
      memBtnLink: [
        { link: "/Home/MemberSignUp", name: "會員註冊" },
        { link: "", name: "會員登入" },
      ]
    };
  },
  methods: {
    checkLoginData() {
      // if (this.memId === "test" && this.memPsw === "test") {
      //   window.alert("登入成功");
      // } else {
      //   window.alert("帳密錯誤");
      // }
      console.log('checkLoginData');
      let input = {
      mem_account:'charmy101@gmail.com',
      mem_psw:'charmy101'

      }
      fetch(
        'https://tibamef2e.com/cgd103/g1/api/getConfirmMember.php',{
        method:'POST',
        body:new URLSearchParams(input)
        }
      )
      .then(res => res.json())
      .then(json => console.log(json))
      // if (this.memId === "test" && this.memPsw === "test") {
      //   window.alert("登入成功");
      // } else {
      //   window.alert("帳密錯誤");
      // }

    },
  },
  mounted() {
    document.body.style.height = `auto`;
  }
};
</script>
<style scoped lang="scss">
.backGroundCard{
 
  form{
      width:auto;
      margin:auto 213px;
      
  }
}
@include t(){
  .backGroundCard{
    height: 100%;
    min-height: 0;
    form{
        margin:30px auto;
        button{
          margin: 5px;
        }
    }
  }
}
</style>

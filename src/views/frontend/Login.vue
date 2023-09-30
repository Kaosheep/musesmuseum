<template>
  <div class="bgcGY cardCenter">
    <main>
      <!-- <div class="backGroundCardbBlue"></div> -->
      <div class="backGroundCard ">
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
            <input :key="i.id" :type="i.type" :id="i.id" :name="i.name" :class="i.class" :placeholder="i.placeholder"
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
            <input type="submit" id="btnLogin" class="submitBtn" value="登入" @click="checkLoginData" />
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
        { memTitColumn: "帳號", type: "text", id: "memId", name: "memId", class: "fillInClumn", placeholder: "帳號" },
        { memTitColumn: "密碼", type: "password", id: "memPsw", name: "memPsw", class: "fillInClumn", placeholder: "密碼" },
      ],
      memBtnLink: [
        { link: "/Home/MemberSignUp", name: "會員註冊" },
        { link: "", name: "會員登入" },
      ],
      // memId: "muses", 
      // memPsw: "muses",
      // router: null, //暫時登入用
    };
  },
  methods: {
    // checkLoginData() {
      // console.log('checkLoginData');

      //暫時登入用
      // if (this.memId === "muses" && this.memPsw === "muses") {
      //   window.alert("登入成功");
      //   this.router.push('/Home/MemberInfo');
      // } else {
      //   window.alert("帳密錯誤");
      // }
   
        // 使用 $router.push 导航到目标路由
       
   
      //帳密
      // console.log('checkLoginData');
      // let input = {
      // memId:document.getElementById("memId").value,
      // memPsw:document.getElementById("memPsw").value,

      // }
      // // 上課測試帳密
      // fetch(
      //   'http://localhost/musesmuseum/public/phps/login.php',{
      //   method:'POST',
      //   body:new URLSearchParams(input)
      //   }
      // )
      // .then(res => res.json())
      // .then(json => console.log(json))

      // 測試一直發生錯誤
  //      let input = {
  //     memId: 'Sara',
  //     memPsw: '111'

  //   }
  //     fetch(
  //   'http://localhost/musesmuseum/public/phps/login.php', {
  //   method: 'POST',
  //   body: new URLSearchParams(input)
  // })
  // .then(res => res.json())
  // .then(json => {
  //   if (json.error) {
  //     window.alert(json.error); 
  //   } else if (json.success) {
  //     window.alert(json.success); 
  //   }
  // })
  // .catch(error => {
  //   console.error("error", error);
  //   window.alert('發生錯誤');
  // });

    // },
  },
  mounted() {
    // 連接php的部分
    let input = {
      memId: 'Sara',
      memPsw: '111'

    }
    let memId = document.getElementById("memId").value;
    let memPsw = document.getElementById("memPsw").value;
    const data = new URLSearchParams({ memId, memPsw });
    fetch("http://localhost/musesmuseum/public/phps/login.php", {
      method: "POST",
      // headers: {
      //   "Content-Type": "application/x-www-form-urlencoded",
      // },
      body: data,
    })
      .then((res) => res.json())
      .then((res) => {
        console.log(res);
        if(!res.error){
          alert('註冊成功');
        }
      })
      // .catch((error) => {
      //   console.error("Error:", error);
      // });

    // fetch(
    //   'http://localhost/musesmuseum/public/phps/login.php', {
    //   method: 'POST',
    //   body: new URLSearchParams(input)
    // }).then(res => res.json()).then(json => {
    //   console.log(json)
    // })

    this.router = this.$router;//暫時登入用
    document.body.style.height = `auto`;
  }
};



</script>
<style scoped lang="scss">


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







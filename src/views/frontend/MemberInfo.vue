<template>
  <div class="bgcGY cardCenter">
   <main>
       <div class="backGroundCardbBlue"></div>
       <div class="backGroundCard">
         <div class="backGroundCardBtns">
           <router-link :to="a.link" v-for="a in memBtnLink">
             <button :class="[a.name === '會員資料' ? 'pinkBtnLight' : 'pinkBtn']">
               {{a.name}}
             </button>
           </router-link>
         </div>
         <form>
           <div class="memloginActi" v-for="i in memAllInfo">
             <label  :key="i.id">{{ i.memAllInfo }}</label>
             <input
             :key="i.id"
             :type="i.type"
             :id="i.id"
             :name="i.mbr_email"
             :class="i.class"
             :placeholder="i.placeholder"
             :value="i.value"
             required
             />
           </div>
           <!-- <div class="resetPswEmail">
             <a href="#">信箱驗證</a>
           </div> -->
           <div class="memloginSubmit">
             <input
               type="button"
               id="btnLogin"
               class="submitBtn"
               value="送出"
               @click="sendUserData"
             />  
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
       memAllInfo:[
           { memTitColumn:"姓名",type:"text",id:"memId",name:"memId",class:"fillInClumn",placeholder:"姓名",value:"巴特特" },  
           { memTitColumn:"生日",type:"date",id:"birthday",name:"birthday",class:"fillInClumn",placeholder:"" ,value: '2000-01-01' },
           { memTitColumn:"信箱",type:"email",id:"email",name:"email",class:"fillInClumn",placeholder:"信箱" ,value:"muse001@gmail.com" },
           { memTitColumn:"聯絡電話",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"電話" ,value:"0989123456" },
           { memTitColumn:"聯絡地址",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"地址" ,value:"光明市珍珠區謬思路1號" },
       
       ],

     memBtnLink:[
       { link:"", name:"會員資料" },
       { link:"/Home/SearchProduct", name:"訂單查詢" },
       { link:"/Home/SearchTicket", name:"票券查詢" },
       { link:"", name:"收藏清單" },
     ],
   };
 },
 methods: {
  //綸a方法
  // senduserData() {
  //     fetch("http://localhost/musesmuseum/public/phps/MemberInfo.php").then(async (response) => {
  //       this.memAllInfo = await response.json();
  //       console.log(this.memAllInfo); 
  //     })
  //     .catch((error) => {
  //       console.error('發生錯誤:', error);
  //     });
  //   },
  //目前
  senduserData() {
      console.log("senduserData");

      // let input = {
      //   mbr_email: document.getElementById("mbr_email").value,
      //   mbr_psw: document.getElementById("mbr_psw").value,
      // };

      const data = new URLSearchParams({ mbr_email, mbr_psw });
      fetch("http://localhost/musesmuseum/public/phps/MemberInfo.php", 
      {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        // body: new URLSearchParams(input),
      }
      )
        .then((response) => {
          return response.json();
        })
        .then((result) => {
          this.memAllInfo = result;
      console.log(memAllInfo);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
 },
 mounted() {
   document.body.style.height = `auto`;
  //  senduserData();
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
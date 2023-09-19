<template>
  <div class="bgcGY cardCenter">
   <main>
    <div class="search">
        <Searchbar @click="searchClick"/>
        <!-- <Searchbarclick/> -->
    </div>
       <div class="backGroundCardbBlue"></div>
       <div class="backGroundCard">
         <div class="backGroundCardBtns">
           <router-link :to="a.link" v-for="a in memBtnLink">
             <button :class="[a.name === '票券查詢' ? 'pinkBtnLight' : 'pinkBtn']">
               {{a.name}}
             </button>
           </router-link>
         </div>
         <form>
           <div class="memloginActi" v-for="i in memAllInfo">
             <label  :key="i.id">{{ i.memTitColumn }}</label>
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
           <!-- <div class="resetPswEmail">
             <a href="#">信箱驗證</a>
           </div> -->
           <div class="memloginSubmit">
             <input
               type="button"
               id="btnLogin"
               class="submitBtn"
               value="送出"
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
import Footer from "@/components/Footer.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
export default {
 components: {
   Footer,
   Searchbar,
   Searchbarclick,
 },
 data() {
   return {
       memAllInfo:[
           { memTitColumn:"姓名",type:"text",id:"memId",name:"memId",class:"fillInClumn",placeholder:"姓名" },
           { memTitColumn:"生日",type:"date",id:"birthday",name:"birthday",class:"fillInClumn",placeholder:"" },
           { memTitColumn:"信箱",type:"email",id:"email",name:"email",class:"fillInClumn",placeholder:"信箱" },
           { memTitColumn:"聯絡電話",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"電話" },
           { memTitColumn:"聯絡地址",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"地址" },
       
       ],

     memBtnLink:[
       { link:"/Home/MemberInfo", name:"會員資料" },
       { link:"/Home/SearchProduct", name:"訂單查詢" },
       { link:"", name:"票券查詢" },
     ],
   };
 },
 methods: {
  //  checkLoginData() {
  //    if (this.memId === "test" && this.memPsw === "test") {
  //      window.alert("登入成功");
  //    } else {
  //      window.alert("帳密錯誤");
  //    }
  //  },
 },
 mounted() {
   document.body.style.height = `auto`;
 }
};
</script>
<style scoped lang="scss">
// .search{
// height: 202px;
// display: flex;
// justify-content: flex-endd;
// align-items: center;
// }
// .searchbar_search{
//   margin: 0;
//   box-shadow: 3px 3px 0px $mgreen;
// }

// .backGroundCard{
//   display: flex;
//   // flex-wrap: wrap;
//   align-items: flex-start; 
//   justify-content: space-between;
//   form{
//     height: 100%;
//     width: 50%;
//     margin: auto;
//   }
// }
// .backGroundCardBtns,

// .cardCenter{
//   align-items: start;
// }
</style>
<template>
  <div class="bgcGY cardCenter">
   <main>
       <div class="backGroundCardbBlue"></div>
       <div class="backGroundCard">
         <div class="backGroundCardBtns">
           <router-link :to="a.link" v-for="a in memBtnLink">
             <button :class="[a.name === '訂單查詢' ? 'pinkBtnLight' : 'pinkBtn']">
               {{a.name}}
             </button>
           </router-link>
         </div>
         <div v-for="(rowitem, rowindex) in productInfoArr" 
         :key="rowindex" 
         :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']">
      {{ rowitem }}
      {{ rowitem }}
      {{ rowitem }}
    </div>
         <!-- <div class="headerRow"></div>
         <div class="yellowRow"></div>
         <div class="whiteRow"></div> -->
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
    productInfoArr:[
        { memTitColumn:"姓名",type:"text",id:"memId",name:"memId",class:"fillInClumn",placeholder:"姓名" },
        { memTitColumn:"生日",type:"date",id:"birthday",name:"birthday",class:"fillInClumn",placeholder:"" },
        { memTitColumn:"信箱",type:"email",id:"email",name:"email",class:"fillInClumn",placeholder:"信箱" },
        { memTitColumn:"聯絡電話",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"電話" },
        { memTitColumn:"聯絡地址",type:"text",id:"memPsw",name:"memPsw",class:"fillInClumn",placeholder:"地址" },
       
    ],
    memBtnLink:[
       { link:"/Home/MemberInfo", name:"會員資料" },
       { link:"", name:"訂單查詢" },
       { link:"/Home/SearchTicket", name:"票券查詢" },
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

</style>
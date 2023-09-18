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
             <button :class="[a.name === '訂單查詢' ? 'pinkBtnLight' : 'pinkBtn']">
               {{a.name}}
             </button>
           </router-link>
          </div>
    <div class="productInfo">
          <div v-for="(rowitem, rowindex) in productInfoArr" 
          :key="rowindex" 
          :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']">
              {{ rowitem.prodInfoLine }}

              <div
              :id="rowitem.id"
              :name="rowitem.name"
              ></div>
              <!-- <p :id="rowitem.prodInfoLine" :name="rowitem.prodInfoLine"></p> -->
          </div>
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
    productInfoArr:[
        { prodInfoLine:"姓名",type:"text",id:"memId",name:"memId",class:"fillInClumn",placeholder:"姓名" },
        { prodInfoLine:"生日",type:"date",id:"birthday",name:"birthday",class:"fillInClumn",placeholder:"" },
        { prodInfoLine:"信箱",type:"email",id:"email",name:"email",class:"fillInClumn",placeholder:"信箱" },
       
       
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
.search{
height: 202px;
display: flex;
justify-content: end;
align-items: center;
}
.searchbar_search{
  margin: 0;
  box-shadow: 3px 3px 0px $mgreen;
}

.backGroundCard{
  display: flex;
  // flex-wrap: wrap;
  align-items: flex-start; 
  justify-content: space-between;
}
.backGroundCardBtns,
.productInfo
 {
  flex-basis: calc(50% - 10px); /* 每个区域占据1/3的宽度，减去间距 */
  margin-right: 10px; /* 右侧间距，可根据需要调整 */
}
.cardCenter{
  align-items: start;
}
</style>
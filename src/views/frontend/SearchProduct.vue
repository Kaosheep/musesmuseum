<template>
  <div class="bgcGY cardCenter">
   <main class="searchProdMain">
    <div class="search">
        <Searchbar @click="searchClick"/>
        <Searchbarclick/>
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
            <div class="headerRow">
              <p>訂單編號</p>
              <p></p>
              <p class="hideInfo">訂購日期</p>
              <p>總金額</p>
              <p class="hideInfo">付款狀態</p>
              <p>訂單狀態</p>
            </div>
            <div v-for="(rowitem, rowindex) in pagedProductInfo" 
              :key="rowindex" 
              :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']">
              
            <div class="itemInfoList">{{ rowitem.id }}</div>
              <router-link :to="`/Home/SearchProductInfo/${rowitem.id}`" >
                <div class="itemInfoList">
                  <img
                    :src="
                      require('@/assets/image/productimage/productimage' +
                      rowindex +
                        '.png')"
                      :alt="rowitem.name"
                  />
                </div>
              </router-link>
                <div class="itemInfoList hideInfo">{{ rowitem.date}}</div>
                <div class="itemInfoList">{{ rowitem.price }}</div>
                <div class="itemInfoList hideInfo">{{ rowitem.pay }}</div>
                <div class="itemInfoList">{{ rowitem.finish }}</div>
                <!-- <div
                :id="rowitem.id"
                :name="rowitem.name"
                ></div> -->
            
            </div>
            <div class="pagination">
                <Page :total="productInfoArr.length" :page-size="itemsPerPage" v-model="currentPage"/>
            </div>
          </div>
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
        { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        { id:"A00104",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        { id:"A00105",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },

      ],
    memBtnLink:[
       { link:"/Home/MemberInfo", name:"會員資料" },
       { link:"", name:"訂單查詢" },
       { link:"/Home/SearchTicket", name:"票券查詢" },
     ],
     currentPage: 1,
    itemsPerPage: 5,
   };
 },
 computed: {
    pagedProductInfo() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.productInfoArr.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.productInfoArr.length / this.itemsPerPage);
    },
  },
 methods: {
  //  checkLoginData() {
  //    if (this.memId === "test" && this.memPsw === "test") {
  //      window.alert("登入成功");
  //    } else {
  //      window.alert("帳密錯誤");
  //    }
  //  },
//   goToProductInfo(id) {
//       this.$router.push({
//         name: 'SearchProductInfo',
//         params: {
//           id: id,
//         }
//       });
//     },
 },
 mounted() {
   document.body.style.height = `auto`;
 }
};
</script>
<style scoped lang="scss">
.backGroundCard{
  // flex-wrap: wrap;
  align-items: flex-start; 
  justify-content:center;
}
// .backGroundCardBtns{
//   margin-right: 30px;
// }

.productInfo{
  white-space: nowrap;
}
.cardCenter{
  align-items: start;
}


</style>
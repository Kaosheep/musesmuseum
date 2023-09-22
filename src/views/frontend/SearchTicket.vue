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
             <button :class="[a.name === '票券查詢' ? 'pinkBtnLight' : 'pinkBtn']">
               {{a.name}}
             </button>
           </router-link>
          </div>
          <div class="productInfo">
            <div class="headerRow">
              <p>訂單編號</p>
              <p></p>
              <p>訂購日期</p>
              <p>總金額</p>
              <p>付款狀態</p>
              <p>訂單狀態</p>
            </div>
            <div 
              v-for="(rowitem, rowindex) in pagedProductInfo" 
              :key="rowindex" 
              :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']"
              >
                <div class="itemInfoList">{{ rowitem.id }}</div>
                
                <div class="itemInfoList">
                  <img
                    :src="
                      require('@/assets/image/productimage/productimage' +
                      rowindex +
                        '.png')"
                      :alt="rowitem.name"
                  />
                </div>

                <div class="itemInfoList">{{ rowitem.date}}</div>
                <div class="itemInfoList">{{ rowitem.name }}</div>
                <div class="itemInfoList">{{ rowitem.class }}</div>
                <div class="itemInfoList">{{ rowitem.placeholder }}</div>
            </div>
            <!-- <div class="pagination">
              <button @click="prevPage" :disabled="currentPage === 1">上一頁</button>
              <span>第 {{ currentPage }} 頁 / 共 {{ totalPages }} 頁</span>
              <button @click="nextPage" :disabled="currentPage === totalPages">下一頁</button>
            </div> -->
            <div class="pagination">
            <button @click="prevPage" :disabled="currentPage === 1"> &#8249; </button>
            <span>
              <button
                v-for="page in totalPages"
                :key="page"
                @click="changePage(page)"
                :class="{ active: currentPage === page }"
              >
                {{ page }}
              </button>
            </span>
            <button @click="nextPage" :disabled="currentPage === totalPages"> &#8249; </button>
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
        { id:"A00103",pic:"@/assets/image/productimage",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"B00103",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"C00103",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"D00103",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"E00103",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"A00104",pic:"@/assets/image/productimage",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"B00104",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"C00104",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"D00104",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },
        { id:"E00104",type:"pic",date:"2023/08/01",name:"$1200",class:"已付款",placeholder:"已完成" },

      ],
    memBtnLink:[
        { link: "/Home/MemberInfo", name: "會員資料" },
        { link: "/Home/SearchProduct", name: "訂單查詢" },
        { link: "", name: "票券查詢" },
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
    changePage(page) {
    this.currentPage = page;
  },
    searchClick() {},
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
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
justify-content: flex-end;
align-items: center;
}
.searchbar_search{
  margin: 0;
  box-shadow: 3px 3px 0px $mgreen;
}
@include t(){
  .search{
    height:auto;
    display: block;
    margin: 20px 0;
  }
}

.backGroundCard{
  display: flex;
    // flex-wrap: wrap;
    align-items: flex-start; 
    justify-content: space-between;
}
.backGroundCardBtns{
  margin-right: 30px;
}

.productInfo
 {
  width: 100%;
  // flex-basis: calc(50% - 10px); 

}
.cardCenter{
  align-items: start;
}

@include t(){
  .backGroundCard{
    display: block;
  }
  .backGroundCardBtns,
  .productInfo{
    margin-right: 0;
  }
  .search{
    margin-right: auto;
    .searchbar_search{
        display: none;
    }
    .searchbarclick_search{
        display: block;
        margin: 20px auto 20px 0;
    }
  }
}

</style>
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
              <p>訂票編號</p>
              <p>票劵</p>
              <p class="hideInfo">訂購日期</p>
              <p>總金額</p>
              <p  class="hideInfo">付款狀態</p>
              <p  class="hideInfo">使用張數</p>
            </div>
            <div 
              v-for="(rowitem, rowindex) in pagedProductInfo" 
              :key="rowindex" 
              :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']"
              >
              <router-link :to="`/Home/TicketQRcode/${rowitem.id}`" >
                <div class="itemInfoList">{{ rowitem.id }}</div>
              </router-link>  
                  <div class="itemInfoList">
                    {{ rowitem.ticketName}}
                    {{ rowitem.ticketName}}
                  </div>
               
                <div class="itemInfoList hideInfo">{{ rowitem.date}}</div>
                <div class="itemInfoList">{{ rowitem.price }}</div>
                <div class="itemInfoList hideInfo">{{ rowitem.pay }}</div>
                <router-link :to="`/Home/TicketQRcode/${rowitem.id}`" >
                  <div class="itemInfoList hideInfo">{{ rowitem.finish }}</div>
                </router-link>
            </div>
            <!-- <div class="pagination">
              <button @click="prevPage" :disabled="currentPage === 1">上一頁</button>
              <span>第 {{ currentPage }} 頁 / 共 {{ totalPages }} 頁</span>
              <button @click="nextPage" :disabled="currentPage === totalPages">下一頁</button>
            </div> -->
            <div class="pagination">
              <Page :total="productInfoArr.length" :page-size="itemsPerPage" v-model="currentPage"/>
            <!-- <button class="pageBtn" @click="prevPage" :disabled="currentPage === 1">
              <i class="fa-solid fa-chevron-up fa-rotate-270" ></i>
            </button>
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
            <button class="pageBtn" @click="nextPage" :disabled="currentPage === totalPages">  
              <font-awesome-icon :icon="['fas', 'chevron-up']" rotation=90 style="color: $mblue;" />
            </button> -->
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
        { id:"A00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1" },
        { id:"B00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
        { id:"C00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
        { id:"D00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"2"  },
        { id:"E00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
        { id:"A00104",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
        { id:"B00104",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"3"  },
        { id:"C00104",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
        { id:"D00104",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"4"  },
        { id:"E00104",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },

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

 },
 mounted() {
   document.body.style.height = `auto`;
 }
};
</script>
<style scoped lang="scss">


.searchProdMain{
  .backGroundCard{
    // display: flex;
    // align-items: flex-start; 
    justify-content: center;
  }
  .itemInfoList{
    margin: auto 27px;
    width: 48px;
  }
  .yellowRow{
    justify-content: center;
  }
}

@include t(){
  .searchProdMain{
    .productInfo{
      .headerRow{
        p{
          margin: auto;
        }
      }
    }
  }
 
 
}

.cardCenter{
  align-items: start;
}

</style>
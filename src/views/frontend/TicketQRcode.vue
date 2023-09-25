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
                  <div class="itemInfoList"  
                  @click="showSection">
                    {{ rowitem.id }}
                  </div>
                  <router-link 
                  :to="`/Home/TicketQRcode/${rowitem.id}`" 
                  >
                    <section class="itemInfoList" v-show="isSectionVisible">
                      {{ rowitem.id}}
                    </section>
                  </router-link>

                  <div class="itemInfoList hideInfo">{{ rowitem.date}}</div>
                 
              </div>
              <div class="mask" v-show="isSectionVisible" @click="hideSection">123</div>
              
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
        isSectionVisible: false,
      productInfoArr:[
          { id:"A00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1" },
          { id:"B00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
          { id:"C00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
          { id:"D00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"2"  },
          { id:"E00103",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
          { id:"A00104",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$1200",pay:"已付款",finish:"1"  },
         
  
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
      current(){
        
      }
    },
   methods: {
    showSection() {
          this.isSectionVisible = true;
        },
        hideSection() {
          this.isSectionVisible = false;
        },
   },
   mounted() {
     document.body.style.height = `auto`;
   }
  };
  </script>
  <style scoped lang="scss">
 
        
        section {
            position: absolute;
            background: #f5f5f5;
            width: 400px;
            left: 35%;
            padding: 2rem;
            text-align: center;
            border-radius: 10px;
            z-index: 9;
        }
        
        .mask {
            // display: none;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background: rgba(197, 23, 23, 0.85);
            z-index: 1;
        }
  .backGroundCard{
    display: flex;
      align-items: flex-start; 
      justify-content: space-between;
  }
  
  .cardCenter{
    align-items: start;
  }
  
  </style>
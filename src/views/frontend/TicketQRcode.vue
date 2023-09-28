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
                <p>使用張數</p>
              </div>
              <div 
                v-for="(rowitem, rowindex) in pagedProductInfo" 
                :key="rowindex" 
                :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']"
                > 
                  <div class="itemInfoList">{{ rowitem.id}}</div>
                  <div class="itemInfoList fingerlink"
                  @click="showSection(rowitem.id)">
                  {{ rowitem.ticketName }}
                  </div>
                 
                  <router-link 
                  v-if="currentId === rowitem.id"
                  v-show="isSectionVisible"
                  :to="`/Home/TicketQRcode/${rowitem.id}`" 
                 
                  >
                    <section class="itemInfoList" id="showqrcode">
                      {{ currentItem.ticketName}}
                    </section>
                  </router-link>
         
                  <div class="itemInfoList hideInfo">{{ rowitem.date}}</div>
                <div class="itemInfoList">{{ rowitem.price }}</div>
                <div class="itemInfoList hideInfo">{{ rowitem.pay }}</div>
                <div class="itemInfoList">{{ rowitem.finish }}</div>
                 
              </div>
              <div class="mask" v-show="isSectionVisible" @click="hideSection"></div>
              <div class="underRow">
                <p>付款狀態</p>
                <div>已付款</div>
                <p>總金額</p>
                <div>1000</div>
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
        isSectionVisible: false,
      productInfoArr:[
          { id:"A01",pic:"",date:"2023/08/01",ticketName:"普通票",price:"$200",pay:"已付款",finish:"1" },
          { id:"B02",pic:"",date:"2023/08/01",ticketName:"老人票",price:"$100",pay:"已付款",finish:"1"  },
          { id:"C03",pic:"",date:"2023/08/02",ticketName:"普通票",price:"$200",pay:"已付款",finish:"1"  },
          { id:"D04",pic:"",date:"2023/08/03",ticketName:"普通票",price:"$200",pay:"已付款",finish:"0"  },
          { id:"E05",pic:"",date:"2023/08/04",ticketName:"兒童票",price:"$100",pay:"已付款",finish:"0"  },
          { id:"A06",pic:"",date:"2023/08/05",ticketName:"普通票",price:"$200",pay:"已付款",finish:"0"  },
         
  
        ],
      memBtnLink:[
          { link: "/Home/MemberInfo", name: "會員資料" },
          { link: "/Home/SearchProduct", name: "訂單查詢" },
          { link: "", name: "票券查詢" },
       ],
      currentPage: 1,
      itemsPerPage: 5,
      currentId: 0,
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
      currentItem() {
        return this.productInfoArr.find(v => v.id === this.currentId) ?? {};
      },
    },
   methods: {
    showSection(id) {
      this.currentId = id
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
  .fingerlink{
    cursor: pointer;
  }
  #showqrcode{
    width: 200px;
    height: 280px;
    display: flex;
    justify-content: center;
    align-items: end;
    background-image: url('../../assets/image/tick/qrcode.png'); 
    background-size: 100%;
    background-repeat: no-repeat; 
  }     

  section {
      position: absolute;
      background: #f5f5f5;
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
      background: rgba(251, 247, 150, 0.85);
      z-index: 1;
  }
  .underRow{
    padding:10px 16px;
    display:flex;
    justify-content: space-between;
    border-top: 2px solid $mblue;
    p{
      color: $mgreen;
    }
}
  .backGroundCard{
  align-items: flex-start; 
  justify-content:center;
  }
  
  .cardCenter{
    align-items: start;
  }

  @include t() {
    .searchProdMain{
    .productInfo{
      .headerRow{
        p{
          margin: auto;
        }
      }
      .underRow{
      text-align: start;
      flex-wrap: wrap;
      p{
        width: 80px;
      }
    }
    }
    section {
      left:22%;
    }
  }
 
  }
  
  </style>
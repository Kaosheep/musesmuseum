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
              
            <div class="itemInfoList">{{ rowitem.prod_id }}</div>
              <div v-if="rowitem.prod_id" v-bind:key="rowitem.prod_id">
                <router-link :to="`/Home/SearchProductInfo/${rowitem.prod_id}`" >
                  <div class="itemInfoList">
                    <img
                        :src="(`${this.$store.state.imgpublicpath}image/productimage/` + rowitem.prod_img)"
                        :alt="rowitem.prod_name"
                    />
                  </div>
                </router-link>
                  <div class="itemInfoList hideInfo">{{ p['prod_date'] }}</div>
                  <div class="itemInfoList">{{ rowitem.prod_sellingprice }}</div>
                  <div class="itemInfoList hideInfo">{{ rowitem.prod_pay }}</div>
                  <div class="itemInfoList">{{ rowitem.prod_finish }}</div>
                  <!-- <div
                  :id="rowitem.id"
                  :name="rowitem.name"
                  ></div> -->
              </div>
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
    currentItemId: '',
    rowitem:{},
    publicpath: "http://localhost/musesmuseum/public/phps/",
    productInfoArr:[
        // { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        // { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        // { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        // { id:"A00104",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        // { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        // { id:"A00103",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },
        // { id:"A00105",pic:"",date:"2023/08/01",price:"$1200",pay:"已付款",finish:"已完成" },

      ],
      p: {
        /** form data: name */
        prod_date: {
          date1:2022/10/10, date2:2022/5/5 ,date3:2021/11/11, date4:2020/12/10
        },
        mbr_pay: {
          memTitColumn: "生日", type: "date", id: "mbr_birth", name: "mbr_birth", class: "fillInClumn", placeholder: ""
        },
        mbr_finish: {
          memTitColumn: "信箱", type: "email", id: "mbr_email", name: "mbr_email", class: "fillInClumn", placeholder: "信箱"
        },
        
      },
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
    fetchprod() {
        fetch(`${this.publicpath}productPage.php`).then(async (response) => {
          this.productInfoArr = await response.json();
          if (this.productInfoArr.length > 0) {
              this.currentItemId = this.productInfoArr[0].id;
            }
          // const idToFind = this.$route.params.prod_id;
          // this.rowitem = this.productInfoArr.find((rowitem) => rowitem.prod_id === idToFind); 
          // console.log(rowitem);
          console.log('fetchprod 方法被调用了')
          console.log(this.productInfoArr)
        })
        .catch((error) => {
          console.error('發生錯誤:', error);
        });
      },
      
  },
  mounted() {
    document.body.style.height = `auto`;
    this.fetchprod();
  }
};
</script>
<style scoped lang="scss">
.backGroundCard{
  align-items: flex-start; 
  justify-content:center;
}

.productInfo{
  white-space: nowrap;
}
.cardCenter{
  align-items: start;
}


</style>
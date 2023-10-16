<template>
  <div class="bgcGY cardCenter">
    <main class="searchProdMain">
      <div class="search">
        <Searchbar @click="searchClick" />
        <Searchbarclick />
      </div>
      <div class="backGroundCardbBlue"></div>
      <div class="backGroundCard">
        <div class="backGroundCardBtns">
          <router-link :to="a.link" v-for="a in memBtnLink">
            <button
              :class="[a.name === '票券查詢' ? 'pinkBtnLight' : 'pinkBtn']"
            >
              {{ a.name }}
            </button>
          </router-link>
        </div>

        <div class="productInfo">
          <div class="headerRow">
            <p>訂票編號</p>
            <p>票劵</p>
            <p class="hideInfo">訂購日期</p>
            <p>總金額</p>
            <p class="hideInfo">付款狀態</p>
            <p>使用張數</p>
          </div>
          <div
            v-for="(rowitem, rowindex) in pagedProductInfo"
            :key="rowindex"
            :class="[rowindex % 2 === 0 ? 'yellowRow' : 'whiteRow']"
          >
            <div class="itemInfoList"><p>{{ rowitem.to_id }}</p></div>
            <div
              class="itemInfoList fingerlink"
              @click="showSection(rowitem.tkt_dlt_id)"
            >
              <p>{{ rowitem.tkt_name }}</p>
            </div>

            <router-link
              v-if="currentId === rowitem.tkt_dlt_id"
              v-show="isSectionVisible"
              :to="`/Home/TicketQRcode/${rowitem.tkt_dlt_id}`"
            >
              <section class="itemInfoList" id="showqrcode">
                <qrcode-vue
                  :value="`${rowitem.tkt_dlt_id}`"
                  :size="200"
                  level="H"
                  :margin="2"
                />
                <p>{{ rowitem.tkt_name }}</p>
              </section>
            </router-link>
            <div class="itemInfoList hideInfo"><p>{{ rowitem.to_date }}</p></div>
            <div class="itemInfoList"><p>{{ rowitem.tkt_dlt_actual_price }}</p></div>
            <div class="itemInfoList hideInfo">
              <p v-if="parseInt(rowitem.to_pay_status) === 0">未付款</p>
              <p v-else-if="parseInt(rowitem.to_pay_status) === 1">已付款</p>
            </div>
            <div class="itemInfoList"><p>{{ rowitem.tkt_dlt_qty_used }}</p></div>
          </div>
          <div
            class="mask"
            v-show="isSectionVisible"
            @click="hideSection"
          ></div>
          <div class="underRow">
            <p>付款狀態</p>
            <div>已付款</div>
            <p>總金額</p>
            <div>1000</div>
          </div>
          <div class="pagination">
            <Page
              :total="ticketDlts.length"
              :page-size="itemsPerPage"
              v-model="currentPage"
            />
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
import QrcodeVue from "qrcode.vue";

export default {
  components: {
    Footer,
    Searchbar,
    Searchbarclick,
    QrcodeVue,
  },
  data() {
    return {
      isSectionVisible: false,
      productInfoArr: [
        {
          id: "A01",
          pic: "",
          date: "2023/08/01",
          ticketName: "普通票",
          price: "$200",
          pay: "已付款",
          finish: "1",
        },
        {
          id: "B02",
          pic: "",
          date: "2023/08/01",
          ticketName: "老人票",
          price: "$100",
          pay: "已付款",
          finish: "1",
        },
        {
          id: "C03",
          pic: "",
          date: "2023/08/02",
          ticketName: "普通票",
          price: "$200",
          pay: "已付款",
          finish: "1",
        },
        {
          id: "D04",
          pic: "",
          date: "2023/08/03",
          ticketName: "普通票",
          price: "$200",
          pay: "已付款",
          finish: "0",
        },
        {
          id: "E05",
          pic: "",
          date: "2023/08/04",
          ticketName: "兒童票",
          price: "$100",
          pay: "已付款",
          finish: "0",
        },
        {
          id: "A06",
          pic: "",
          date: "2023/08/05",
          ticketName: "普通票",
          price: "$200",
          pay: "已付款",
          finish: "0",
        },
      ],
      ticketDlts: [],
      memAllInfo: {},
      memBtnLink: [
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
      return this.ticketDlts.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.ticketDlts.length / this.itemsPerPage);
    },
    currentItem() {
      return this.ticketDlts.find((v) => v.id === this.currentId) ?? {};
    },
  },
  methods: {
    showSection(id) {
      this.currentId = id;
      this.isSectionVisible = true;
    },
    hideSection() {
      this.isSectionVisible = false;
    },
    getTktDlt() {
      const formData = new URLSearchParams();
      formData.append("mbr_id", this.memAllInfo["mbr_id"]);
      console.log(this.memAllInfo["mbr_id"]);
      fetch(`${this.$store.state.publicpath}tkt_dlt.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      }).then(async (response) => {
        this.ticketDlts = await response.json();
      });
    },
  },
  mounted() {
    document.body.style.height = `auto`;
    const cookies = document.cookie.split(";");
    let members = null;

    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();
      if (cookie.startsWith("members=")) {
        members = decodeURIComponent(cookie.substring("members=".length));
        break;
      }
    }

    if (members) {
      try {
        const memberInfo = JSON.parse(members);
        if (memberInfo.mbr_name && memberInfo.mbr_email) {
          this.memAllInfo = memberInfo;
          this.$store.state.mbr_id = this.memAllInfo.mbr_id;
          // console.log(this.memAllInfo);
        } else {
          console.error("Cookie中缺少屬性");
        }
      } catch (error) {
        console.error("解析Cookie數據錯誤", error);
      }
    }
    this.getTktDlt();
  },
};
</script>
<style scoped lang="scss">
.headerRow{
  p{
    margin: 0;
    &:nth-child(1){
      width: 20%;
    }
    &:nth-child(2){
      width: 12%;

    }
    &:nth-child(3){
      width: 13%;

    }
    &:nth-child(4){

    }
    &:nth-child(5){

    }
    &:nth-child(6){

    }
  }
}

.fingerlink {
  cursor: pointer;
}
section {
  position: fixed;
  background: #f5f5f5;
  @include tc;
  border-radius: 10px;
  z-index: 9;
}
.mask {
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  background: rgba(251, 247, 150, 0.85);
  z-index: 1;
}
#showqrcode {
  width: 280px;
  height: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  p{
    margin-top: 1.5rem;
    font-size: 1.5rem;
  }
}

.underRow {
  padding: 10px 16px;
  display: flex;
  justify-content: space-between;
  border-top: 2px solid $mblue;
  p {
    color: $mgreen;
  }
}
.backGroundCard {
  align-items: flex-start;
  justify-content: center;
}

.cardCenter {
  align-items: start;
}

@include t() {
  .searchProdMain {
    
      .headerRow {
        p {
          margin: 0;
        }
      
      .underRow {
        text-align: start;
        flex-wrap: wrap;
        p {
          width: 80px;
        }
      }
    }
    section {
      left: 22%;
    }
  }
}
</style>

<template>
  <div class="shopping_stepbar">
    <div>
      <p>確認商品</p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
      <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965" />
      <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688" />
    </svg>
    <div>
      <p>配送方式<br />&<br />填寫資料<br /></p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 73 19">
      <line x1="0.517578" y1="17.3965" x2="72.7871" y2="17.3965" />
      <line x1="71.7612" y1="16.9869" x2="55.7612" y2="1.98688" />
    </svg>
    <div>
      <p>完成訂購</p>
    </div>
  </div>
  <div class="shopping_step2">
    <div class="shopping_deliver">
      <h3>請選擇配送方式及填寫收件資料：</h3>
      <select class="deliverway" v-model="selected">
        <option v-for="way in deliverway">{{ way.ship }}</option>
      </select>
      <label><input type="checkbox" />收件人同會員資訊</label>
      <label
        >收件人：
        <input type="text" class="textInner" required v-model="po_name" />
      </label>
      <label
        >地址：
        <select v-model="selectedCounty" @change="fetchDistricts">
          <option>請選擇</option>
          <option
            v-for="item in countyList"
            :key="item.county_id"
            :value="{
              county_id: item.county_id,
              county_name: item.county_name,
            }"
          >
            {{ item.county_name }}
          </option>
        </select>
        <select v-model="selectedDistrict">
          <option>請選擇</option>
          <option
            v-for="item in districtList"
            :key="item.district_id"
            :value="{
              district_id: item.district_id,
              district_name: item.district_name,
            }"
          >
            {{ item.district_name }}
          </option>
        </select>
        <input type="text" class="addresstext" v-model="po_addr" />
      </label>
      <label
        >連絡電話：
        <input type="text" class="textInner" v-model="po_phone" />
      </label>
    </div>
    <div class="fee_shopping">
      <p>
        商品總計<span>${{ totolprice }}</span>
      </p>
      <p>
        運費<span>${{ shipcharge.charge }}</span>
      </p>
      <p>
        合計<span>${{ bill }}</span>
      </p>
    </div>
  </div>
  <div class="shopping_finish">
    <router-link to="/home/ShoppingSuccess">
      <button class="pinkBtn" @click="getOrderInfo">送出訂單</button>
    </router-link>
  </div>
</template>

<script>
export default {
  data() {
    return {
      storageitem: localStorage["addItemlist"],
      totolprice: localStorage["totalAmount"],
      selected: "宅配到府",
      deliverway: [
        { ship: "宅配到府", charge: 70 },
        { ship: "超商取貨", charge: 100 },
      ],
      countyList: [],
      districtList: [],
      itemarr: [],
      selectedCounty: "請選擇",
      selectedDistrict: "請選擇",
      publicpath: "http://localhost/musesmuseum/public/phps/",
      mbr_id: "M0001",
      po_addr: "",
      po_phone: "",
      po_name: "",
      nowDay: "",
      po_id: "",
    };
  },
  computed: {
    items() {
      if (localStorage.length > 0) {
        let itemString = this.storageitem.split(",");
        let items = [...new Set(itemString.filter((el) => el))];
        return items;
      }
    },
    shipcharge() {
      return this.deliverway.find((way) => way.ship === this.selected);
    },
    bill() {
      return parseInt(this.totolprice) + parseInt(this.shipcharge.charge);
    },
  },
  watch: {
    districtList() {
      this.selectedDistrict = "請選擇";
    },
  },
  methods: {
    //把城市抓回來
    fetchCounty() {
      fetch(`${this.$store.state.publicpath}shopping.php`)
        .then(async (response) => {
          let countyList = await response.json();
          this.countyList = countyList[0];
          // console.log(this.countyList);
        })
        .catch((error) => {
          console.error("發生錯誤:", error);
        });
    },
    //把區域抓回來
    fetchDistricts() {
      const URL = `${this.$store.state.publicpath}shopping.php`;
      const formData = new URLSearchParams();
      formData.append("countyId", this.selectedCounty.county_id);
      // console.log(formData.get('countyId'));
      fetch(URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      })
        .then((response) => {
          return response.json();
        })
        .then((result) => {
          this.districtList = result[1];
          // console.log(this.districtList);
        })
        .catch((error) => console.log(error));
    },
    //得到訂單時間
    timeFormate() {
      let newdate = new Date();

      let year = String(newdate.getFullYear());
      let month = String(
        newdate.getMonth() + 1 < 10
          ? "0" + (newdate.getMonth() + 1)
          : newdate.getMonth() + 1
      );
      let date = String(
        newdate.getDate() < 10 ? "0" + newdate.getDate() : newdate.getDate()
      );

      this.nowDay = String(year + month + date);
    },
    //得到訂單資訊，並送回資料庫建檔
    getOrderInfo() {
      const URL = `${this.$store.state.publicpath}shopping_info.php`;
      const formDataObj = {
        mbr_id: this.mbr_id,
        po_date: this.nowDay,
        po_sum: this.bill,
        po_addr: this.po_addr,
        po_area: this.selectedDistrict.district_name,
        po_city: this.selectedCounty.county_name,
        po_phone: this.po_phone,
        po_name: this.po_name,
      };
      fetch(URL, {
        method: "POST",
        body: JSON.stringify(formDataObj),
      })
        .then((response) => {
          return response.json();
        })
        .then((result) => {
          this.fetchPO();
        })
        .catch((error) => console.log(error));
    },
    //抓取localStorage裡的商品陣列
    getitemarr() {
      this.items.forEach((it) => {
        let itemstr = [...localStorage[it].split(",")];
        return this.itemarr.push(itemstr);
      });
      console.log(this.itemarr);
    },
    //給會員編號，把該筆訂單編號抓回來
    fetchPO() {
      const URL = `${this.$store.state.publicpath}shopping_getpoid.php`;
      const formData = new URLSearchParams();
      formData.append("mbr_id", this.mbr_id);
      fetch(URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      })
        .then((response) => {
          return response.json();
        })
        .then((result) => {
          this.po_id = result[0].po_id;
          this.getOrderDLT();
        })
        .catch((error) => console.log(error));
    },
    // 得到訂單明細，並送回資料庫建檔
    async getOrderDLT() {
      for (const item of this.itemarr) {
        const URL = `${this.$store.state.publicpath}shopping_details.php`;
        const orderDLTObj = {
          po_id: this.po_id,
          prod_id: item[0],
          prod_dlt_actual_price: item[2],
          prod_dlt_qty: item[4],
          prod_dlt_total: item[2] * item[4],
        };
        try {
          const response = await fetch(URL, {
            method: "POST",
            body: JSON.stringify(orderDLTObj),
          });
          const result = await response.json();
        } catch (error) {
          console.log(error);
        }
      }
    },
  },
  mounted() {
    this.fetchCounty();
    this.timeFormate();
    if (localStorage.length > 0) {
      this.getitemarr();
    }
  },
};
</script>
<style scoped lang="scss">
@import "@/assets/sass/style.scss";
</style>

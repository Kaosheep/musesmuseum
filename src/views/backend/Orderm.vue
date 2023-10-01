<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" text="刪除" />
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>訂單編號</th>
            <th>會員編號</th>
            <th>訂單狀態</th>
            <th>金額</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in ordm" :key="index">
            <td><input type="checkbox"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.mid }}</td>
            <td>
              <p v-if="parseInt(i.statusn) === 0">處理中</p>
              <p v-else-if="parseInt(i.statusn) === 1">已確認</p>
              <p v-else-if="parseInt(i.statusn) === 2">已出貨</p>
              <p v-else>結案</p>
            </td>
            <td>{{ i.price }}</td>
            <td>
              <button class="edit" @click="showEditForm">編輯</button>
            </td>
          </tr>
        </table>
      </div>
      <form action="" class="pop" v-if="showForm" @submit.prevent="submitForm">
        <h2>編輯</h2>
        <div class="info_row">
          <div>
            <div>訂單編號</div>
            <div>OD20230001</div>
          </div>
          <div>
            <div>會員編號</div>
            <div>MM2023061901</div>
          </div>
        </div>
        <table>
          <tr>
            <th>商品編號</th>
            <th>產品名稱</th>
            <th>數量</th>
            <th>單價</th>
            <th>小計</th>
          </tr>
          <tr v-for="(i, index) in ordmd" :key="index">
            <td>{{ i.id }}</td>
            <td>{{ i.name }}</td>
            <td>{{ i.qty }}</td>
            <td>{{ i.price }}</td>
            <td>{{ i.sum }}</td>
          </tr>
          <tr class="two_line">
            <td></td>
            <td></td>
            <td></td>
            <td>總金額</td>
            <td>3,950</td>
          </tr>
        </table>
        <div class="info_row">
          <div>
            <div>訂單狀態</div>
            <div>
              <select name="" id="">
                <option value="">未上架</option>
              </select>
            </div>
          </div>
          <div>
            <div>付款狀態</div>
            <div>
              <select name="" id="">
                <option value="">未上架</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form_btn">
          <PinkButton class="btn_admin" text="刪除" @click="hideEditForm" />
          <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
          <PinkButton class="btn_admin" text="儲存" />
        </div>
      </form>
    </div>

  </div>
</template>
   
<script>
import PinkButton from "/src/components/PinkButton.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
import Addressfrom from "/src/views/backend/Address.vue";

export default {
  components: {
    Searchbar,
    Searchbarclick,
    PinkButton,
    Addressfrom
  },
  data() {
    return {
      ordm: [
        {
          id: "OD20230001",
          mid: "MM2023061901",
          statusn: "0",
          price: "1,500",
        },
        {
          id: "OD20230002",
          mid: "MM2023061901",
          statusn: "1",
          price: "3,400",
        },
        {
          id: "OD20230003",
          mid: "MM2023061901",
          statusn: "2",
          price: "3,400",
        },
        {
          id: "OD20230004",
          mid: "MM2023061901",
          statusn: "3",
          price: "3,400",
        }
      ],
      news: [],
      ordmd: [
        {
          id: "PD20230001",
          name: "小謬思銅像",
          qty: "1",
          price: "3,500",
          sum: "3,500",
        },
        {
          id: "PD20230007",
          name: "謬思聯名素T",
          qty: "1",
          price: "450",
          sum: "450",
        }

      ],
      test: [
        {
          id: "MN20230901",
          title: "「科技奇觀展」探索未來科...",
          statusn: "0",
        },
        {
          id: "MN20231101",
          title: "「古文明珍寶展」現已開展...",
          statusn: "1",

        }
      ],
      memt: [
        {
          id: "MM2023061901",
          name: "阿阿阿",
          statusn: "1",
        }, {
          id: "MM2023061902",
          name: "欸欸欸",
          statusn: "0",
        }

      ],
      exhm: [
        {
          id: "EXH20230901",
          title: "獨居沙漠，藝術家喬治亞．歐姬芙",
          statusn: "0",
        },
        {
          id: "EXH20231101",
          title: "派對對物：人要金裝，佛要...",
          statusn: "0",
        },
        {
          id: "EXH20230701",
          title: "線條、形狀、空間：建築美......",
          statusn: "0",
        },
      ],
      showForm: false
    }
  },
  methods: {
    toggleStatus(newStatus) {
      this.test.forEach(item => {
        if (item.selected) {
          item.statusn = newStatus;
        }
      });
    },
    canToggle(newStatus) {
      return this.test.some(item => item.selected && item.statusn !== newStatus);
    },
    showEditForm() {
      this.showForm = true;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
    }

  },
  mounted() {

  }
}
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";

div {
  color: #000;

  form {
    height: 80vh;
  }
}

.bTab {
  background-color: #ffffff80;
  border-radius: 10px 10px 0 0;
  border-width: 1px 1px 0 1px;
  border-style: none;
  padding: 8px;
  color: #000;
  transition: .3s;
  cursor: pointer;
}

.admin_editbar {
  display: flex;
  background-color: #f2f2f2;
  padding: 5px;
  border-radius: 10px 10px 0 0;
}

.onlyB {
  position: relative;
  box-shadow: none;
  margin-right: 0;
  width: 190px;
}

.btn_admin {
  margin-right: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  width: 70px;
  height: 40px;
  background-color: $mblue;
  color: #fff;
  border: none;
  cursor: pointer;
}

.dmain {
  position: relative;
  background-color: #ffffff80;
  height: 80%;
  border-radius: 0 10px 10px 10px;

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;

    th,
    td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    td {
      &:first-child {
        input[type="checkbox"] {
          margin-right: 5px;
        }
      }

      &:last-child {
        button {
          color: #000;
          border: none;
          cursor: pointer;
        }
      }

      p {
        margin: 0;
        padding: 5px;

      }
    }
  }

}

.pop {
  position: absolute;
  top: -1%;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  background-color: rgba(255, 248, 248);
  justify-content: center;
  align-items: center;
  z-index: 999;
  border-radius: 10px;
  overflow: auto;

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;

    th,
    td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
  }

  .two_line {
  border-top: 5px double #009CA8;
  border-bottom:2px solid #ffffff00;
}


  div {
    margin-top: 10px;

    textarea {
      width: 100%;
      background-color: #ffffff1b;
      border: 1px solid #009CA8;
      border-radius: 10px;
      resize: none;
      padding-left: 5px;
      padding-right: 5px;

    }
  }

  .needspace {
    justify-content: space-between;

    .info_price {
      display: flex;
      width: 50%;
    }
  }

  .info_row {
    display: flex;
    margin-right: 10px;
    margin-bottom: 10px;

    div {
      margin-top: 10px;
      margin-right: 10px;
    }
  }

  .img_box {
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid $mblue;
    margin-left: 30px;
  }


  .form_btn {
    position: fixed;
    right: 10px;
    bottom: 0;
  }
}
</style>
    


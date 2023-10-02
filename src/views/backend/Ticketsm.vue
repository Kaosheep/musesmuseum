<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <button class="btn_admin" @click="showEditForm('add')">新增</button>
          <button class="btn_admin" @click="toggleStatus('1')" :disabled="!canToggle('1')">上架</button>
          <button class="btn_admin" @click="toggleStatus('0')" :disabled="!canToggle('0')">下架</button>
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>訂單編號</th>
            <th>會員編號</th>
            <th>金額</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in ordm" :key="index">
            <td><input type="checkbox"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.mid }}</td>
            <td>{{ i.price }}</td>
            <td>
              <button class="edit" @click="showEditForm">編輯</button>
            </td>
          </tr>
        </table>
      </div>
      <form action="" class="pop" v-if="showForm" @submit.prevent="submitForm">
        <h2>編輯</h2>
        <div>
          <div>票種編號</div>
          <div>TK01</div>
        </div>
        <div class="info_row">
          <div>
            <div>票種名稱</div>
            <div>全票</div>
          </div>
          <div>
            <div>票價</div>
            <div>400</div>
          </div>
        </div>
        <div class="form_btn">
          <button type="button" class="btn_admin" @click="hideEditForm">取消</button>
          <button type="button" class="btn_admin" @click="addnews_btn(add_news.id)">儲存</button>
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
          id: "TK01",
          mid: "全票",
          price: "400",
        },
        {
          id: "TK02",
          mid: "孩童票",
          price: "350",
        },
        {
          id: "TK03",
          mid: "敬老票",
          price: "250",
        },
        {
          id: "TK04",
          mid: "愛心票",
          price: "200",
        }
      ],
      news: [],
      ordmd: [
        {
          id: "OTA20230001",
          name: "全票",
          qty: "1",
          price: "3,500",
          sum: "0",
        },
        {
          id: "OTA20230002",
          name: "全票",
          qty: "1",
          price: "450",
          sum: "0",
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

.btn_admin {
  margin-right: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  width: 70px;
  height: 40px;
  background-color: $mblue;
  border-radius: 4px;
  color: #fff;
  border: none;
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
    border-bottom: 2px solid #ffffff00;
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
      width: 100%;
      margin-top: 10px;
      margin-right: 10px;

      :nth-child(2) {
        border-bottom: 1px solid $mblue;
      }
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
    


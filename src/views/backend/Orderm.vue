<template>
  <div>
    <div>
      <div class="admin_editbar">
        <Searchbar
          class="onlyB"
          :functype="1"
          @update-search-text="searchClick"
        />
      </div>
      <div class="po_block">
        <div class="dmain">
          <table>
            <tr>
              <th>訂單編號</th>
              <th>會員編號</th>
              <th>訂單狀態</th>
              <th>金額</th>
              <th></th>
            </tr>
            <tr v-if="getPageItems == 0">
              <td>查無資料</td>
            </tr>
            <tr v-for="(i, index) in getPageItems" :key="index" v-else>
              <td>{{ i.po_id }}</td>
              <td>{{ i.mbr_id }}</td>
              <td>
                <p v-if="parseInt(i.po_status) === 0">處理中</p>
                <p v-else-if="parseInt(i.po_status) === 1">已確認</p>
                <p v-else-if="parseInt(i.po_status) === 2">已出貨</p>
                <p v-else>已完成</p>
              </td>
              <td>{{ formatPrice(i.po_sum) }}</td>
              <td>
                <button
                  class="edit"
                  @click="showEditForm(i.po_id, i.po_status, i.po_pay)"
                >
                  編輯
                </button>
              </td>
            </tr>
          </table>
        </div>
        <div class="page">
          <Page
            :total="searchFilter.length"
            :page-size="pageItems"
            v-model="currentPage"
          />
        </div>
      </div>
      <form
        class="pop"
        v-if="showForm"
        @submit.prevent
        v-for="(i, index) in orddlt"
        :key="index"
      >
        <h2>{{ showFormTitle }}</h2>
        <div class="info_row">
          <div>
            <div>訂單編號</div>
            <div>{{ i.po_id }}</div>
          </div>
          <div>
            <div>會員編號</div>
            <div>{{ i.mbr_id }}</div>
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
          <tr v-for="(item, index) in orddlt" :key="index">
            <td>{{ item.prod_dlt_id }}</td>
            <td class="prod_name">{{ item.prod_name }}</td>
            <td>{{ item.prod_dlt_qty }}</td>
            <td>{{ formatPrice(item.prod_dlt_actual_price) }}</td>
            <td>{{ formatPrice(item.prod_dlt_total) }}</td>
          </tr>
          <tr class="two_line">
            <td></td>
            <td></td>
            <td></td>
            <td>總金額</td>
            <td>{{ formatPrice(i.po_sum) }}</td>
          </tr>
        </table>
        <div class="info_row">
          <div>
            <div>訂單狀態</div>
            <div>
              <select v-model="selectedPoStatus">
                <option value="0">處理中</option>
                <option value="1">已確認</option>
                <option value="2">已出貨</option>
                <option value="3">已完成</option>
              </select>
            </div>
          </div>
          <div>
            <div>付款狀態</div>
            <div>
              <select v-model="selectedPoPay">
                <option value="0">未付款</option>
                <option value="1">已付款</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form_btn">
          <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
          <PinkButton
            class="btn_admin"
            text="儲存"
            @click="submitForm(i.po_id, selectedPoStatus, selectedPoPay)"
          />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import PinkButton from "/src/components/PinkButton.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Addressfrom from "/src/views/backend/Address.vue";

export default {
  components: {
    Searchbar,
    PinkButton,
    Addressfrom,
  },
  data() {
    return {
      ordlist: [],
      orddlt: [],
      showForm: false,
      selectedPoStatus: 0,
      selectedPoPay: 0,
      po_id: "",
      po_status: "",
      po_pay: "",
      currentPage: 1,
      pageItems: 10,
      searchinput: "",
      showFormTitle: "",
    };
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.ordlist.filter(
          (v) =>
            v.mbr_id?.includes(this.searchinput) ||
            v.po_id?.includes(this.searchinput)
        );
      } else {
        return this.ordlist;
      }
    },
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.searchFilter.slice(startIndex, endIndex);
    },
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  methods: {
    formatPrice(value) {
      // 方法一：正規表達式
      // return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

      // 方法二：內建的 JavaScript 函數
      return new Intl.NumberFormat("zh-TW", { style: "decimal" }).format(value);

      // "decimal"：千分位格式，將數字格式化為千分位分隔的方式，例如：1,234,567.89
      // "percent"：百分比格式，將數字轉換為百分比形式，例如：12.34%
      // "currency"：貨幣格式，將數字格式化為指定貨幣的形式，例如：$1,234.56
      // "compact"：簡潔格式，根據數字大小選擇最合適的簡潔表示法，例如：1.2M
    },
    reset() {
      this.searchinput = "";
    },
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    searchClick(text) {
      this.searchinput = text.toUpperCase();
    },
    showEditForm(id, status, pay) {
      this.showFormTitle = "編輯";
      this.po_id = id;

      const formData = new URLSearchParams();
      formData.append("po_id", this.po_id);

      fetch(`${this.$store.state.publicpath}ord_dlt.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      }).then(async (response) => {
        this.orddlt = await response.json();
      });
      this.showForm = true;
      this.selectedPoStatus = status;
      this.selectedPoPay = pay;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm(id, status, pay) {
      const formDataObj = {
        po_id: id,
        po_status: status,
        po_pay: pay,
      };
      fetch(`${this.$store.state.publicpath}ord_update.php`, {
        method: "post",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: JSON.stringify(formDataObj),
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("儲存失敗");
          }
        })
        .then((json) => {
          this.success(true, json);
          this.fetchord();
          this.orddlt = [];
        })
        .catch(function (error) {
          console.log(error);
        });
      this.hideEditForm();
    },
    fetchord() {
      fetch(`${this.$store.state.publicpath}ord.php`)
        .then(async (response) => {
          this.ordlist = await response.json();
        })
        .then((json) => {
          let blockw = document.querySelector(".po_block").offsetHeight;
          let roww = document.querySelector("tr").offsetHeight;
          this.pageItems = Math.floor(blockw / roww - 3);
        })
        .catch((error) => {
          console.error("發生錯誤:", error);
        });
    },
  },
  mounted() {
    this.fetchord();
  },
};
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
  transition: 0.3s;
  cursor: pointer;
}

.admin_editbar {
  display: flex;
  background-color: #f2f2f2;
  padding: 1.5rem 10px;
  border-radius: 10px 10px 0 0;
}

.onlyB {
  position: relative;
  box-shadow: none;
  margin-right: 0;
  width: 190px;
}

.btn_admin {
  margin: 0.8rem;
  margin-bottom: 1.5rem;
  width: 70px;
  height: 40px;
  background-color: $mblue;
  color: #fff;
  border: none;
  cursor: pointer;
}
.po_block {
  height: 65vh;
  .dmain {
    position: relative;
    background-color: #ffffff80;
    height: 100%;
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
  .page {
    margin-top: 1rem;
    text-align: center;
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
    .prod_name {
      text-align: left;
    }

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
    border-top: 5px double #009ca8;
    border-bottom: 2px solid #ffffff00;
  }

  div {
    margin-top: 10px;

    textarea {
      width: 100%;
      background-color: #ffffff1b;
      border: 1px solid #009ca8;
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

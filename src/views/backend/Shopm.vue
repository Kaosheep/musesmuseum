<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" text="新增" />
          <PinkButton class="btn_admin" text="上架" @click="toggleStatus('1')" :disabled="!canToggle('1')" />
          <PinkButton class="btn_admin" text="下架" @click="toggleStatus('0')" :disabled="!canToggle('0')" />
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>商品編號</th>
            <th>商品名稱</th>
            <th>狀態</th>
            <th></th>
          </tr>
          <tr v-for="(item) in getPageItems" :key="item.prod_id">
            <td><input type="checkbox"></td>
            <td>{{ item.prod_id }}</td>
            <td>{{ item.prod_name }}</td>
            <td>
              <p v-if="parseInt(item.prod_status) === 1">已上架</p>
              <p v-else>未上架</p>
            </td>
            <td>
              <button class="edit" @click="showEditForm('edit', i.prod_id)">編輯</button>
            </td>
          </tr>
        </table>
      </div>
      <form class="pop" v-for="(item) in produstdislist" :key="item.prod_id" v-if="showForm" @submit.prevent="submitForm">
        <h2>編輯</h2>
        <div class="info_col">
          <div>
            <div>商品編號</div>
            <div>{{ item.prod_id }}</div>
          </div>
          <div>
            <div>產品名稱</div>
            <div>{{ item.prod_name }}</div>
          </div>
        </div>
        <div>
          <div>商品敘述</div>
          <textarea cols="30" rows="5">{{ item.prod_desc }}</textarea>
        </div>
        <div class="info_col needspace">
          <div>
            <div>商品規格</div>
            <textarea cols="30" rows="5">{{ item.prod_spec }}</textarea>
          </div>
          <div class="info_price">
            <div>
              <div>定價</div>
              <div>{{ item.prod_fixedprice }}</div>
            </div>
            <div>
              <div>售價</div>
              <div>{{ item.prod_sellingprice }}</div>
            </div>
          </div>
        </div>
        <div>
          <div>狀態</div>
          <div>
            <select>
              <option value="">未上架</option>
              <option value="">已上架</option>
            </select>
            <input type="file" id="fileInput" accept="image/*" style="display: none;" />
            <label class="img_box" for="fileInput">+選擇圖片</label>
            <div class="img_wrap">
              <img src="" alt="" id="img1" width="50">
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
    <div class="page">
      <Page :total="searchFilter.length" :page-size="pageItems" v-model="currentPage" />
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
      produstdislist: [],
      showForm: false,
      publicpath: "http://localhost/musesmuseum/public/phps/",
      currentPage: 1,
      pageItems: 10,
      searchinput: "",
    }
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.produstdislist.filter((v) =>
          v.prod_name?.includes(this.searchinput)
        );
      } else {
        return this.produstdislist
      }
    },
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.searchFilter.slice(startIndex, endIndex);
    },
  },
  watch: {},
  methods: {
    toggleStatus(newStatus) {
      this.produstdislist.forEach(item => {
        if (item.selected) {
          item.prod_status = newStatus;
        }
      });
    },
    canToggle(newStatus) {
      return this.produstdislist.some(item => item.selected && item.prod_status !== newStatus);
    },
    showEditForm() {
      this.showForm = true;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
    },
    showEditForm(type, id) {
      if (type == "add") {
        this.addprod = false;
        this.add_prod = [
          {
            id: "",
            title: "",
            content: "",
            date: "",
            image: "",
          },
        ];
      } else {
        this.addprod = true;
      }
      if (type == "edit") {
        const url = `http://localhost/musesmuseum/public/phps/prod_list.php`;
        let headers = {
          "Content-Type": "application/json",
          Accept: "application/json",
        };
        let body = {
          id: id,
        };
        fetch(url, {
          method: "POST",
          headers: headers,
          body: JSON.stringify({ data: body }),
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("取得失敗");
            }
          })
          .then((json) => {
            this.add_prod.title = json.prod_title;
            this.add_prod.content = json.prod_content;
            this.add_prod.date = json.prod_date;
            this.add_prod.id = json.prod_id;
            this.status = json.prod_status;
            this.add_prod.image = json.prod_img;
          });
      }
      this.showForm = true;
    },
    fetchprod() {
      fetch(`${this.publicpath}shop.php`).then(async (response) => {
        this.produstdislist = await response.json();
        console.log(this.produstdislist);
      })
        .catch((error) => {
          console.error('發生錯誤:', error);
        });
    },
  },
  mounted() {
    this.fetchprod();
  },
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

  .info_col {
    display: flex;
    margin-right: 10px;
    margin-bottom: 10px;



    div {
      width: 100%;
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
    position: relative;
  }
}
.page{
  margin: 2rem 0;
  text-align: center;
}
</style>
    


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
          <tr v-for="item in getPageItems" :key="item.prod_id">
            <td><input type="checkbox"></td>
            <td>{{ item.prod_id }}</td>
            <td>{{ item.prod_name }}</td>
            <td>
              <p v-if="parseInt(item.prod_status) === 1">已上架</p>
              <p v-else>未上架</p>
            </td>
            <td>
              <button class="edit" @click="showEditForm('edit', item.prod_id)">編輯</button>
            </td>
          </tr>
        </table>
      </div>
      <form action="" class="pop" v-show="showForm" @submit.prevent="submitForm" id="edform">
        <h2>編輯</h2>
        <div class="info_col" v-show="addprod">
          <div>
            <div>商品編號</div>
            <div v-text="add_prod.id"></div>
          </div>
          <div>
            <div>產品名稱</div>
            <textarea v-model="add_prod.name"></textarea>
          </div>
        </div>
        <div>
          <div>商品敘述</div>
          <textarea cols="30" rows="5" v-model="add_prod.desc"></textarea>
        </div>
        <div class="info_col needspace">
          <div>
            <div>商品規格</div>
            <textarea cols="30" rows="5" v-model="add_prod.spec"></textarea>
          </div>
          <div class="info_price">
            <div>
              <div>定價</div>
              <textarea v-model="add_prod.fixedprice"></textarea>
            </div>
            <div>
              <div>售價</div>
              <textarea v-model="add_prod.sellingprice"></textarea>
            </div>
          </div>
        </div>
        <div>
          <div>狀態</div>
          <div>
            <select>
              <option value="0">未上架</option>
              <option value="1">已上架</option>
            </select>
            <div class="uploadblock">
              <label for="fileimg">
                <p v-if="add_prod.img == null">上傳圖片</p>
                <p v-else>{{ add_prod.img }}</p>

                <input @change="img($event)" type="file" id="fileimg" style="display: none" />
                <img v-if="add_prod.img == null" :src="`${$store.state.imgpublicpath}image/productimage/.png`" />
                <img v-else :src="`${$store.state.imgpublicpath}image/productimage/` + add_prod.img
                  " alt="" />
              </label>
            </div>
          </div>
        </div>
        <div class="form_btn">
          <PinkButton class="btn_admin" text="刪除" @click="deleten" />
          <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
          <PinkButton class="btn_admin" text="儲存" @click="addnews_btn(add_prod.id)"/>
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
      wchecked: false,
      addprod: false,
      showForm: false,
      publicpath: "http://localhost/musesmuseum/public/phps/",
      status: 0,
      src: 0,
      currentPage: 1,
      pageItems: 10,
      searchinput: "",
      prodsched: [],
      add_prod: [
        {
          id: "",
          name: "",
          desc: "",
          img: "",
          sellingprice: "",
          fixedprice: "",
          spec: "",
          kind: "",
        },
      ],
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
    deleten() {
      if (window.confirm("確認刪除資料?")) {
        fetch(`${this.$store.state.publicpath}shop_del.php`, {
          method: "post",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
          },
          body: JSON.stringify({ data: Object.values(this.prodsched) }),
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            alert(json);
            window.location.reload();
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
    inchecked(id, e) {
      if (e.target.checked) {
        this.prodsched.push({ id: id });
        console.log(this.prodsched);
        console.log(Object.values(this.prodsched));
      } else {
        this.prodsched.splice(this.prodsched.indexOf(id), 1);
        console.log(this.prodsched);
      }
    },
    updatestatus(b) {
      this.prodsched.splice(0, 0, { type: b });
      fetch(`${this.$store.state.publicpath}shop_updatestatus.php`, {
        method: "post",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: JSON.stringify({ data: Object.values(this.prodsched) }),
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("新增失敗");
          }
        })
        .then((json) => {
          alert(json);
          window.location.reload();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
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
            name: "",
            desc: "",
            img: "",
            sellingprice: "",
            fixedprice: "",
            spec: "",
            kind: "",
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
            this.add_prod.id = json.prod_id;
            this.add_prod.name = json.prod_name;
            this.add_prod.desc = json.prod_desc;
            this.add_prod.img = json.prod_img;
            this.add_prod.fixedprice = json.prod_fixedprice;
            this.add_prod.spec = json.prod_spec;
            this.add_prod.sellingprice = json.prod_sellingprice;
            this.status = json.prod_status;
            this.add_prod.kind = json.prod_kind;
          });
      }
      this.showForm = true;
    },
    fetchprod() {
      fetch(`${this.$store.state.publicpath}shop.php`).then(async (response) => {
        this.produstdislist = await response.json();
        console.log(this.produstdislist);
      })
        .catch((error) => {
          console.error('發生錯誤:', error);
        });
    },
    addprod_btn(id) {
      if (id != undefined) {
        const url = `http://localhost/musesmuseum/public/phps/shop_updateupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_prod.id);
        formData.append("name", this.add_prod.name);
        formData.append("desc", this.add_prod.desc);
        formData.append("status", this.status);
        formData.append("kind", this.add_prod_kind);
        formData.append("fixedprice", this.add_prod.fixedprice);
        formData.append("spec", this.spec);
        formData.append("sellingprice", this.add_prod_sellingprice);
        formData.append("img", document.getElementById("fileimg").files[0]);

        fetch(url, {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            alert(json);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        const url = `http://localhost/musesmuseum/public/phps/shop_insertupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_prod.id);
        formData.append("name", this.add_prod.name);
        formData.append("desc", this.add_prod.desc);
        formData.append("status", this.status);
        formData.append("kind", this.add_prod_kind);
        formData.append("fixedprice", this.add_prod.fixedprice);
        formData.append("spec", this.spec);
        formData.append("sellingprice", this.add_prod_sellingprice);
        formData.append("img", document.getElementById("fileimg").files[0]);

        fetch(url, {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            alert(json);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error.message);
          });
      }
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

.uploadblock {
  margin-top: 1.5rem;
  border: 1px solid #009ca8;
  width: 100%;
  height: 350px;
  text-align: center;
  border-radius: 10px;
  padding: 1rem;
  line-height: 2;

  input {
    border: none;
  }

  img {
    width: 90%;
    height: 80%;
    object-fit: contain;
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

.page {
  margin: 2rem 0;
  text-align: center;
}
</style>
    


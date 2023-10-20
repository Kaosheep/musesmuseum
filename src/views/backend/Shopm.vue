<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <PinkButton
            class="btn_admin"
            @click="showEditForm('add')"
            text="新增"
          />
          <PinkButton class="btn_admin" text="上架" @click="updatestatus(1)" />
          <PinkButton class="btn_admin" text="下架" @click="updatestatus(0)" />
        </div>
        <Searchbar
          class="onlyB"
          :functype="1"
          @update-search-text="searchClick"
        />
      </div>
      <div class="prods_block">
        <div class="dmain">
          <table>
            <tr>
              <th></th>
              <th>商品編號</th>
              <th>商品名稱</th>
              <th>狀態</th>
              <th></th>
            </tr>
            <tr v-if="getPageItems == 0">
              <td>查無資料</td>
            </tr>
            <tr v-for="item in getPageItems" :key="item.prod_id" v-else>
              <td>
                <input
                  class="statusinput"
                  type="checkbox"
                  @change="inchecked(item.prod_id, $event)"
                />
              </td>
              <td>{{ item.prod_id }}</td>
              <td class="prod_name">{{ item.prod_name }}</td>
              <td>
                <p v-if="parseInt(item.prod_status) === 1">已上架</p>
                <p v-else>未上架</p>
              </td>
              <td>
                <button
                  class="edit"
                  @click="showEditForm('edit', item.prod_id)"
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
      <form class="pop" v-show="showForm" @submit.prevent id="edform">
        <h2>{{ showFormTitle }}</h2>
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
          <div>
            <div>分類</div>
            <textarea v-model="add_prod.kind"></textarea>
          </div>
          <div class="info_price">
            <div>
              <div>定價</div>
              <textarea v-model="formatFixedPrice"></textarea>
            </div>
            <div>
              <div>售價</div>
              <textarea v-model="formatSellingPrice"></textarea>
            </div>
          </div>
        </div>
        <div>
          <div>狀態</div>
          <div>
            <select v-model="add_prod.status">
              <option :value="0">未上架</option>
              <option :value="1">已上架</option>
            </select>
            <div class="uploadblock">
              <label for="fileimg">
                <p v-if="add_prod.src == null">上傳圖片</p>
                <p v-else>{{ add_prod.img }}</p>

                <input
                  @change="img($event)"
                  type="file"
                  id="fileimg"
                  style="display: none"
                />
                <img
                  v-if="add_prod.src == null"
                  :src="`${$store.state.imgpublicpath}image/productimage/u.png`"
                />
                <img v-else :src="add_prod.src" alt="" />
              </label>
            </div>
          </div>
        </div>
        <div class="form_btn">
          <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
          <PinkButton
            class="btn_admin"
            text="儲存"
            save
            @click="addprod_btn(add_prod.id)"
          />
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
    Addressfrom,
  },
  data() {
    return {
      produstdislist: [],
      wchecked: false,
      addprod: false,
      showForm: false,
      publicpath: "http://localhost/musesmuseum/public/phps/",
      src: 0,
      currentPage: 1,
      pageItems: 10,
      showFormTitle: "",
      searchinput: "",
      prodched: [],
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
          status: "",
          src: "",
        },
      ],
    };
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.produstdislist.filter((v) =>
          v.prod_name?.includes(this.searchinput)
        );
      } else {
        return this.produstdislist;
      }
    },
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.searchFilter.slice(startIndex, endIndex);
    },
    formatSellingPrice: {
      get() {
        if (this.add_prod.sellingprice == undefined) {
          return (this.add_prod.fixedprice = 0);
        } else {
          return new Intl.NumberFormat("zh-TW", { style: "decimal" }).format(
            this.add_prod.sellingprice
          );
        }
      },
      set(newValue) {
        const valueWithoutCommas = parseFloat(newValue.replace(/,/g, ""));

        if (!isNaN(valueWithoutCommas)) {
          this.add_prod.sellingprice = valueWithoutCommas;
        }
      },
    },
    formatFixedPrice: {
      get() {
        if (this.add_prod.fixedprice == undefined) {
          return (this.add_prod.fixedprice = 0);
        } else {
          return new Intl.NumberFormat("zh-TW", { style: "decimal" }).format(
            this.add_prod.fixedprice
          );
        }
      },
      set(newValue) {
        const valueWithoutCommas = parseFloat(newValue.replace(/,/g, ""));

        if (!isNaN(valueWithoutCommas)) {
          this.add_prod.fixedprice = valueWithoutCommas;
        }
      },
    },
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  methods: {
    formatPrice(value) {
      return new Intl.NumberFormat("zh-TW", { style: "decimal" }).format(value);
    },
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    warning(nodesc, w) {
      this.$Notice.warning({
        title: w,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    img(e) {
      let that = this;
      let files = e.target.files[0];
      if (!e || !window.FileReader) return;
      let reader = new FileReader();
      reader.readAsDataURL(files);

      reader.onloadend = function () {
        that.add_prod.img = files.name;
        that.add_prod.src = this.result;
      };
    },
    inchecked(id, e) {
      if (e.target.checked) {
        this.prodched.push({ id: id });
      } else {
        this.prodched.splice(this.prodched.indexOf(id), 1);
      }
    },
    updatestatus(b) {
      this.prodched.splice(0, 0, { type: b });
      fetch(`${this.$store.state.publicpath}shop_updatestatus.php`, {
        method: "post",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: JSON.stringify({ data: Object.values(this.prodched) }),
      })
        .then((response) => {
          if (response.ok) {
            return response.json();
          } else {
            throw new Error("新增失敗");
          }
        })
        .then((json) => {
          this.success(true, json);
          this.fetchprod();
          this.prodched = [];
          document.querySelectorAll(".statusinput").forEach((inputb) => {
            inputb.checked = false;
          });
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
    },
    showEditForm(type, id) {
      if (type == "add") {
        this.showFormTitle = "新增";
        this.addprod = true;
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
            status: "",
            src: "",
          },
        ];
      } else {
        this.addprod = true;
      }
      if (type == "edit") {
        this.showFormTitle = "編輯";
        const url = `${this.$store.state.publicpath}prod_list.php`;
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
              throw new Error("取得商品失敗");
            }
          })
          .then((json) => {
            this.add_prod.id = json.prod_id;
            this.add_prod.name = json.prod_name;
            this.add_prod.desc = json.prod_desc;
            this.add_prod.fixedprice = json.prod_fixedprice;
            this.add_prod.spec = json.prod_spec;
            this.add_prod.sellingprice = json.prod_sellingprice;
            this.add_prod.status = json.prod_status;
            this.add_prod.kind = json.prod_kind;
            this.add_prod.img = json.prod_img;
            this.add_prod.src = `${this.$store.state.imgpublicpath}image/productimage/${json.prod_img}`;
          });
      }
      this.showForm = true;
    },
    fetchprod() {
      fetch(`${this.$store.state.publicpath}shop_prod_list.php`)
        .then(async (response) => {
          this.produstdislist = await response.json();
        })
        .then((json) => {
          let blockw = document.querySelector(".prods_block").offsetHeight;
          let roww = document.querySelector("tr").offsetHeight;
          this.pageItems = Math.floor(blockw / roww - 3);
        })
        .catch((error) => {
          console.error("發生錯誤:", error);
        });
    },
    //新增
    addprod_btn(id) {
      if (id != undefined) {
        const url = `${this.$store.state.publicpath}shop_updateupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_prod.id);
        formData.append("name", this.add_prod.name);
        formData.append("desc", this.add_prod.desc);
        formData.append("status", this.add_prod.status);
        formData.append("kind", this.add_prod.kind);
        formData.append("fixedprice", this.add_prod.fixedprice);
        formData.append("spec", this.add_prod.spec);
        formData.append("sellingprice", this.add_prod.sellingprice);
        if (document.getElementById("fileimg").files[0]) {
          formData.append("img", document.getElementById("fileimg").files[0]);
        } else {
          formData.append("img", this.add_prod.img);
        }

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
            this.success(true, json);
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        if (this.add_prod_name === null) {
          this.warning(true, "請輸入產品名稱");
        } else if (this.add_prod_desc === null) {
          this.warning(true, "請輸入商品敘述");
        } else if (this.add_prod_spec === null) {
          this.warning(true, "請輸入商品規格");
        } else if (this.add_prod_kind === null) {
          this.warning(true, "請輸入分類");
        } else if (this.add_prod_fixedprice === null) {
          this.warning(true, "請輸入定價");
        } else if (this.add_prod_sellingprice === null) {
          this.warning(true, "請輸入售價");
        } else if (this.add_prod_img === null) {
          this.warning(true, "未選擇圖片");
        } else {
          const url = `${this.$store.state.publicpath}shop_insertupload.php`;
          const formData = new FormData();
          this.add_prod.id = 0;
          formData.append("id", this.add_prod.id);
          formData.append("name", this.add_prod.name);
          formData.append("desc", this.add_prod.desc);
          formData.append("status", this.add_prod.status);
          formData.append("kind", this.add_prod.kind);
          formData.append("fixedprice", this.add_prod.fixedprice);
          formData.append("spec", this.add_prod.spec);
          formData.append("sellingprice", this.add_prod.sellingprice);
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
              this.hideEditForm();
              this.success(true, json);
              this.fetchprod();
              this.add_prod = [];
            })
            .catch((error) => {
              console.log(error.message);
            });
        }
      }
    },
    searchClick(text) {
      this.searchinput = text.toUpperCase();
    },
  },
  mounted() {
    this.fetchprod();
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
  margin-left: 1rem;
  width: 70px;
  height: 35px;
  background-color: $mblue;
  color: #fff;
  border: none;
  cursor: pointer;
}
.prods_block {
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
      margin-top: 0px;
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
</style>

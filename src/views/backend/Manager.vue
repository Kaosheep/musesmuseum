<template>
  <div class="wrap">
    <div class="admin_editbar">
      <div>
        <button class="btn_admin" @click="showEditForm('add')">新增</button>
        <button class="btn_admin" @click="deleten">刪除</button>
      </div>
      <Searchbar class="onlyB" />
    </div>
    <div class="man_block">
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>管理員編號</th>
            <th>管理員名稱</th>
            <th>權限類型</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in manager" :key="index">
            <td>
              <input
                type="checkbox"
                class="statusinput"
                @change="inchecked(i.ma_id, $event)"
                v-show="i.ma_id != 'MA001'"
              />
            </td>
            <td>{{ i.ma_id }}</td>
            <td>{{ i.ma_name }}</td>
            <td>
              <p v-if="parseInt(i.ma_type) === 1">全權</p>
              <p v-else>部分</p>
            </td>
            <td>
              <button
                class="edit"
                v-show="i.ma_id != 'MA001'"
                @click="showEditForm('edit', i.ma_id)"
              >
                編輯
              </button>
            </td>
          </tr>
        </table>
        <form action="" class="pop" v-show="showForm">
          <h2>編輯</h2>
          <div v-show="addnews">
            <div>管理員編號</div>
            <div v-text="add_news.id"></div>
          </div>
          <div>
            <div>管理員名稱</div>
            <input type="text" v-model="add_news.name" />
            <span v-if="nameError || !add_news.name">請輸入正確名稱</span>
          </div>
          <div>
            <div>e-mail</div>
            <input type="email" v-model="add_news.email" />
            <span v-if="emailError || !isValidEmail(add_news.email)"
              >請輸入正確email</span
            >
          </div>
          <div>
            <div>
              <div>密碼</div>
              <input type="password" v-model="add_news.psw" />
              <span v-if="passwordError || !add_news.psw">請輸入正確密碼</span>
            </div>
          </div>
          <div class="switch_status">
            <div>狀態</div>
            <select v-model="type">
              <option value="1">全權</option>
              <option value="0">部分</option>
            </select>
          </div>
          <div class="form_btn">
            <button type="button" class="btn_admin" @click="hideEditForm">取消</button>
            <button type="button" class="btn_admin" @click="addnews_btn(add_news.id)">
              儲存
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import PinkButton from "/src/components/PinkButton.vue";
import Searchbar from "/src/components/Searchbar.vue";
import Searchbarclick from "/src/components/Searchbarclick.vue";
export default {
  components: {
    Searchbar,
    Searchbarclick,
    PinkButton,
  },
  data() {
    return {
      manager: [],
      newsched: [],
      add_news: [
        {
          id: "",
          name: "",
          email: "",
          psw: "",
          type: "",
        },
      ],
      showForm: false,
      addnews: false,
      passwordError: false,
      nameError: false,
      emailError: false,
      type: 0,
    };
  },
  methods: {
    isValidEmail(email) {
      const emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$/;
      return emailRegex.test(email);
    },
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    error(nodesc, json) {
      this.$Notice.error({
        title: json,
        desc: nodesc ? "" : "This is an error tip",
      });
    },

    addnews_btn(id) {
      // 检查各个字段是否为空
      if (!this.add_news.name || !this.add_news.email || !this.add_news.psw) {
        // 如果有任何字段为空，显示错误信息
        if (!this.add_news.name) {
          this.nameError = true;
        } else {
          this.nameError = false;
        }
        if (!this.add_news.email) {
          this.emailError = true;
          
        } else {
          this.emailError = false;
        }
        if (!this.add_news.psw) {
          this.passwordError = true;
        } else {
          this.passwordError = false;
        }
        this.error(true, "資料錯誤,重新輸入");
        this.fetchnew();
        this.add_news = [];
        return; // 阻止提交
      }

      // 如果所有字段都不为空，清除错误信息
      this.nameError = false;
      this.emailError = false;
      this.passwordError = false;

      if (id !== undefined) {
   
        const url = `${this.$store.state.publicpath}manager_updateupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_news.id);
        formData.append("name", this.add_news.name);
        formData.append("email", this.add_news.email);
        formData.append("psw", this.add_news.psw);
        formData.append("type", this.add_news.type);

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
            this.fetchnew();
            this.add_news = [];
            this.showForm = false;
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        const url = `${this.$store.state.publicpath}manager_insertupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_news.id);
        formData.append("name", this.add_news.name);
        formData.append("psw", this.add_news.psw);
        formData.append("email", this.add_news.email);
        formData.append("type", this.add_news.type);
        fetch(url, {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (response) {
              return response.json();
            } else {
              throw new Error("新增失敗");
            }
          })
          .then((json) => {
            this.success(true, json);
            this.fetchnew();
            this.add_news = [];
            this.showForm = false;
          })
          .catch((error) => {
            console.log(error.message);
          });
      }
    },
    hideEditForm() {
      this.type = 0 ;
      this.showForm = false;
    },
    deleten() {
      if (window.confirm("確認刪除資料?")) {
        fetch(`${this.$store.state.publicpath}manager_del.php`, {
          method: "post",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
          },
          body: JSON.stringify({ data: Object.values(this.newsched) }),
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
            this.fetchnew();
            this.newsched = [];
            document.querySelectorAll(".statusinput").forEach((inputb) => {
              inputb.checked = false;
            });
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
    inchecked(id, e) {
      if (e.target.checked) {
        this.newsched.push({ id: id });
      } else {
        this.newsched.splice(this.newsched.indexOf(id), 1);
      }
    },
    fetchnew() {
      //先檢查資料格式是否符合DB規則
      const url = `${this.$store.state.publicpath}manager_list.php`;
      let headers = {
        "Content-Type": "application/json",
        Accept: "application/json",
      };
      fetch(url, {
        method: "POST",
        headers: headers,
      })
        .then((response) => {
          if (response.ok) {
            return response.json(); // 如果請求成功，解析JSON數據
          } else {
            throw new Error("取得消息失敗"); // 如果請求不成功，拋出錯誤
          }
        })
        .then((json) => {
          this.manager = json;
          let blockw = document.querySelector(".man_block").offsetHeight;
          let roww = document.querySelector("tr").offsetHeight;
          this.pageSize = Math.floor(blockw / roww - 3);
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
    showEditForm(type, id) {
      if (type == "add") {
        this.addnews = false;
        this.add_news = [
          {
            id: "",
            name: "",
            email: "",
            psw: "",
            type: "",
          },
        ];
      } else if (type == "edit") {
        this.addnews = true;
        const url = `${this.$store.state.publicpath}manager_list.php`;
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
            this.add_news.id = json.ma_id;
            this.add_news.name = json.ma_name;
            this.add_news.email = json.ma_email;
            this.add_news.psw = json.ma_psw;
            this.type = json.ma_type;
          });
      }

      this.showForm = true;
    },
  },
  mounted() {
    this.fetchnew();
  },
};
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";
.wrap * {
  color: black;
  h2 {
    color: $mblue;
  }
}
// class="ivu-menu-item ivu-menu-item-active ivu-menu-item-selected"
.ivu-menu-item-selected{
  color: black;
}
.ivu-menu-light.ivu-menu-vertical .ivu-menu-item-active:not(.ivu-menu-submenu){
  color: black;
}
div {
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
  border-radius: 4px;
  color: #fff;
  border: none;
  cursor: pointer;
}

.man_block {
  height: 70vh;
  .dmain {
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
            border: none;
            padding: 5px 10px;
            cursor: pointer;
          }
        }

        p {
          margin: 0;
          padding: 5px;
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
      > div {
        margin-top: 10px;
      }

      .xedit {
        display: flex;

        div {
          margin-right: 10px;
        }
      }

      .newsdate {
        display: inline-block;
      }

      input,
      textarea {
        background-color: #ffffff1b;
        border: 1px solid #009ca8;
        border-radius: 10px;
        resize: none;
        padding-left: 5px;
        padding-right: 5px;
      }

      .img_wrap {
        width: 100%;
        background-color: #000;
      }

      .form_btn {
        position: fixed;
        bottom: 0;
        right: 20px;
      }
    }
  }
}
</style>

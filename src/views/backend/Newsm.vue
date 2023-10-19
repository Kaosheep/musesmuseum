<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <button class="btn_admin" @click="showEditForm('add')">新增</button>
          <button class="btn_admin" @click="updatestatus(1)">上架</button>
          <button class="btn_admin" @click="updatestatus(0)">下架</button>
          <button class="btn_admin" @click="deleten">刪除</button>
        </div>
        <Searchbar
          class="onlyB"
          :functype="1"
          @update-search-text="searchClick"
        />
      </div>
      <div class="news_block">
        <div class="dmain">
          <table>
            <tr>
              <th></th>
              <th>新增時間</th>
              <th>消息標題</th>
              <th>狀態</th>
              <th></th>
            </tr>
            <tr v-if="pagenews == 0">
              <td colspan="2" style="width: 100%; white-space: nowrap">
                查無資料
              </td>
            </tr>
            <tr v-for="(i, index) in pagenews" :key="index" v-else>
              <td>
                <input
                  type="checkbox"
                  class="statusinput"
                  @change="inchecked(i.news_id, $event)"
                />
              </td>
              <td>{{ i.news_date }}</td>
              <td class="tdtit">{{ i.news_title }}</td>
              <td>
                <p v-if="parseInt(i.news_status) === 1">上架中</p>
                <p v-else>未上架</p>
              </td>
              <td>
                <button class="edit" @click="showEditForm('edit', i.news_id)">
                  編輯
                </button>
              </td>
            </tr>
          </table>
        </div>
        <div class="pagination">
          <button @click="previousPage" :disabled="currentPage === 1">
            上一頁
          </button>
          <button @click="nextPage" :disabled="currentPage === totalPages">
            下一頁
          </button>
        </div>
      </div>
      <form class="pop" v-show="showForm" @submit.prevent id="edform">
        <h2>編輯</h2>
        <div class="xedit" v-show="addnews">
          <div>
            <div>消息編號</div>
            <div v-text="add_news.id"></div>
          </div>
        </div>
        <div class="newsdate">
          <div>日期</div>
          <input type="date" v-model="add_news.date" />
        </div>

        <div>
          <div>標題</div>
          <input type="text" name="" id="" v-model="add_news.title" />
          <div>內容</div>
          <textarea
            name=""
            id=""
            cols="30"
            rows="7"
            v-model="add_news.content"
          ></textarea>
          <div class="switch_status">
            <div>狀態</div>
            <select v-model="status">
              <option value="1">上架中</option>
              <option value="0">未上架</option>
            </select>

            <div class="uploadblock">
              <label for="fileimg">
                <p v-if="add_news.src == null">上傳圖片</p>
                <p v-else>{{ add_news.image }}</p>

                <input
                  @change="img($event)"
                  type="file"
                  id="fileimg"
                  style="display: none"
                />
                <img
                  v-if="add_news.src == null"
                  :src="`${$store.state.imgpublicpath}image/news/u.png`"
                />
                <img v-else :src="add_news.src" alt="" />
              </label>
            </div>
          </div>

          <div class="form_btn">
            <button type="button" class="btn_admin" @click="hideEditForm">
              取消
            </button>
            <button class="btn_admin save" @click="addnews_btn(add_news.id)">
              儲存
            </button>
          </div>
        </div>
      </form>
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
      news: [],
      add_news: [
        {
          id: "",
          title: "",
          content: "",
          date: "",
          src: "",
          image: "",
          status: "",
        },
      ],
      newsched: [],
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
        },
      ],
      searchinput: "",
      wchecked: false,
      showForm: false,
      addnews: false,
      status: 0,
      src: 0,
      currentPage: 1, // 當前頁碼
      pageSize: 6, // 每頁顯示的數據量
    };
  },
  methods: {
    warning(nodesc, w) {
      this.$Notice.warning({
        title: w,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    searchClick(text) {
      this.searchinput = text;
    },
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    deleten() {
      if (window.confirm("確認刪除資料?")) {
        fetch(`${this.$store.state.publicpath}news_del.php`, {
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
    updatestatus(b) {
      this.newsched.splice(0, 0, { type: b });
      fetch(`${this.$store.state.publicpath}news_updatestatus.php`, {
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
    },
    previousPage() {
      // 切換到上一頁
      if (this.currentPage > 1) {
        this.currentPage--;
      }
      document.querySelectorAll(".statusinput").forEach((inputb) => {
        inputb.checked = false;
      });
    },
    nextPage() {
      // 切換到下一頁
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
      document.querySelectorAll(".statusinput").forEach((inputb) => {
        inputb.checked = false;
      });
    },
    img(e) {
      let that = this;
      let files = e.target.files[0];
      if (!files || !(files instanceof Blob) || !window.FileReader) return;
      let reader = new FileReader();
      reader.readAsDataURL(files);

      reader.onloadend = function () {
        that.add_news.src = this.result;
        that.add_news.image = files.name;
      };
    },
    showEditForm(type, id) {
      if (type == "add") {
        this.addnews = false;
        this.add_news = [
          {
            id: "",
            title: "",
            content: "",
            date: "",
            src: "",
            image: "",
            status: "",
          },
        ];
      } else {
        this.addnews = true;
      }
      if (type == "edit") {
        const url = `${this.$store.state.publicpath}news_list.php`;
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
            this.add_news.title = json.news_title;
            this.add_news.content = json.news_content;
            this.add_news.date = json.news_date;
            this.add_news.id = json.news_id;
            this.status = json.news_status;
            this.add_news.image = json.news_img;
            this.add_news.src = `${this.$store.state.imgpublicpath}image/news/${json.news_img}`;
          });
      }

      this.showForm = true;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
    },
    //新增
    addnews_btn(id) {
      if (id != undefined) {
        const url = `${this.$store.state.publicpath}news_updateupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_news.id);
        formData.append("title", this.add_news.title);
        formData.append("content", this.add_news.content);
        formData.append("status", this.status);
        formData.append("date", this.add_news.date);
        if (document.getElementById("fileimg").files[0]) {
          formData.append("image", document.getElementById("fileimg").files[0]);
        } else {
          formData.append("image", this.add_news.image);
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
            this.hideEditForm();
            this.success(true, json);
            this.fetchnew();
            this.add_news = [];
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        if (this.add_news.date == undefined) {
          this.warning(true, "未輸入日期");
        } else if (this.add_news.title == undefined) {
          this.warning(true, "未輸入標題");
        } else if (this.add_news.content == undefined) {
          this.warning(true, "未輸入內容");
        } else if (this.add_news.image == undefined) {
          this.warning(true, "未選擇圖片");
        } else {
          const url = `${this.$store.state.publicpath}news_insertupload.php`;
          const formData = new FormData();
          formData.append("id", this.add_news.id);
          formData.append("title", this.add_news.title);
          formData.append("content", this.add_news.content);
          formData.append("status", this.status);
          formData.append("date", this.add_news.date);
          formData.append("image", document.getElementById("fileimg").files[0]);

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
              this.fetchnew();
              this.add_news = [];
            })
            .catch((error) => {
              console.log(error.message);
            });
        }
      }
    },
    fetchnew() {
      const url = `${this.$store.state.publicpath}news_list.php`;
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
          this.news = json;
          let blockw = document.querySelector(".news_block").offsetHeight;
          let roww = document.querySelector("tr").offsetHeight;
          this.pageSize = Math.floor(blockw / roww - 3);
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
  },
  computed: {
    searchFilter() {
      if (this.searchinput) {
        return this.news.filter(
          (v) =>
            v.news_title?.includes(this.searchinput) ||
            v.news_date?.includes(this.searchinput)
        );
      } else {
        return this.news;
      }
    },
    pagenews() {
      const start = (this.currentPage - 1) * this.pageSize;
      const end = start + this.pageSize;
      return this.searchFilter.slice(start, end);
    },
    totalPages() {
      // 計算總頁數
      return Math.ceil(this.searchFilter.length / this.pageSize);
    },
  },
  watch: {
    searchinput() {
      this.currentPage = 1;
    },
  },
  mounted() {
    this.fetchnew();
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
  width: 68px;
  height: 40px;
  background-color: $mblue;
  border-radius: 4px;
  color: #fff;
  border: none;
  cursor: pointer;
}
.news_block {
  height: 70vh;
  .dmain {
    background-color: #ffffff80;
    height: 100%;
    border-radius: 0 10px 10px 10px;

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      table-layout: fixed;
      th,
      td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ccc;
      }

      th {
        background-color: #f2f2f2;
        font-weight: bold;
        &:nth-child(1) {
          width: 8%;
        }
        &:nth-child(2) {
          width: 15%;
        }
        &:nth-child(3) {
          width: 55%;
        }
      }
      tr {
        .tdtit {
          width: 100%;
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis;
          text-align: start;
        }
        td {
          &:first-child {
            input[type="checkbox"] {
              margin-right: 5px;
              width: 100%;
              height: 16px;
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
  }
  .pagination {
    margin-top: 5px;
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
    width: 100%;
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
</style>

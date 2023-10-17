<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <button class="btn_admin" @click="showEditForm('add')">新增</button>
          <button class="btn_admin" @click="deleten">刪除</button>
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="faq_block">
        <div class="dmain">
          <table>
            <tr>
              <th></th>
              <th>問題</th>
              <th>答案</th>
              <th></th>
            </tr>
            <tr v-for="(i, index) in pagefaq" :key="index">
              <td class="faqmChoise">
                <input
                  type="checkbox"
                  class="statusinput"
                  @change="inchecked(i.faq_id, $event)"
                />
              </td>
              <td class="faqmQues">{{ i.faq_question }}</td>
              <td class="faqmAns">{{ i.faq_ans }}</td>
              <td class="faqmEdit">
                <button class="edit" @click="showEditForm('edit', i.faq_id)">
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
      <form
        action=""
        class="pop"
        v-show="showForm"
        @submit.prevent="submitForm"
        id="edform"
      >
        <h2>編輯</h2>
        <div class="xedit" v-show="addfaqs">
          <div>
            <div>問題編號</div>
            <div v-text="add_faq.id"></div>
          </div>
        </div>
        
        <div>
          <div>標題</div>
          <textarea 
            name="" 
            id="" 
            v-model="add_faq.question" 
            cols="3" 
            rows="3">
          </textarea>

          <div>內容</div>
          <textarea
            name=""
            id=""
            cols="3"
            rows="5"
            v-model="add_faq.ans"
          ></textarea>

          <div class="form_btn">
            <button type="button" class="btn_admin" @click="hideEditForm">
              取消
            </button>
            <button
              type="button"
              class="btn_admin"
              @click="addfaqs_btn(add_faq.id)"
            >
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
      faq: [],
      add_faq: [
        {
          id: "",
          question: "",
          ans: "",
        },
      ],
      faqched: [],
      wchecked: false,
      showForm: false,
      addfaqs: false,
      currentPage: 1, // 當前頁碼
      pageSize: 5, // 每頁顯示的數據量
    };
  },
  methods: {
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
      fetch(`${this.$store.state.publicpath}faq_del.php`, {
        method: "post",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: JSON.stringify({ data: Object.values(this.faqched) }),
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
          this.fetchfaq();
          this.faqched = [];
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
        this.faqched.push({ id: id });
        // console.log(this.faqched);
        // console.log(Object.values(this.faqched));
      } else {
        this.faqched.splice(this.faqched.indexOf(id), 1);
        console.log(this.faqched);
      }
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
    showEditForm(type, id) {
      if (type == "add") {
        this.addfaqs = false;
        this.add_faq = [
          {
            id: "",
            question: "",
            ans: "",
          },
        ];
      } else {
        this.addfaqs = true;
      }
      if (type == "edit") {
        const url = `${this.$store.state.publicpath}faq_list.php`;
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
          //別忘了把主體参數轉成字串，否則資料會變成[object Object]，它無法被成功儲存在後台
          // body: JSON.stringify(body)
          body: JSON.stringify({ data: body }),
        })
          .then((response) => {
            if (response.ok) {
              return response.json(); // 如果請求成功，解析JSON數據
            } else {
              throw new Error("取得失敗"); // 如果請求不成功，拋出錯誤
            }
          })
          .then((json) => {
            this.add_faq.id = json.faq_id;
            this.add_faq.question = json.faq_question;
            this.add_faq.ans = json.faq_ans;
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
    addfaqs_btn(id) {
      if (id != undefined) {
        const url = `${this.$store.state.publicpath}faq_updateupload.php`;
        const formData = new FormData();
        formData.append("id", this.add_faq.id);
        formData.append("question", this.add_faq.question);
        formData.append("ans", this.add_faq.ans);

        fetch(url, {
          method: "POST",
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
              //跳更新成功的通知
            } else {
              throw new Error("更改失敗");
            }
          })
          .then((json) => {
            this.success(true, json);
            this.fetchfaq();
            this.add_faqs = [];
            this.hideEditForm();
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        const url = `${this.$store.state.publicpath}faq_add.php`;
        const formData = new FormData();
        formData.append("id", this.add_faq.id);
        formData.append("question", this.add_faq.question);
        formData.append("ans", this.add_faq.ans);

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
            this.fetchfaq();
            this.add_faq = [];
            this.hideEditForm();
          })
          .catch((error) => {
            console.log(error.message);
          });
      }
    },
    fetchfaq() {
      const url = `${this.$store.state.publicpath}faq_list.php`;
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
          this.faq = json;
          let blockw = document.querySelector(".faq_block").offsetHeight;
          let roww = document.querySelector("tr").offsetHeight;
          this.pageSize = Math.floor((blockw/roww)-4);
         })
        .catch((error) => {
          console.log(error.message);
        });
    },
  },
  computed: {
    pagefaq() {
      // 根據當前頁碼和每頁顯示的數據量計算需要顯示的數據
      const start = (this.currentPage - 1) * this.pageSize;
      const end = start + this.pageSize;
      return this.faq.slice(start, end);
    },
    totalPages() {
      // 計算總頁數
      return Math.ceil(this.faq.length / this.pageSize);
    },
  },
  mounted() {
    this.fetchfaq();
    // 先檢查資料格式是否符合DB規則
    // const url = `http://localhost/musesmuseum/public/phps/faq_list.php`;
    // let headers = {
    //   "Content-Type": "application/json",
    //   Accept: "application/json",
    // };
    // fetch(url, {
    //   method: "POST",
    //   headers: headers,
    // })
    //   .then((response) => {
    //     if (response.ok) {
    //       return response.json(); // 如果請求成功，解析JSON數據
    //     } else {
    //       throw new Error("取得消息失敗");
    //     }
    //   })
    //   .then((json) => {
    //     this.faq = json;
    //     // 在成功時顯示提示
    //     //alert(json.message); // 假設JSON數據中有一個message屬性
    //   })
    //   .catch((error) => {
    //     // 在失敗時顯示提示
    //     console.log(error.message);
    //   });
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
  width: 70px;
  height: 40px;
  background-color: $mblue;
  color: #fff;
  border: none;
  cursor: pointer;
}

.faq_block {
  height: 70vh;
  .dmain {
    position: relative;
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
          width: 40%;
        }
        &:nth-child(3) {
          width: 40%;
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
        &:nth-child(2) {
          width: 40%;
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis;
        }
        &:nth-child(3) {
          width: 40%;
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis;
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
.faqmQues,
.faqmAns {
  height: 4.3em;
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

  .info_col {
    display: flex;
    margin-right: 10px;
    margin-bottom: 10px;
    div {
      width: 100%;
      margin-top: 10px;
      margin-right: 10px;
      .img_box {
        padding-left: 5px;
        padding-right: 5px;
        border: 1px solid $mblue;
        margin-left: 30px;
      }
    }
  }

  .form_btn {
    position: fixed;
    bottom: 0;
    left: 20px;
  }
}
.pagination{
  text-align: center;
}
</style>
    
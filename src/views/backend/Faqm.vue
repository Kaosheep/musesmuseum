<template>
  <div>
    <div>
      <div class="admin_editbar">
        <div>
          <button class="btn_admin" @click="showEditForm('add')"
          >
            新增
          </button>
        </div>
        <Searchbar class="onlyB" />
      </div>

      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>編號</th>
            <th>標題</th>
            <th>回答</th>
            <!-- <th>狀態</th> -->
            <th></th>
          </tr>
          <tr v-for="(i, index) in faq" :key="index">
            <td><input type="checkbox" v-model="i.selected"></td>
            <td>{{ i.faq_id }}</td>
            <td>{{ i.faq_question }}</td>
            <td>{{ i.faq_ans }}</td>
            <td>
              <button class="edit" @click="showEditForm('edit', i.faq_id)"
              >
                編輯
              </button>
            </td>
          </tr>
          <div class="pagination">
            <button @click="previousPage" :disabled="currentPage === 1">  
              上一頁
            </button>
            <button @click="nextPage" :disabled="currentPage === totalPages">
              下一頁
            </button>
          </div>
        </table>
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
            <div>編號</div>
            <div v-text="add_faq.id"></div>
          </div>
        </div>
        <div>
          <div>標題</div>
          <input type="text" name="" id="" v-model="add_faq.question">
          <div>內容</div>
          <textarea 
            name=""
            id="" 
            cols="30" 
            rows="7" 
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
    PinkButton
  },
  data() {
    return {
      faq: [],
      add_faq: [{
          id: '',
          question: '',
          ans: '',  
        }],
      showForm: false,
      addfaqs: false,
      // status: 0,
      // src: '',
      // imgparam: {},
      currentPage: 1, // 當前頁碼
      pageSize: 5, // 每頁顯示的數據量
    }
  },
  methods: {
    previousPage() {
      // 切換到上一頁
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      // 切換到下一頁
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    showEditForm(type, id) {
      if (type == 'add') {
        this.addfaqs = false;
        this.add_faqsaddfaqs = [
          {
            id: '',
            question: '',
            ans: '',
          },
        ];
      } else {
        this.addfaqs = true;
      }
      if (type == 'edit') {
        const url = `http://localhost/musesmuseum/public/phps/faq_list.php`
        let headers = {
          "Content-Type": "application/json",
          Accept: "application/json",
        }
        let body = {
          id: id,
        }
        fetch(url, {
          method: "POST",
          headers: headers,
          //別忘了把主體参數轉成字串，否則資料會變成[object Object]，它無法被成功儲存在後台
          // body: JSON.stringify(body)
          body: JSON.stringify({ data: body })
        })
          .then(response => {
            if (response.ok) {
              return response.json(); // 如果請求成功，解析JSON數據
            } else {
              //throw new Error("取得失敗"); // 如果請求不成功，拋出錯誤
            }
          })
          .then((json) => {
            this.add_faqsaddfaqs.question = json.faqsaddfaqs_question;
            this.add_faqsaddfaqs.ans = json.faqsaddfaqs_ans;
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
        const url = `http://localhost/musesmuseum/public/phps/faq_updateupload.php`;
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
            alert(json);
            window.location.reload();
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        const url = `http://localhost/musesmuseum/public/phps/faq_insertupload.php`;
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
            alert("新增成功");//要抓錯誤
            window.location.reload();
          })
          .catch((error) => {
            //console.log(error.message);
          });
      }
    },
 
  },
  computed: {
    faq() {
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
    //先檢查資料格式是否符合DB規則
    const url = `http://localhost/musesmuseum/public/phps/faq_list.php`
    let headers = {
      "Content-Type": "application/json",
      Accept: "application/json",
    }
    fetch(url, {
      method: "POST",
      headers: headers,
    })
      .then((response) => {
        if (response.ok) {
          return response.json(); // 如果請求成功，解析JSON數據
        } else {
          throw new Error("取得消息失敗");
        }
      })
      .then((json) => {
        this.faq = json;
        // 在成功時顯示提示
        //alert(json.message); // 假設JSON數據中有一個message屬性
      })
      .catch(error => {
        // 在失敗時顯示提示
        //alert(error.message);
      });


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
  border-radius: 4px;
  color: #fff;
  border: none;
  cursor: pointer;
}

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

      // display: inline-block;

      &:first-child {
        // width: 5%;
        // background-color: #009CA8;

        input[type="checkbox"] {
          margin-right: 5px;

        }
      }

      // &:nth-child(2) {
      //   width: 10%;
      // }

      // &:nth-child(3),
      // &:nth-child(4) {
      //   background-color: #f00;
      //   width: 33%;
      //   overflow: hidden;
      //   text-overflow: ellipsis;
      //   white-space: nowrap;
      // }

      // &:nth-child(5) {
      //   background-color: #0f0;
      //   width: 13%;
      // }

      &:last-child {
        // background-color: #00f;
        // width: 5%;

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

  .xedit {
    display: flex;

    div {
      margin-right: 10px;
    }
  }

  input,
  textarea {
    width: 100%;
    background-color: #ffffff1b;
    border: 1px solid #009CA8;
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
</style>
    
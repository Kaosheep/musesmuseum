<template>
  <div class="newsmmain">
    <div class="admin_editbar">
      <div>
        <form action="">
          <button class="btn_admin" @click="showEditForm('add')">新增</button>
          <button
            class="btn_admin"
            @click="toggleStatus('1')"
            :disabled="!canToggle('1')"
          >
            上架
          </button>
          <button
            class="btn_admin"
            @click="toggleStatus('0')"
            :disabled="!canToggle('0')"
          >
            下架
          </button>
        </form>
      </div>
      <Searchbar class="onlyB" />
    </div>
    <div class="dmain">
      <table>
        <tr>
          <th></th>
          <th>消息編號</th>
          <th>消息標題</th>
          <th>狀態</th>
          <th></th>
        </tr>
        <tr v-for="i in getPageItems" :key="i.news_id">
          <td><input type="checkbox" /></td>
          <td>{{ i.news_id }}</td>
          <td class="newsmtitle">{{ i.news_title }}</td>
          <td>
            <p v-if="i.news_status === 1">上架中</p>
            <p v-else>未上架</p>
          </td>
          <td>
            <button
              class="edit"
              @click="
                showEditForm();
                editid(i.news_id);
              "
            >
              編輯
            </button>
          </td>
        </tr>
      </table>
    </div>
    <div class="page">
      <Page
        :total="newscol.length"
        :page-size="pageItems"
        v-model="currentPage"
      />
    </div>
    <form action="" class="pop" v-if="showForm" @submit.prevent="submitForm">
      <h2>編輯</h2>
      <div class="xedit" v-show="addnews">
        <div>
          <div>消息編號</div>
          <div>{{ editnew.news_id }}</div>
        </div>
        <div>
          <div>日期</div>
          <input type="date" v-model="editnew.news_date" />
        </div>
      </div>
      <div>
        <div>標題</div>
        <input type="text" name="" id="" v-model="editnew.news_title" />
        <div>內容</div>
        <textarea
          name=""
          id=""
          cols="30"
          rows="7"
          v-model="editnew.news_content"
        ></textarea>
        <div class="switch_status">
          <div>狀態</div>
          <select v-model="editnew.news_status">
            <option value="1">上架中</option>
            <option value="0">未上架</option>
          </select>
          <Upload
            multiple
            type="drag"
            action="//jsonplaceholder.typicode.com/posts/"
            show-upload-list
          >
            <div style="padding: 20px 0">
              <Icon
                type="ios-cloud-upload"
                size="52"
                style="color: #3399ff"
              ></Icon>
              <p>圖片上傳</p>
            </div>
          </Upload>
          <!-- <input type="file" id="fileInput" accept="image/*" style="display: none;" />
            <label for="fileInput">選擇圖片</label>
            <div class="img_wrap">
              <img src="" alt="" id="img1" width="50">
            </div> -->
        </div>
        <div class="form_btn">
          <button type="button" class="btn_admin" @click="hideEditForm">
            取消
          </button>
          <button type="button" class="btn_admin" @click="addnews_btn()">
            儲存
          </button>
        </div>
      </div>
    </form>
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
      currentPage: 1,
      pageItems: 6,
      add_news: [
        {
          title: "",
          content: "",
          date: "",
        },
      ],
      newscol: [],
      editnew: null,
      publicpath: "http://localhost/musesmuseum/public/phps/",
      showForm: false,
      addnews: false,
      status: 0,
    };
  },
  computed: {
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.newscol.slice(startIndex, endIndex);
    },
  },
  methods: {
    editid(clickid) {
      return (this.editnew = this.newscol.find((n) =>
        n.news_id?.includes(clickid)
      ));
    },
    // listnum() {
    //   let trnum = Math.floor(
    //     document.querySelector(".newsmmain").offsetHeight /
    //       document.querySelector(".dmain").offsetHeight
    //   );
    //   if (this.newscol.length > trnum) {
    //     return (this.pageItems = trnum);
    //   } else {
    //     return (this.pageItems = this.newscoll);
    //   }
    // },
    toggleStatus(newStatus) {
      this.newscol.forEach((item) => {
        if (item.selected) {
          item.statusn = newStatus;
        }
      });
    },
    canToggle(newStatus) {
      // return this.newscol.some(item => item.selected && item.statusn !== newStatus);
    },
    showEditForm(type) {
      if (type == "add") {
        this.addnews = false;
      } else {
        this.addnews = true;
      }
      if (type == 'edit') {
        const url = `http://localhost/musesmuseum/public/phps/news_list.php`
        let headers = {
          "Content-Type": "application/json",
          "Accept": "application/json",
        }
        let body = {
          "id": id,
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
              throw new Error("取得失敗"); // 如果請求不成功，拋出錯誤
            }
          })
          .then(json => {
            console.log(json.news_date)
            this.add_news.title = json.news_title;
            this.add_news.content = json.news_content;
            this.add_news.date = json.news_date;
            this.add_news.id = json.news_id;
            this.status = json.news_status;
          })
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
    // addnews_btn() {
    //   //先檢查資料格式是否符合DB規則
    //   const url = `http://localhost/musesmuseum/public/phps/news.php`
    //   let headers = {
    //     "Content-Type": "application/json",
    //     "Accept": "application/json",
    //   }
    //   let currentDate = new Date();
    //   let formattedDate = currentDate.toISOString().split("T")[0];
    //   //以下是API文件中提及必寫的主體参數。
    //   let body = {
    //     "title": this.add_news.title,
    //     "content": this.add_news.content,
    //     "status": this.status,
    //     "date": formattedDate,
    //   }
    //   fetch(url, {
    //     method: "POST",
    //     headers: headers,
    //     //別忘了把主體参數轉成字串，否則資料會變成[object Object]，它無法被成功儲存在後台
    //     // body: JSON.stringify(body)
    //     body: JSON.stringify({ data: body })

    //   })
    //   .then(response => {
    //       if (response.ok) {
    //         return response.json(); // 如果請求成功，解析JSON數據
    //       } else {
    //         throw new Error("新增失敗"); // 如果請求不成功，拋出錯誤
    //       }
    //     })
    //     .then(json => {
    //       // 在成功時顯示提示
    //       alert("新增成功：" + json.message); // 假設JSON數據中有一個message屬性
    //     })
    //     .catch(error => {
    //       // 在失敗時顯示提示
    //       console.log(error.message);
    //       alert("新增失敗：" + error.message);
    //     });
    // },
    fetchnews() {
      fetch(`${this.publicpath}test.php`).then(async (response) => {
        this.newscol = await response.json();
      });
    },
  },
  computed: {
    news() {
      // 根據當前頁碼和每頁顯示的數據量計算需要顯示的數據
      const start = (this.currentPage - 1) * this.pageSize;
      const end = start + this.pageSize;
      return this.news.slice(start, end);
    },
    totalPages() {
      // 計算總頁數
      return Math.ceil(this.news.length / this.pageSize);
    },
  },
  mounted() {
    this.fetchnews();
  },
};
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";

div {
  color: #000;
}
.newsmmain {
  height: 100%;
  width: 100%;
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
    .newsmtitle {
      text-align: start;
    }
    td {
      &:first-child {
        width: 8%;
      }
      &:nth-child(2) {
        width: 12%;
      }
      &:nth-child(3) {
        width: 60%;
      }
      &:nth-child(4) {
        width: 10%;
      }
      &:last-child {
        width: 10%;
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
  height: 80vh;
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
    text-align: center;
  }
}
</style>

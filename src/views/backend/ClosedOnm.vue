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
            <th>消息編號</th>
            <th>消息標題</th>
            <th>狀態</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in ordm" :key="index">
            <td><input type="checkbox"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.mid }}</td>
            <td>{{ i.statusn }}</td>
            <td>
              <button class="edit" @click="showEditForm('edit', i.news_id)">編輯</button>
            </td>
          </tr>
          <div class="pagination">
            <button @click="previousPage" :disabled="currentPage === 1">上一頁</button>
            <button @click="nextPage" :disabled="currentPage === totalPages">下一頁</button>
          </div>
        </table>
      </div>
      <form action="" class="pop" v-show="showForm" @submit.prevent="submitForm">
        <h2>編輯</h2>
        <div>
          <div>休館日期</div>
          <input type="date" name="date" id=""> 至 <input type="date" name="date" id="">
        </div>
        <div>
          <div>休館原因</div>
          <select>
            <option value="1">例行休館</option>
            <option value="0">其他</option>
          </select>
        </div>
        <div>
          <div>備註</div>
          <input type="text" name="remark" id="">
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
      ordm: [
        {
          id: "2023/07/05",
          mid: "例行休館",
          statusn: "",
          price: "1,500",
        },
        {
          id: "2023/07/01",
          mid: "例行休館",
          statusn: "",
          price: "3,400",
        },
        {
          id: "2023/06/25",
          mid: "特例休館",
          statusn: "館內漏水",
          price: "3,400",
        },
        {
          id: "2023/06/15",
          mid: "例行休館",
          statusn: "",
          price: "3,400",
        }
      ],
      news: [],
      add_news: [
        {
          id: '',
          title: '',
          content: '',
          date: '',
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
      showForm: false,
      addnews: false,
      status: 0,
      src: '',
      imgparam: {},
      currentPage: 1, // 當前頁碼
      pageSize: 10, // 每頁顯示的數據量

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
    img(e) {
      let that = this; // 改變 this 指向
      let files = e.target.files[0]; // 圖片文件名
      if (!e || !window.FileReader) return; // 檢查是否支援 FileReader
      let reader = new FileReader();
      reader.readAsDataURL(files); // 關鍵一步，在這裡轉換的
      reader.onloadend = function () {
        that.src = this.result; // 賦值
      }
      // this.imgparam = new FormData(); // 轉換為表單進行傳送給後端
      // this.imgparam.append("images", files); // 第一個參數就是後端要接收的字段，要一致，不一致會傳送失敗
    },
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
    showEditForm(type, id) {
      if (type == 'add') {
        this.addnews = false;
        this.add_news = [
          {
            id: '',
            title: '',
            content: '',
            date: '',
          }
        ]
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
    addnews_btn(id) {
      if (id != undefined) {
        const url = `http://localhost/musesmuseum/public/phps/news_add.php`
        let headers = {
          "Content-Type": "application/json",
          "Accept": "application/json",
        }
        //以下是API文件中提及必寫的主體参數。
        let body = {
          "id": this.add_news.id,
          "title": this.add_news.title,
          "content": this.add_news.content,
          "status": this.status,
          // 'image': this.imgparam.get('images')
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
              throw new Error("新增失敗"); // 如果請求不成功，拋出錯誤
            }
          })
          .then(json => {

            // 在成功時顯示提示
            alert(json.message); // 假設JSON數據中有一個message屬性
            window.location.reload()
          })
          .catch(error => {
            // 在失敗時顯示提示
            alert(error.message);
          });
      } else {
        const url = `http://localhost/musesmuseum/public/phps/news_add.php`
        let headers = {
          "Content-Type": "application/json",
          "Accept": "application/json",
        }
        let currentDate = new Date();
        let formattedDate = currentDate.toISOString().split("T")[0];
        //以下是API文件中提及必寫的主體参數。
        let body = {
          "title": this.add_news.title,
          "content": this.add_news.content,
          "status": this.status,
          "date": formattedDate,
          // 'image': this.imgparam.get('images')
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
              throw new Error("新增失敗"); // 如果請求不成功，拋出錯誤
            }
          })
          .then(json => {

            alert(json.message); // 假設JSON數據中有一個message屬性
            window.location.reload()
          })
          .catch(error => {
            // 在失敗時顯示提示
            alert(error.message);
          });
      }

    }
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
    //先檢查資料格式是否符合DB規則
    const url = `http://localhost/musesmuseum/public/phps/news_list.php`
    let headers = {
      "Content-Type": "application/json",
      "Accept": "application/json",
    }
    fetch(url, {
      method: "POST",
      headers: headers,
    })
      .then(response => {
        if (response.ok) {
          return response.json(); // 如果請求成功，解析JSON數據
        } else {
          throw new Error("取得消息失敗"); // 如果請求不成功，拋出錯誤
        }
      })
      .then(json => {

        this.news = json;
        // 在成功時顯示提示
        // alert(json.message); // 假設JSON數據中有一個message屬性
      })
      .catch(error => {
        // 在失敗時顯示提示
        // alert(error.message);
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

  .xedit {
    display: flex;

    div {
      margin-right: 10px;
    }
  }

  >div {
    margin-bottom: 20px;

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

    input[name="date"] {
      width: unset;
    }

    input[name="remark"] {
      width: 30%;
      border: none;
      border-radius: 0;
      border-bottom: 1px solid $mblue;
    }


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
    
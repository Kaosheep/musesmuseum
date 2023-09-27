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
          <tr v-for="(i, index) in test" :key="index">
            <td><input type="checkbox" v-model="i.selected"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.title }}</td>
            <td>
              <p v-if="parseInt(i.statusn) === 1">上架中</p>
              <p v-else>未上架</p>
            </td>
            <td>
              <button class="edit" @click="showEditForm()">編輯</button>
            </td>
          </tr>

        </table>
      </div>
      <form action="" class="pop" v-show="showForm" @submit.prevent="submitForm">
        <h2>編輯</h2>
        <div class="xedit" v-show="addnews">
          <div>
            <div>消息編號</div>
            <div>MN2023061901</div>
          </div>
          <div>
            <div>日期</div>
            <input type="date" v-model="add_news.date">
          </div>
        </div>
        <div>
          <div>標題</div>
          <input type="text" name="" id="" v-model="add_news.title">
          <div>內容</div>
          <textarea name="" id="" cols="30" rows="7" v-model="add_news.content"></textarea>
          <div class="switch_status">
            <div>狀態</div>
            <select v-model="status">
              <option value="1">上架中</option>
              <option value="0">未上架</option>
            </select>
            <Upload multiple type="drag" action="//jsonplaceholder.typicode.com/posts/" show-upload-list>
              <div style="padding: 20px 0">
                <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
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
            <button type="button" class="btn_admin" @click="hideEditForm">取消</button>
            <button type="button" class="btn_admin" @click="addnews_btn()">儲存</button>
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
      news: [],
      add_news: [
        {
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
      status: 0
    }
  },
  methods: {
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
    showEditForm(type) {
      if (type == 'add') {
        this.addnews = false;
      }else{
        this.addnews = true;
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
    addnews_btn() {
      //先檢查資料格式是否符合DB規則
      const url = `http://localhost/musesmuseum/public/phps/news.php`
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
          alert("新增成功：" + json.message); // 假設JSON數據中有一個message屬性
        })
        .catch(error => {
          // 在失敗時顯示提示
          console.log(error.message);
          alert("新增失敗：" + error.message);
        });
    }
  },
  mounted() {

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

        &:hover {
          color: $mblue;
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
    
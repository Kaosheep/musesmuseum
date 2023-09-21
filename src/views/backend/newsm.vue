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
      <form action="" class="pop" v-if="showForm" @submit.prevent="submitForm">
        <h2>編輯</h2>
        <div class="xedit">
          <div>
            <div>消息編號</div>
            <div>MN2023061901</div>
          </div>
          <div>
            <div>日期</div>
            <div>2023/08/10</div>
          </div>
        </div>
        <div>
          <div>標題</div>
          <input type="text" name="" id="">
          <div>內容</div>
          <textarea name="" id="" cols="30" rows="7"></textarea>
          <div class="switch_status">
            <div>狀態</div>
            <select name="" id="">
              <option value="">上架中</option>
            </select>
            <input type="file" id="fileInput" accept="image/*" style="display: none;" />
            <label for="fileInput">選擇圖片</label>
            <div class="img_wrap">
              <img src="" alt="" id="img1" width="50">
            </div>
          </div>
          <div class="form_btn">
            <PinkButton class="btn_admin" text="取消" @click="hideEditForm" />
            <PinkButton class="btn_admin" text="儲存" />
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
      showForm: false
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
    showEditForm() {
      this.showForm = true;
    },
    hideEditForm() {
      this.showForm = false;
    },
    submitForm() {
      this.hideEditForm();
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

  &:hover {
    background-color: $mpink;
    color: #fff;
  }
}

.admin_editbar {
  display: flex;
  background-color: #f2f2f2;
  padding: 5px;
  border-radius:10px 10px 0 0;
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

  &:hover {
    background-color: $mpink;
  }
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
      text-align: left;
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

      div {
        margin-bottom: 10px;
      }


    }

  }

  input,
  textarea {
    margin-top: 10px;
    width: 100%;
    background-color: #ffffff1b;
    border: 1px solid #009CA8;
    border-radius: 10px;
    resize: none;

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
    
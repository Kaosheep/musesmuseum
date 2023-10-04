<template>
  <div>
    <form action="">
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" text="新增" />
          <PinkButton class="btn_admin" text="刪除" />
        </div>
        <Searchbar class="onlyB" />
      </div>
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
            <td><input type="checkbox"></td>
            <td>{{ i.ma_id  }}</td>
            <td>{{ i.ma_name }}</td>
            <td>{{ i.ma_type }}</td>
            <td>
              <button class="edit">編輯</button>
            </td>
          </tr>
        </table>
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
    PinkButton
  },
  data() {
    return {
      manager: []
    }
  },
  methods: {

  }, mounted() {
    //先檢查資料格式是否符合DB規則
    const url = `http://localhost/musesmuseum/public/phps/manager_list.php`;
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
        // 在成功時顯示提示
        // alert(json.message); // 假設JSON數據中有一個message屬性
      })
      .catch((error) => {
        // 在失敗時顯示提示
        // alert(error.message);
      });
  },


}
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";

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

}
</style>
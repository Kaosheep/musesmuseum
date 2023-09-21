<template>
  <div>
    <div>
      <button class="bTab">票種管理</button>
    </div>
    <form action="">
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" text="新增" />
          <PinkButton class="btn_admin" text="刪除" />
          <PinkButton class="btn_admin" text="上架" />
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>票種編號</th>
            <th>票種名稱</th>
            <th>票價</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in tk" :key="index">
            <td><input type="checkbox"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.mid }}</td>
            <td>{{i.price}}</td>
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
      tk: [
                {
                    id: "TK01",
                    mid: "全票",
                    price: "400",
                },
                {
                    id: "TK02",
                    mid: "孩童票",
                    price: "350",
                },
                {
                    id: "TK03",
                    mid: "敬老票",
                    price: "250",
                },
                {
                    id: "TK04",
                    mid: "愛心票",
                    price: "200",
                }
            ]
    }
  },
  methods: {

  },
 
}
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";
div{
  form{
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
  border-top-right-radius: 10px;
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
    color: #fff;
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
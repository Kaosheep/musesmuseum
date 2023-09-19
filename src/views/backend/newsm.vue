<template>
  <div>
    <div>
      <a class="bTab" href="">最新消息</a>
    </div>
    <form action="">
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" text="新增"/>
          <PinkButton class="btn_admin" text="上架"/>
          <PinkButton class="btn_admin" text="下架"/>
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
            <th>庫存</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in test" :key="index">
            <td><input type="checkbox"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.title }}</td>
            <td>
              <p v-if="parseInt(i.statusn) === 1">上架中</p>
              <p v-else>未上架</p>
            </td>
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
    }
  },
  methods: {
 
  },
  mounted() {

  }
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
  color: #000;
  line-height: 2rem;
    transition: .3s;
    cursor:pointer;
    &:hover{
        background-color:$mpink;
        color: #fff;
    }
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
        &:hover{
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
</style>
    
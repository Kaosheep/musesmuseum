<template>
  <div>
    <form action="">
      <div class="admin_editbar">
        <div>
          <PinkButton class="btn_admin" text="新增" />
          <PinkButton class="btn_admin" text="上架" />
          <PinkButton class="btn_admin" text="下架" />
        </div>
        <Searchbar class="onlyB" />
      </div>
      <div class="dmain">
        <table>
          <tr>
            <th></th>
            <th>商品編號</th>
            <th>商品名稱</th>
            <th>狀態</th>
            <th></th>
          </tr>
          <tr v-for="(i, index) in shopm" :key="index">
            <td><input type="checkbox"></td>
            <td>{{ i.id }}</td>
            <td>{{ i.title }}</td>
            <td>
              <p v-if="parseInt(i.statusn) === 1">已上架</p>
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
      shopm: [
                {
                    id: "PD20230001",
                    title: "小謬思銅像",
                    statusn: "0",
                },
                {
                    id: "PD20230002",
                    title: "手繪紅鶴小廢包",
                    statusn: "1",
                },
                {
                    id: "PD20230003",
                    title: "維納斯口紅",
                    statusn: "0",
                },
                {
                    id: "PD20230004",
                    title: "諾貝爾仿徽",
                    statusn: "0",
                }
            ]
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
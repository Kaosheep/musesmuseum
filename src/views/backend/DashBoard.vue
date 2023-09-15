<template>
  <main>
    <div class="dashborad">
      <div class="console">
        <button type="button" v-for="btn in consolelist">
          <RouterLink :to="btn.link">{{ btn.title }}</RouterLink>
        </button>
      </div>
      <div class="dashboradview">
        <div>
          <button class="bTab">最新消息</button>
        </div>
        <div class="function_bar">
          <div>
            <PinkButton class="btn_admin" text="新增"/>
            <PinkButton class="btn_admin" text="刪除"/>
            <PinkButton class="btn_admin" text="上架"/>
          </div>
          <Searchbar class="onlyB" />
        </div>
        <RouterView></RouterView>
      </div>
    </div>
  </main>
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
      consolelist: [
        { title: "消息管理", link: "/DashBoard" },
        { title: "會員管理", link: "/Memberm" },
        { title: "展覽管理", link: "/newsm" },
        { title: "購物管理", link: "/newsm" },
        { title: "訂票管理", link: "/newsm" },
        { title: "帳號管理", link: "/newsm" },
        { title: "會員登出", link: "/" },
      ],
    }
  },

  methods: {

  },
}

</script>

<style scoped lang="scss">
.onlyB {
  position: relative;
  box-shadow: none;
  margin-right: 0;
}

main {
  width: 100vw;
  height: 100vh;
  background-image: linear-gradient(to bottom right, #009CA8, #FBF796);
  display: flex;
  justify-content: center;
  align-items: center;

  .bTab {
    background-color: #ffffff80;
    border-radius: 10px 10px 0 0;
    border-width: 1px 1px 0 1px;
    border-style: none;
    padding: 8px;
  }
  .btn_admin{
    margin-right: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    width: 70px;
    height: 40px;
    background-color: $mblue;
    color: #fff;
    border: none;
    cursor:pointer;
    &:hover{
        background-color:$mpink;
        color: #fff;
    }
  }

}
</style>

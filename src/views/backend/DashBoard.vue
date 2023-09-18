<template>
  <main>
    <div class="dashborad">
      <div class="console">
        <button type="button" v-for="btn in consolelist">
          <RouterLink :to="btn.link">{{ btn.title }}</RouterLink>
        </button>
      </div>
      <div class="dashboradview">
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
        { title: "會員管理", link: "/DashBoard/Memberm" },
        { title: "展覽管理", link: "/DashBoard/Exhm" },
        { title: "購物管理", link: "/DashBoard/Shopm"},
        { title: "訂票管理", link: "/DashBoard/Ticketsm" },
        { title: "帳號管理", link: "/DashBoard/Manager" },
        { title: "會員登出", link: "/" },
      ],
    }
  },

  methods: {

  },
}

</script>

<style scoped lang="scss">

main {
  width: 100vw;
  height: 100vh;
  background-image: linear-gradient(to bottom right, #009CA8, #FBF796);
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>

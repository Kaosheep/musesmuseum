<template>
  <main>
    <div class="dashborad">
      <div class="console">
        <button type="button" v-for="btn in consolelist"><RouterLink :to="btn.link">{{ btn.title }}</RouterLink>
        </button>
      </div>
      <div class="dashboradview">
        <RouterView></RouterView>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      consolelist: [
        { title: "消息管理", link: "/DashBoard" },
        { title: "會員管理", link: "/Memberm" },
        { title: "展覽管理", link: "/newsm" },
        { title: "購物管理", link: "/newsm" },
        { title: "訂票管理", link: "/newsm" },
        { title: "帳號管理", link: "/newsm" },
      ],
    };
  },
  methods: {},
};
</script>

<style scoped lang="scss">
main {
  width: 100vw;
  height: 100vh;
  background-image: linear-gradient(90deg, $mgreen, $mblue);
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>

<template>
  <header>
    <div class="menuconsole">
      <div class="burger" @click="togglemenu">
        <div :class="['bar', { active: isClick }]"></div>
      </div>
      <div :class="['logo', { togglec: isClick }]">
        <router-link to="/Home"
          ><img src="@/assets/image/logo/logo.png" alt=""
        /></router-link>
      </div>
    </div>
    <div class="social">
      <router-link to="/Home/Shoppingcar" @click="closemenu">
        <span class="sspan">
          <span class="cartnum" v-if="$store.state.cartnum > 0">
            <span>{{ $store.state.cartnum }}</span>
            <span>{{ $store.state.cartnum }}</span>
          </span>
          <span>
            <i class="sicon fa-solid fa-cart-shopping" id="social_cart"></i
          ></span> </span
      ></router-link>
      <router-link to="/Home/MemberInfo" @click="closemenu">
        <span class="sspan">
          <span> <i class="sicon fa-solid fa-user" id="social_user"></i></span>
        </span>
      </router-link>
      <a href="mailto:service@tibame.com" target="_blank">
        <span class="sspan">
          <span
            ><i
              class="sicon fa-solid fa-envelope"
              id="social_envelope"
            ></i></span></span
      ></a>
      <a href="https://www.facebook.com/TibaMe/?locale=zh_TW" target="_blank">
        <span class="sspan"
          ><span
            ><i
              class="sicon fa-brands fa-square-facebook"
              id="social_facebook"
            ></i></span></span
      ></a>
      <a href="#" target="_blank">
        <span class="sspan"
          >
          <span><i class="sicon fa-brands fa-youtube" id="social_youtub"></i></span></span
      ></a>
    </div>
  </header>
  <nav>
    <div class="logo">
      <router-link to="/Home" @click="closemenu"
        ><img src="@/assets/image/logo/logo.png" alt=""
      /></router-link>
    </div>
    <div class="login">
      <div>{{ $store.state.mbr_name }}</div>
      <router-link
        v-if="!$store.state.isLogin"
        to="/Home/Login"
        @click="closemenu"
        >會員登入</router-link
      >
      <span v-else>
        <router-link to="/Home" @click="logout">登出</router-link>
      </span>
    </div>
    <div class="menu">
      <ul>
        <li v-for="(li, index) in navlist" :key="index">
          <router-link :to="li.link" @click="closemenu" v-if="li.link">
            <h3>{{ li.title }}</h3>
          </router-link>
          <h3 v-else>{{ li.title }}</h3>
          <ul v-if="li.sublist">
            <li v-for="(subli, index) in li.sublist" :key="index">
              <router-link :to="subli.sublink" @click="closemenu">{{
                subli.subtitle
              }}</router-link>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <router-view />
</template>

<script>
export default {
  data() {
    return {
      navlist: [
        { title: "最新消息", link: "/Home/News" },
        { title: "購票專區", link: "/Home/Tick" },
        { title: "館內地圖", link: "/Home/Museumspace" },
        { title: "精選商品", link: "/Home/Shop" },
        {
          title: "展覽資訊",
          sublist: [
            { subtitle: "常設展覽", sublink: "/Home/CurrentExhibition_main" },
            { subtitle: "當期展覽", sublink: "/Home/SpecialExhibition_main" },
          ],
        },
        {
          title: "藝術典藏",
          sublist: [
            { subtitle: "文物區", sublink: "/Home/Art" },
            { subtitle: "畫作區", sublink: "/Home/Paintings" },
          ],
        },

        {
          title: "參觀服務",
          sublist: [
            { subtitle: "注意事項", sublink: "/Home/VisitInformation" },
            { subtitle: "常見問題", sublink: "/Home/faq" },
            { subtitle: "交通資訊", sublink: "/Home/VisitTraffic" },
          ],
        },
        {
          title: "關於我們",
          sublist: [
            { subtitle: "歷史沿革", sublink: "/Home/History" },
            { subtitle: "歷代館長", sublink: "/Home/Curator" },
          ],
        },
      ],
      isClick: false,
      Storage: localStorage["addItemlist"],
    };
  },
  watch: {},
  computed: {
    totalitem() {
      if (this.Storage) {
        return this.Storage.split(",").length - 1;
      }
    },
  },
  created() {
    this.$store.dispatch("fetchMbrName");
  },
  methods: {
    togglemenu() {
      const nav = document.querySelector("nav");
      const header = document.querySelector("header .logo");

      this.isClick = !this.isClick;
      if (this.isClick) {
        nav.style.transform = "translateX(0%)";
      } else {
        nav.style.transform = "translateX(-100%)";
      }
    },
    closemenu() {
      document.querySelector("nav").style.transform = "translateX(-100%)";
      this.isClick = false;
    },
    logout() {
      //登出
      this.$store.dispatch("logout");
      this.closemenu();
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
header {
  display: flex;
}
</style>

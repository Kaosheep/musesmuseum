<template>
  <main>
    <div class="dashborad">
      <div class="console">
        <Row>
          <Menu
            :key="isCheck"
            :theme="theme"
            class="list_style"
            accordion
            :open-names="`['${open}']`"
            :active-name="avtiveId"
            @on-select="selected"
          >
            <Submenu
              v-show="test(submenu.name)"
              v-for="(submenu, index) in menuData"
              :key="index"
              :name="submenu.name"
            >
              <template #title>
                {{ submenu.title }}
              </template>
              <MenuItem
                v-for="(item, itemIndex) in submenu.items"
                :key="itemIndex"
                :name="item.name"
                :to="item.link"
              >
                {{ item.text }}
              </MenuItem>
            </Submenu>
            <MenuItem name="7">
              <router-link @click="logout()" to="/Admin">管理員登出</router-link>
            </MenuItem>
          </Menu>
        </Row>
        <!-- <button type="button" v-for="btn in consolelist">
          <RouterLink :to="btn.link">{{ btn.title }}</RouterLink>
        </button> -->
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
    PinkButton,
  },
  data() {
    return {
      all_pri: true,
      avtiveId: "",
      isCheck: false,
      open: "",
      menuData: [
        {
          name: "1",
          title: "消息管理",
          items: [
            { name: "1-1", text: "消息管理", link: "/DashBoard" },
            { name: "1-2", text: "常見問題管理", link: "/DashBoard/Faqm" },
          ],
        },
        {
          name: "2",
          title: "會員管理",
          items: [{ name: "2-1", text: "會員管理", link: "/DashBoard/Memberm" }],
        },
        {
          name: "3",
          title: "展覽資訊",
          items: [{ name: "3-1", text: "展覽資訊", link: "/DashBoard/Exhm" }],
        },
        {
          name: "4",
          title: "購物管理",
          items: [
            { name: "4-1", text: "商品管理", link: "/DashBoard/Shopm" },
            { name: "4-2", text: "訂單管理", link: "/DashBoard/Orderm" },
          ],
        },
        {
          name: "5",
          title: "訂票管理",
          items: [
            { name: "5-1", text: "票種管理", link: "/DashBoard/Ticketsm" },
            { name: "5-2", text: "訂票管理", link: "/DashBoard/TicketsOrdm" },
            { name: "5-3", text: "日期管理", link: "/DashBoard/ClosedOnm" },
          ],
        },
        {
          name: "6",
          title: "帳號管理",
          items: [{ name: "6-1", text: "管理員帳號", link: "/DashBoard/Manager" }],
        },
      ],
    };
  },

  methods: {
    selected(page) {
      this.avtiveId = page;
      localStorage.setItem("nowpage", page);

      if (this.avtiveId) {
        open = this.avtiveId.split("-")[0];
        localStorage.setItem("open", open);
      }
    },

    test(id) {
      if (id == 6) {
        if (this.all_pri == 0) {
          return false;
        } else {
          return true;
        }
      } else {
        return true;
      }
    },
    logout() {
      localStorage.removeItem("nowpage");
      localStorage.removeItem("open");
      localStorage.clear();
      document.cookie = "manager=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    },
  },
  beforeUnmount() {
    localStorage.clear();
  },
  mounted() {
    if (localStorage["nowpage"]) {
      this.avtiveId = localStorage.getItem("nowpage");
    } else {
      localStorage.setItem("nowpage", "1-1");
    }
    if (localStorage["open"]) {
      this.open = localStorage.getItem("open");
    } else {
      localStorage.setItem("open", "1");
    }
    this.isCheck = true;
    const name = "manager" + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(";");
    let foundCookie = false; // 用于标记是否找到匹配的 cookie

    // for (let i = 0; i < cookieArray.length; i++) {
    //   let cookie = cookieArray[i];
    //   while (cookie.charAt(0) === ' ') {
    //     cookie = cookie.substring(1);
    //   }
    //   if (cookie.indexOf(name) !== 0) {
    //     document.location.href = "/Admin";
    //   }
    // }
    for (let i = 0; i < cookieArray.length; i++) {
      let cookie = cookieArray[i];
      while (cookie.charAt(0) === " ") {
        cookie = cookie.substring(1);
      }

      if (cookie.indexOf(name) === 0) {
        foundCookie = true;
        let cookie_vale = JSON.parse(cookie.split("=")[1])["ma_type"];
        if (cookie_vale == 0) {
          this.all_pri = false;
        }
        break; // 找到匹配的 cookie 后退出循环
      }
    }

    if (!foundCookie) {
      document.location.href = `${this.$store.state.imgpublicpath}Admin`;
    }
    return "";
  },
};
</script>

<style scoped lang="scss">
main {
  width: 100vw;
  height: 100vh;
  background-image: linear-gradient(to bottom right, #009ca8, #fbf796);
  display: flex;
  justify-content: center;
  align-items: center;

  .list_style {
    background-color: #d9d9d9;
  }
}
</style>

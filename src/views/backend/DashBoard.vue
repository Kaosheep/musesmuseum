<template>
  <main>
    <div class="dashborad">
      <div class="console">
        <Row>
          <Menu :theme="theme" class="list_style" accordion>
            <Submenu v-for="(submenu, index) in menuData" :key="index" :name="submenu.name">
              <template #title>
                {{ submenu.title }}
              </template>
              <MenuItem v-for="(item, itemIndex) in submenu.items" :key="itemIndex" :name="item.name">
                <router-link :to="item.link">{{ item.text }}</router-link>
              </MenuItem>
            </Submenu>
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
    PinkButton
  },
  data() {
    return {
      menuData: [
        {
          name: '1',
          title: '消息管理',
          items: [
            { name: '1-1', text: '消息管理', link: "/DashBoard" },
          ],
        },
        {
          name: '2',
          title: '會員管理',
          items: [
            { name: '2-1', text: '會員管理', link: "/DashBoard/Memberm" },
          ],
        },
        {
          name: '3',
          title: '展覽資訊',
          items: [
            { name: '3-1', text: '展覽資訊', link: "/DashBoard/Exhm" },
          ],
        },
        {
          name: '4',
          title: '購物管理',
          items: [
            { name: '4-1', text: '商品管理', link: "/DashBoard/Shopm" },
            { name: '4-2', text: '訂單管理', link: "/DashBoard/Orderm" },
          ],
        }, 
        {
          name: '5',
          title: '訂票管理',
          items: [
            { name: '5-1', text: '票種管理', link: "/DashBoard/Ticketsm" },
            { name: '5-2', text: '訂票管理', link: "/DashBoard/Orderm" },
            { name: '5-3', text: '日期管理', link: "/DashBoard/ClosedOnm" },
          ],
        },
        {
          name: '6',
          title: '帳號管理',
          items: [
            { name: '6-1', text: '管理員帳號', link: "/DashBoard/Manager" },
          ],
        },
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

  .list_style {
    border-radius: 10px;
    background-color: #D9D9D9;
  }
}
</style>


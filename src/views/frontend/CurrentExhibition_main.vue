<template>
  <main class="specexhi_main">
    <!-- 導覽列 -->
    <div class="carousel_header">
      <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
    </div>
    <div class="container">
      <!-- 搜尋列 -->
      <div class="exb_search">
        <Searchbar></Searchbar>
      </div>
      <div class="curr_slideshow">
        <div class="curr_slideshow_main">
          <span class="curr_exhi_title">常設展覽</span>
          <router-link to="/Home/CurrentExhibition">
            <img class="curr_main_img" src="@/assets/image/exhibition/currentexhibition/curr_ex0.jpg" alt="" />
            <div class="curr_deco_main"></div>
          </router-link>
          <span class="curr_exhi_name">色彩之旅：印象主義大師</span>
        </div>

        <div class="current_slideshow_left">
          <img src="@/assets/image/exhibition/currentexhibition/curr_ex1.jpg" alt="" />
        </div>
        <div class="current_slideshow_right">
          <img src="@/assets/image/exhibition/currentexhibition/curr_ex2.jpg" alt="" />
        </div>
      </div>
    </div>
  </main>
</template>
<script>
import VerHeader from "/src/components/VerHeader.vue";
import Searchbar from "/src/components/Searchbar.vue";
export default {
  components: {
    VerHeader,
    Searchbar,
  },
};
</script>
<style scoped lang="scss"></style>

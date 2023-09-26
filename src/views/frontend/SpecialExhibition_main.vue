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
      <div class="slideshow">

        <div class="slideshow_main">
          <span class="exhi_title">當期展覽</span>
          <router-link to="/Home/SpecialExhibition">
            <img src="@/assets/image/exhibition/specialexhibition/spec_ex0.jpg" alt="" />
            <div class="deco_main"></div>
          </router-link>
          <span class="exhi_period">2024/02/01-2024/03/30</span>
          <span class="exhi_name">春之詠歌：多彩藝術的季節華章</span>
        </div>

        <div class="slideshow_left">
          <img src="@/assets/image/exhibition/specialexhibition/spec_ex1.png" alt="" />
        </div>
        <div class="slideshow_right">
          <img src="@/assets/image/exhibition/specialexhibition/spec_ex3.jpg" alt="" />
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

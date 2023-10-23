<template>
  <main class="curexhi_main">
    <!-- 導覽列 -->
    <div class="carousel_header">
      <VerHeader :title="'展 覽 區 Exhibitions'"></VerHeader>
    </div>
    <div class="current_container">
      <!-- 搜尋列 -->
      <div class="curexb_search">
        <Searchbar></Searchbar>
      </div>
      <span class="cur_title">常設展覽</span>
      <Carousel v-model="value" :autoplay="setting.autoplay" :autoplay-speed="setting.autoplaySpeed" :dots="setting.dots"
    :radius-dot="setting.radiusDot" :trigger="setting.trigger" :arrow="setting.arrow" class="cur_exhi_carousel">
    <CarouselItem v-for="(exhibition, index) in curexhibitions" :key="index">
      <div class="cur_exhtxt">
        {{ exhibition.curexhiTitle }}
      </div>
      <div class="cur_exhcarousel">
        <img :src="exhibition.curexhiImg" alt="">
      </div>
    </CarouselItem>
  </Carousel>
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
  data() {
    return {
      value: 0,
      setting: {
        autoplay: true,
        autoplaySpeed: 5500,
        dots: 'inside',
        radiusDot: true,
        trigger: 'click',
        arrow: 'always'
      },
      curexhibitions: [
                {
                    curexhiImg: this.$store.state.imgpublicpath + "image/exhi/spec_ex6.jpg",
                    curexhiTitle: "色彩之旅：印象主義大師",
                },
                {
                    curexhiImg: this.$store.state.imgpublicpath + "image/exhi/spec_ex7.jpg",
                    curexhiTitle: "城市攝影：鏡像內心的多重情感",
                    //===g1/image/exhi/spec_ex0.jpg
                },
                {
                    curexhiImg: this.$store.state.imgpublicpath + "image/exhi/spec_ex5.jpg",
                    curexhiTitle: "萌翻你的心！小瓢蟲大出動",
                },
                {
                    curexhiImg: this.$store.state.imgpublicpath + "image/exhi/spec_ex8.jpg",
                    curexhiTitle: "藍色之路： 來自波斯的瑰麗藝術",
                },
            ],
            currentIndex: 0,
    }
  },
}
</script>
<style scoped lang="scss"></style>
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
      <span class="exhi_title">當期展覽</span>
      <Carousel v-model="value" :autoplay="setting.autoplay" :autoplay-speed="setting.autoplaySpeed" :dots="setting.dots"
        :radius-dot="setting.radiusDot" :trigger="setting.trigger" :arrow="setting.arrow" class="exhi_carousel">
        <CarouselItem v-for="(img, imgindex) in galleryimgs"> 
          <div class="exhtxt">
            {{ img.exh_name }}<br>
            {{ img.exh_startdate }}
          </div>
          <div class="exhcarousel">
            <img :src="`${this.$store.state.imgpublicpath}image/exhi/` +
              img.exh_img
              " alt="" />
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
      galleryimgs: [],
    }
  },
  methods: {
    fetchexhi() {
      fetch(`${this.$store.state.publicpath}spex_fetch.php`).then(async (response) => {
        this.galleryimgs = await response.json();
      });
    }
  },
  mounted() {
    this.fetchexhi();

  },
}
</script>
<style scoped lang="scss"></style>

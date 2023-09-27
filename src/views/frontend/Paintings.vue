<template>
  <main class="painting_main">
    <div class="title">
      <VerHeader :title="'畫 作 區 Paintings'"></VerHeader>
    </div>
    <div class="container">
      <div class="paintsearchbar"><Searchbar></Searchbar></div>
      <button class="paintsearch" type="button" @click="scrollpage">
        <img src="@/assets/image/paint/arrow.svg" alt="" />
      </button>
      <div class="viexport">
        <span class="painting_span"></span><span class="painting_span"></span>
        <div class="painting_wrap">
          <div class="col" v-for="(img, imgindex) in paintings" :key="imgindex">
            <router-link :to="`/Home/PaintDetail/${imgindex}`">
              <div class="img">
                <img
                  :src="
                    require('@/assets/image/paint/paint' + imgindex + '.jpg')
                  "
                  :alt="img.imgname"
                />
              </div>
              <div class="txtcard">
                <div class="color">
                  <div class="txt">
                    <h2>{{ img.imgname }}</h2>
                    <h3>{{ img.imgen }}</h3>
                  </div>
                </div>
              </div>
              </router-link
            >
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import VerHeader from "@/components/VerHeader.vue";
import Searchbar from "@/components/Searchbar.vue";
export default {
  components: {
    VerHeader,
    Searchbar,
  },
  data() {
    return {
      paintings: [
        { imgname: "凡爾賽宮德皇登基", imgen: "loremlorem" },
        { imgname: "伏爾加河上的縴夫", imgen: "loremlorem" },
        { imgname: "俄國婦女", imgen: " Russian women" },
        { imgname: "哺乳聖母", imgen: "loremlorem" },
        { imgname: "女貴族莫洛卓娃", imgen: "loremlorem" },
        { imgname: "尼古拉二世婚禮", imgen: "loremlorem" },
        { imgname: "彼得一世", imgen: "loremlorem" },
        { imgname: "拿破崙", imgen: "loremlorem" },
        { imgname: "拿破崙加冕", imgen: "loremlorem" },
        { imgname: "施洗者約翰與聖母", imgen: "loremlorem" },
        { imgname: "查理五世", imgen: "loremlorem" },
        { imgname: "特洛伊王子", imgen: "loremlorem" },
      ],
    };
  },
  methods: {
    scrollpage() {
      document.querySelector(".painting_wrap").scrollLeft +=
        document.querySelector(".col").offsetWidth;
    },
  },
  mounted() {
    document.body.style.height = `auto`;
    let imgs = [...document.querySelectorAll(".painting_wrap .col")];
    let wrap = document.querySelector(".painting_wrap");
    let coln = Math.round(wrap.offsetWidth / imgs[0].offsetWidth);

    imgs
      .slice(-coln)
      .reverse()
      .forEach((col) => {
        wrap.insertAdjacentHTML("afterbegin", col.outerHTML);
      });
    imgs.slice(0, coln).forEach((col) => {
      wrap.insertAdjacentHTML("beforeend", col.outerHTML);
    });
    function infinitescrolls() {
      if (
        Math.ceil(wrap.scrollLeft) +
          document.querySelector(".viexport").offsetWidth >
        wrap.scrollWidth
      ) {
        wrap.style.scrollBehavior = "auto";
        wrap.scrollLeft = wrap.offsetWidth;
        wrap.style.scrollBehavior = "smooth";
      }
    }
    infinitescrolls();
    wrap.addEventListener("scroll", infinitescrolls);
  },
};
</script>

<style scoped lang="scss">
h2 {
  font-size: 20px;
}
</style>

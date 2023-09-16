<template>
  <main>
    <VerHeader :title="'畫作區 Paintings'"></VerHeader>
    <div class="painting_wrap">
      <div class="paintings_col" v-for="(img, imgindex) in paintings" :key="imgindex">
        <div class="img">
          <!-- <img
            :src="require('../assets/image/paint/paint' + imgindex + '.jpg')"
            :alt="img.imgname"
          /> -->
        </div>
        <div class="txt">
          <h2>{{ img.imgname }}</h2>
          <h3>{{ img.imgen }}</h3>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import VerHeader from "@/components/VerHeader.vue";
export default {
  components: {
    VerHeader,
  },
  data() {
    return {
      paintings: [
        { imgname: "1871凡爾賽宮德皇登基", imgen: "loremlorem" },
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
        { imgname: "迦拿的婚禮", imgen: "loremlorem" },
      ],
    };
  },
  methods: {},
};
</script>

<style scoped lang="scss">
main {
  width: 83.33%;
  margin: auto;
  
}
.painting_wrap{
    display: inline-block;
}
</style>

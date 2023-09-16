<template>
  <main>
    <VerHeader :title="'畫作區 Paintings'"></VerHeader>
    <div class="painting_wrap">
      <div class=".paintings_col">
        <div class="img">
          <img src="" alt="" />
        </div>
        <div class="txt">
          <h2></h2>
          <h3></h3>
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
      paintings: [{ imgsrc: "九星下凡", imgname: "", imgen: "" }],
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
</style>

<template>

    <div class="cube">
      <div class="flat">
        <div class="front"></div>
        <div class="top"></div>
        <div class="right"></div>
      </div>
    </div>
    <div class="cube">
      <div class="flat">
        <div class="front"></div>
        <div class="top"></div>
        <div class="right"></div>
      </div>
    </div>

</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";
  .cube {
    z-index: 5;
    // position: absolute;
    display: inline-block;
    margin-bottom:25px ;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    perspective: 1500px;
    left: 0;
    .flat {
      width: 50px;
      height: 50px;
      position: relative;
      transform-style: preserve-3d;
      transform: translateZ(-200px) rotateX(-30deg) rotateY(0deg) rotateZ(45deg);

      > * {
        width: 100%;
        height: 100%;
        text-align: center;
        border: 1px solid #fff;
        position: absolute;
        top: 0;
        left: 0;
        backface-visibility: hidden;
      }
      .front {
        transform: rotate(0deg) translateZ(25px);
        background-color: $mgreen;
      }
      .top {
        transform: rotateX(90deg) translateZ(25px);
        background-color: $mpink;
      }
      .right {
        transform: rotateY(-90deg) translateZ(25px);
        background-color: $myellow;
      }
    }
    &:nth-child(2) {
    //   right: 0;
      .front {
        background-color: $mblue;
      }
    }
  }

</style>

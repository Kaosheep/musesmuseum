<template>
  <div class="vertitle">
    <div class="txtgo">
      <h1>{{ title }}</h1>
      <h1>{{ title }}</h1>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String || Number,
      default: "標題標題",
    },
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
.vertitle {
  height: 100%;
  overflow: hidden;
  position: relative;
  display: inline-block;
  z-index: -20;
  @include t() {
    position: absolute;
    right: 0;
  }

  .txtgo {
    display: flex;
    flex-direction: column;
    animation: txtgo 10s linear infinite;
    min-width: 100px;

    @include t() {
      min-width: 64px;
      opacity: 0.3;
    }
  }

  h1 {
    flex-shrink: 0;
    display: inline-block;
    width: 64px;
    writing-mode: vertical-lr;
    text-orientation: mixed;
    font-size: 64px;
    white-space: pre-wrap;
    padding: 2rem 0;
  }

  @keyframes txtgo {
    0% {
      transform: translateY(0%);
    }

    100% {
      transform: translateY(-50%);
    }
  }
}
</style>

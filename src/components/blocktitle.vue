<template>
  <div class="blocktitle">
    <h2>
      {{ title }}
    </h2>
    <h3>
      {{ entitle }}
    </h3>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      default: "標題標題",
    },
    entitle: {
      default: "TITLE",
    },
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
.blocktitle{
    @include shadowlb($color: $myellow)
}
</style>

<template>
  <main class="path_main bgcGY">
    <div class="path_container">
      <h1>MUSESMUSEUM</h1>
      <RouterLink to="/Home">
        <div class="front">
          <span>前台</span>
        </div>
      </RouterLink>
      <RouterLink to="/BackEnd">
        <div class="back">
          <span>後台</span>
        </div>
      </RouterLink>
    </div>
  </main>

</template>

<script>

export default {
   components: {},
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
@import "@/assets/sass/style.scss";

</style>

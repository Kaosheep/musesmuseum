<template>
  <RouterView></RouterView>
</template>

<style lang="scss">
#app {
  font-family: "Quicksand", "Kosugi Maru", "Noto Sans TC", "sans-serif";
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
<script>
// @ is an alias to /src
export default {
  name: "Path",
  components: {},
  data() {
    return {
 
    };
  },
  mounted() {
    this.$store.dispatch('setBeforeUnloadEvent');
  },
  beforeUnmount() {
    this.$store.dispatch('removeBeforeUnloadEvent');
},

};
</script>

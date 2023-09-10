<script>
// @ is an alias to /src
import Header from '/src/components/Header.vue'
import Footer from '/src/components/Footer.vue'
import searchbar from '/src/components/searchbar.vue'
import searchbarclick from '/src/components/searchbarclick.vue'
export default {
  name: 'HomeView',
  components: {
    Header,
    Footer,
    searchbar,
    searchbarclick
  }
}
</script>

<template>
  <Header></Header>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}

</style>

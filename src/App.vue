<script>
// @ is an alias to /src
import Header from '/src/components/Header.vue'
import Footer from '/src/components/Footer.vue'

export default {
  name: 'HomeView',
  components: {
    Header,
    Footer,
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

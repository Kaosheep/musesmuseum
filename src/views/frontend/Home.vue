<template>
    <Header></Header>
    <Footer></Footer>
</template>
   
<script>
import Header from '/src/components/Header.vue'
import Footer from '/src/components/Footer.vue'
export default {
  name: 'Index',
  components: {
    Header,
    Footer
  }
}
</script>


<style scoped lang="scss">
@import "@/assets/sass/style.scss";

</style>
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
  },
  data() {
    return {
      // isLogin: false,
      // userData: null//抓他傳到php都要
    }
  },
  methods: {
    // setUserData(data) {
    //   localStorage.setItem('user', JSON.stringify(data))
    // },
    // updateUser() {
    //   if (localStorage.getItem('user')) {
    //     this.isLogin = true
    //     this.userData = JSON.parse(localStorage.getItem('user'))
    //   }
    // },
  },
  mounted() {
    // // localStorage.clear()
    // this.updateUser()
    // window.addEventListener("storage", this.updateUser);

    // fetch('http://localhost/musesmuseum/public/phps/login.php').then((res) => res.json()).then((res) => {
    //   if (res !== 0) {
    //     this.setUserData(res)
    //   } else {
    //     this.setUserData(null)
    //   }
    // })

    // // this.setUserData({
    // //   no: 1234,
    // //   name: 'Hi'
    // // })
    // // this.setUserData(null)
  }

}
</script>


<style scoped lang="scss">
@import "@/assets/sass/style.scss";

</style>
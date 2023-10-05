

<template>
  <RouterView></RouterView>
</template>

<style lang="scss">
#app {
  font-family: 'Quicksand', 'Kosugi Maru', 'Noto Sans TC', 'sans-serif';
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
<script>
// @ is an alias to /src
export default {
  name: 'Path',
  components: {

  },
  data() {
    return {
      isLogin: false,
      userData: null//抓他傳到php都要
    }
  },
  methods: {
    setUserData(data) {
      localStorage.setItem('user', JSON.stringify(data))
    },
    updateUser() {
      if (localStorage.getItem('user')) {
        this.isLogin = true
        this.userData = JSON.parse(localStorage.getItem('user'))
      }
    },
  },
  mounted() {
    // localStorage.clear()
    this.updateUser()
    window.addEventListener("storage", this.updateUser);

    fetch('http://localhost/musesmuseum/public/phps/login.php').then((res) => res.json()).then((res) => {
      if (res !== 0) {
        this.setUserData(res)
      } else {
        this.setUserData(null)
      }
    })

    // this.setUserData({
    //   no: 1234,
    //   name: 'Hi'
    // })
    // this.setUserData(null)
  }
}
</script>

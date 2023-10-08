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
  el: '#app',
  data() {
    return {
      mbr_name: '',
    };
  },
  created() {
    // // 在這裡從 API 獲取會員資料，設置 mbr_name
    // this.getMemberInfo();
  },

  methods: {
    // getMemberInfo() {
    //   // 從 API 獲取會員資訊
    //   fetch("http://localhost/musesmuseum/public/phps/MemberInfo.php")
    //     .then(response => {
    //       return response.json();
    //     })
    //     .then(result => {
    //       console.log(result);
    //       this.mbr_name = result.mbr_name;
    //     })
    //     .catch(error => {
    //       console.error('獲取會員資訊失敗', error);
    //     });
    // },
  },

  mounted() {

  }

}
</script>


<style scoped lang="scss">
@import "@/assets/sass/style.scss";
</style>
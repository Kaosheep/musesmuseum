<template>
  <main class="path_main">
    <div class="path_container">
      <h1>MUSESMUSEUM</h1>
      <RouterLink to="/Home">
        <div class="front">
          <span>前台</span>
        </div>
      </RouterLink>
      <RouterLink to="/Admin">
        <div class="back">
          <span>後台</span>
        </div>
      </RouterLink>
      <p>
      本網站為緯育TibaMe_前端設計工程師班第86期學員專題成果作品,本平台僅供學習、展示之用。若有抵觸有關著作權,或有第三人主張侵害智慧財產權等情事,均由學員負法律上責任,緯育公司概不負責。若有侵權疑慮,您可以私訊[緯育TibaMe],後續會由專人協助處理。
    </p>
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

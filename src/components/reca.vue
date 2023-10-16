<template>
  <vue-recaptcha
    v-show="showRecaptcha"
    sitekey="6LdRr54oAAAAAJIb2sdhDKYKDuBIAE8LaG-ljuGR"
    size="normal"
    theme="light"
    hl="zh-TW"
    :loading-timeout="loadingTimeout"
    @verify="recaptchaVerified"
    @expire="recaptchaExpired"
    @fail="recaptchaFailed"
    @error="recaptchaError"
    ref="vueRecaptcha"
  >
  </vue-recaptcha>
</template>
<!-- hl="zh-TW" -->

<script>
import vueRecaptcha from "vue3-recaptcha2";

export default {
  name: "app",
  components: {
    vueRecaptcha,
  },
  data() {
    return {
      showRecaptcha: true,
      loadingTimeout: 30000, // 30 seconds
    };
  },
  methods: {
    recaptchaVerified(response) {
      var formData = new FormData();
      formData.append("token", response);

      // 連接後端API，給後端進行認證
      // Connect to your Backend service.
      fetch(`${this.$store.state.publicpath}reca.php`, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((text) => {
          window.alert(text);
        })
        .catch((err) => {
          window.alert(err);
        });
      
    },
    recaptchaExpired() {
      this.$refs.vueRecaptcha.reset();
    },
    recaptchaFailed() {},
    recaptchaError(reason) {},
  },
};
</script>

<style scoped lang="scss"></style>

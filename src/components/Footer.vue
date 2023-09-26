<template>
  <footer>
    <div class="cube">
      <div class="flat">
        <div class="front"></div>
        <div class="top"></div>
        <div class="right"></div>
      </div>
    </div>
    <div class="cube">
      <div class="flat">
        <div class="front"></div>
        <div class="top"></div>
        <div class="right"></div>
      </div>
    </div>
    <div class="footer">
      <div class="colwrap">
        <div class="row">
          <div class="col">
            <router-link to="/">
              <h3>MUSES MUSEUM</h3>
            </router-link>
            <table>
              <tr>
                <td>參觀時間</td>
                <td>| 09:00-16:00</td>
              </tr>
              <tr>
                <td>地址</td>
                <td>| 希臘市和平區謬思路100號</td>
              </tr>
              <tr>
                <td>電話</td>
                <td>| 02-1234567</td>
              </tr>
            </table>
          </div>
          <div class="col">
            <label for="email">訂閱電子報</label>
            <div class="send">
              <form action="">
                <input type="text" placeholder="Email" id="email" />
                <button>
                  <font-awesome-icon
                    :icon="['fas', 'chevron-right']"
                    id="footer_send"
                  />
                </button>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="social">
              <span
                ><i class="sicon fa-solid fa-envelope" id="social_envelope"></i
              ></span>
              <span
                ><i
                  class="sicon fa-brands fa-square-facebook"
                  id="social_facebook"
                ></i
              ></span>
              <span
                ><i class="sicon fa-brands fa-youtube" id="social_youtub"></i
              ></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {},
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>

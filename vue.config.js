const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  publicPath: process.env.NODE_ENV === 'production'
  ? '/chd103/g1'
  : '/',
  css: {
    loaderOptions: {
      scss: {
        additionalData:
        `@import "~@/assets/sass/style.scss";`
      },
    }
  }
})
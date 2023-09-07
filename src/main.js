import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'


const vueapp = createApp(App)
vueapp.use(store)
vueapp.use(router)
vueapp.mount('#app')

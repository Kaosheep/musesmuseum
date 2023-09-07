import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
// import login from './login'

// import '@fortawesome/fontawesome-free/css/all.css'
// import '@fortawesome/fontawesome-free/js/all.js'


const vueapp = createApp(App)
vueapp.use(store)
vueapp.use(router)
vueapp.mount('#app')

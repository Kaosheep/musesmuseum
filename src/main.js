import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
<<<<<<< HEAD
// import login from './login'

// import '@fortawesome/fontawesome-free/css/all.css'
// import '@fortawesome/fontawesome-free/js/all.js'
=======
import ViewUIPlus from 'view-ui-plus'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import 'view-ui-plus/dist/styles/viewuiplus.css'
>>>>>>> kao


const vueapp = createApp(App)
vueapp.use(store)
vueapp.use(router)
vueapp.use(ViewUIPlus)
vueapp.mount('#app')

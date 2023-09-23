import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import ViewUIPlus from 'view-ui-plus'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import 'view-ui-plus/dist/styles/viewuiplus.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret)

const vueapp = createApp(App)
vueapp.use(store)
vueapp.use(router)
vueapp.use(ViewUIPlus)
vueapp.component('font-awesome-icon', FontAwesomeIcon)
vueapp.mount('#app')


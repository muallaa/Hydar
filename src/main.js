import  '../node_modules/bootstrap/dist/css/bootstrap.min.css'
import  '../node_modules/bootstrap/dist/js/bootstrap.bundle'
import '../node_modules/bootstrap-icons/font/bootstrap-icons.css'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import VueCookies from 'vue3-cookies'

const app = createApp(App)

app.use(VueCookies, {
    expireTimes: "30d",
    path: "/",
    domain: "",
    secure: true,
    sameSite: "None"
});



app.use(router)
app.mount('#app')

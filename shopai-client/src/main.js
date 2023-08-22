import { createApp } from 'vue'
import App from './App.vue'

// Vue Router
import router from './router'

// Vuex
import store from './store'

// Main Style
import "./assets/style/main.css"

// i18n (localization)
import i18n from "./i18n"

// Draggable
import Draggable from "vuedraggable"

// Pagination
import { TailwindPagination } from "laravel-vue-pagination"

// Axios Setup
import axios from "axios"
axios.defaults.baseURL = 'http://localhost:8000';
axios.defaults.withCredentials = true;
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";


// Initialization Vue App
const app = createApp(App)
    .component("Draggable", Draggable)
    .component("TailwindPagination", TailwindPagination)

// app.use(router).use(store).use(i18n)
app.use(router)
app.use(store)
app.use(i18n)

app.mount('#app')

require('./bootstrap')

import { createApp } from 'vue'
import VueSweetalert2 from "vue-sweetalert2";
// import the root component App from a single-file component.

import Coupon from './Admin/Coupon'
import PublicHeader from './Public/Header'

const app = createApp({})
app.component('coupon', Coupon)
app.component('PublicHeader', PublicHeader)

app.use(VueSweetalert2)
app.mount('#app')

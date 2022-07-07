require('./bootstrap')

import { createApp } from 'vue'
import VueSweetalert2 from "vue-sweetalert2";
// import the root component App from a single-file component.

import Coupon from './Admin/Coupon'

const app = createApp({})
app.component('coupon', Coupon)

app.use(VueSweetalert2)
app.mount('#app')

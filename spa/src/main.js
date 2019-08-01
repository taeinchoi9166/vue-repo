import Vue from 'vue'
import App from './App.vue'
import axios from 'axios';
import router from './router';
import 'bootstrap/dist/css/bootstrap.min.css'

Vue.prototype.$http = axios;

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})

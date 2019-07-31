import Vue from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import Child from './Child';

Vue.component('app',App)
Vue.component('Child',Child)

new Vue({
  el: '#app',
  render: h => h(App)
})

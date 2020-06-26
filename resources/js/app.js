require('./bootstrap');

// vue is supported
// @see https://laravel-mix.com/docs/5.0/mixjs
//window.Vue = require('vue');
import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import App from './App.vue'


// register components
Vue.use(BootstrapVue)
Vue.component('App', App)


// mount on class="vue"
const vueClasses = document.querySelectorAll('.vue')
if (vueClasses.length) {
  for (let i = 0; i < vueClasses.length; ++i) {
    new Vue({
      el: vueClasses[i],
    })
  }
}

const app = new Vue({
  el: '#app',
  //router: Router,
  components: {
    App
  },
  render: h => h(App)
});

// end mount


// if you want react support
// @see https://laravel.com/docs/6.x/mix#react
// @see https://laravel-mix.com/docs/5.0/mixjs#react-support

require('./bootstrap');

// vue is supported
// @see https://laravel-mix.com/docs/5.0/mixjs
//window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import HelloExample from './Components/hello-example.vue'
import RedAlert from './Components/red-alert.vue'
import CommentForm from './Components/comment-form.vue'
import App from './App.vue'
import CommentComponent from './Components/CommentComponent.vue'

function Comment({ id, text, name}) {
  this.id = id;
  this.text = text;
  this.name = name;
}

// register components
Vue.use(BootstrapVue)
Vue.use(VueRouter)
Vue.component('hello-example', HelloExample)
Vue.component('red-alert', RedAlert)
Vue.component('comment-form', CommentForm)
Vue.component('App', App)
Vue.component('CommentComponent', CommentComponent)


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
  router: Router,
  components: {
    App
  },
  render: h => h(App)
});

//let app = new Vue({
//    el: '#app',
//    router: new VueRouter(routes)
//});


// end mount


// if you want react support
// @see https://laravel.com/docs/6.x/mix#react
// @see https://laravel-mix.com/docs/5.0/mixjs#react-support

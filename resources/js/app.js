require('./bootstrap');

// vue is supported
// @see https://laravel-mix.com/docs/5.0/mixjs
import Vue from 'vue';
import HelloExample from './hello-example.vue'
import CommentBox from './comment-box.vue'

// register components
Vue.component('hello-example', HelloExample)
Vue.component('comment-box', CommentBox)

// mount on class="vue"
const vueClasses = document.querySelectorAll('.vue')
if (vueClasses.length) {
  for (let i = 0; i < vueClasses.length; ++i) {
    new Vue({
      el: vueClasses[i],
    })
  }
}
// end mount


// if you want react support
// @see https://laravel.com/docs/6.x/mix#react
// @see https://laravel-mix.com/docs/5.0/mixjs#react-support

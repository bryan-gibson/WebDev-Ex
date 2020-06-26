<template>
    <div id="app">
        <div class="heading"></div>
        <comment-component
                v-for="comment in comments"
                v-bind="comment"
                :key="comment.id"

                @delete="del"
        ></comment-component>

        <div v-if="mute">Processing</div>

            <!-- GENERATE BUTTON: <button style= "margin:10px;" @click="create">Generate Comment</button> -->
            <form @submit.prevent="checkForm" v-on:submit.prevent="post">
                <p class="err-msg" v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                        <!-- <error-alert></error-alert> -->
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </p>
                <strong>Name:</strong>
                <input type="text" class="form-control" name="name" value="name" v-model="name">
                <strong>Comment:</strong>
                <textarea class="form-control" name="text" value="text" v-model="text" maxlength="200"></textarea>

                <button class="btn btn-success" style="margin:10px;">Submit</button>
            </form>
    </div>
</template>

<script>
  function Comment({ id, name, text, created_at}) {
    this.id = id;
    this.name = name;
    this.text = text;
    this.date = created_at;
  }

  import CommentComponent from './Components/Comment.vue';
  import ErrorComponent from './Components/error-alert.vue';

  export default {
    data() {
      return {
          // 1 add vmodels
          // success flag?
          name: '',
          text: '',
        comments: [],
        errors: [],
        mute: false
      }
    },
    methods: {
      async create() {
        const { data } = await window.axios.get('/api/comments/create');
        this.comments.push(new Comment(data));
      },
      async post() {
        // get form inputs from v-models
        //bootstrap stuff

        console.log(name);
        const { data } = await window.axios.post('/api/comments', { name: this.name, text: this.text}); // need post data
        this.mute = true;
        this.comments.push(new Comment(data));
        this.name = '';
        this.text = '';
        this.errors = [];
        this.mute = false;
      },
      async read() {
        this.mute = true;
        const { data } = await window.axios.get('/api/comments');
        data.forEach(comment => this.comments.push(new Comment(comment)));
        this.mute = false;
      },
      async del(id) {
        this.mute = true;
        await window.axios.delete(`/api/comments/${id}`);
        let index = this.comments.findIndex(comment => comment.id === id);
        this.comments.splice(index, 1);
        this.mute = false;
      },
      checkForm: function (e) {
          if (this.name && this.text) {
            return true;
          }

          this.errors = [];

          if (!this.name) {
            this.errors.push('Name required.');
          }
          if (!this.text) {
            this.errors.push('Text field cannot be blank.');
          }

          e.preventDefault();
      },
    },
    /*watch: {
      mute(val) {
        document.getElementById('mute').className = val ? "on" : "";
      }
  },*/
    components: {
      CommentComponent
    },
    created() {
      this.read();
    }
  }
</script>
<style>
    #app {
        margin-left: 1em;
    }

    .heading h1 {
        margin-bottom: 0;
    }
</style>

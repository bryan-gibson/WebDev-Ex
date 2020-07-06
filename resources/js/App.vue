<template>
    <div id="app">
        <div class="heading"></div>
        <comment-component
                v-for="comment in comments"
                v-bind="comment"
                :key="comment.id"
                @delete="del"
        ></comment-component>
        <!-- GENERATE BUTTON <button style= "margin:10px;" @click="create">Generate Comment</button> -->
        <!-- Useless Comment -->
        <form @submit.prevent="post">
            <div class="alert alert-success" v-if="this.mute">
                <strong>Success!</strong> Indicates a successful or positive action.
            </div>
            <p class="err-msg" v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>
            <strong>Name:</strong>
            <input type="text" class="form-control" name="name" value="name" v-model="name">
            <strong>Comment:</strong>
            <textarea class="form-control" name="text" value="text" v-model="text" maxlength="250"></textarea>
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

  export default {
    data() {
      return {
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
         // validation
        this.errors = [];
        this.checkForm();

        if (this.errors.length > 0) {
            return;
        }
        // end validation

        const { data } = await window.axios.post('/api/comments', { name: this.name, text: this.text});
        this.mute = true;
        this.comments.push(new Comment(data));
        this.name = '';
        this.text = '';

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

          // e.preventDefault();
      },
    },
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

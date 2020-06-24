<template>
    <div id="app">
        <div class="heading">
        </div>
        <comment-component
                v-for="comment in comments"
                v-bind="comment"
                :key="comment.id"
                @update="update"
                @delete="del"
        ></comment-component>

<!-- DON'T TOUCH STUFF ABOVE -->
            <button style= "margin:10px;" @click="create">Generate Comment</button>
            <form @submit="post">
                        <strong>Name:</strong>
                        <input type="text" class="form-control" name="name" v-model="name">
                        <strong>Text:</strong>
                        <textarea class="form-control" name="text" v-model="text"></textarea>

                        <button class="btn btn-success" onclick="add(document.getElementById('name').value,document.getElementById('text').value">Submit</button>
            </form>
            <form method="post">
                    <input type="text" name="name" />
                    <input type="text" name="text" />

                    <b-button type="submit" variant="primary" @click="post">Submit</b-button>
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
        comments: [],
        mute: false
      }
    },
    methods: {
      async create() {
        const { data } = await window.axios.get('/api/comments/create');
        this.comments.push(new Comment(data));
      },
      async post() {
        const { data } = await window.axios.get('/api/comments/post');
        this.comments.push(new Comment(data));
      },
      async read() {
        this.mute = true;
        const { data } = await window.axios.get('/api/comments');
        data.forEach(comment => this.comments.push(new Comment(comment)));
        this.mute = false;
      },
      /*async update(id) {
        this.mute = true;
        await window.axios.put(`/api/comments/${id}`);
        this.cruds.find(crud => crud.id === id).color = color;
        this.mute = false;
    },*/
      async del(id) {
        this.mute = true;
        await window.axios.delete(`/api/comments/${id}`);
        let index = this.comments.findIndex(comment => comment.id === id);
        this.comments.splice(index, 1);
        this.mute = false;
      }
    },
    watch: {
      mute(val) {
        document.getElementById('mute').className = val ? "on" : "";
      }
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

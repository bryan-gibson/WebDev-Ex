<template>
    <div class="comment-box">
        <div class="block">
            <h5 class="comment-name">{{ name | properCase }} </h5>
            <p class="comment-date"><small>{{ date }}</small></p>
            <hr style="margin-top: 0;">
            <p class="comment-text">{{ text }}</p>
            <button class="btn btn-danger" style="margin:5px" @click="del">Delete</button>
        </div>
    </div>
</template>

<script>
  export default {
    methods: {
      del() {
        this.$emit('delete', this.id);
      }
    },
    props: ['id', 'name', 'date', 'text'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>

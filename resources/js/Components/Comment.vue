<template>
    <div class="comment">
        <div class="block">
            <h5 class="inline">{{ name | properCase }} </h5>
            <p class="inline-date"><small>{{ date }}</small></p>
            <p>{{ text }}</p>
            <button class="btn btn-danger" style= "margin:5px;" @click="del">Delete</button>
            <hr />
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

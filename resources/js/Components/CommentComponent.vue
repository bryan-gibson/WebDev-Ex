<template>
  <div class="comment">
    <h2>TEST TITLE</h2>
    <div class="col-2">
      <h3>Name: {{ name | properCase }}</h3>
      <p>Comment: {{ text | properCase }}</p>
      <button @click="del">Delete</button>
    </div>
  </div>
</template>
<script>
  /*export default {
    computed: {
      /*image() {
        return `/images/${this.color}.png`;
    }
    },
    methods: {
      //update(val) {
        //this.$emit('update', this.id, val.target.selectedOptions[0].value);
      //},
      del() {
        this.$emit('delete', this.id);
      }
    },
    props: ['id', 'text', 'name'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
}*/
</script>

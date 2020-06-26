<template>
  <div class="alert alert-danger">
    {{ message }}
  </div>
</template>

<script>
  export default {
    name: 'Error',
    props: ['errors'],
    data() {
      return {
        message: error in errors
      }
    },
  }
</script>

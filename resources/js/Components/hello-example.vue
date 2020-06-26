<template>
  <div class="alert alert-success">
    {{ message }}
  </div>
</template>

<script>
  export default {
    name: 'Example',
    props: { },
    data() {
      return {
        message: 'Comment successfully posted.'
      }
    },
  }
</script>

<template>
  <div class="alert alert-danger">
    {{ message }}
  </div>
</template>

<script>
  export default {
    name: 'Example',
    props: { },
    data() {
      return {
        message: 'comment box'
      }
    },
  }
</script>

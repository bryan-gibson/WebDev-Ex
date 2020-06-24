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
        message: 'It\'s Working, it\'s really working.'
      }
    },
  }
</script>

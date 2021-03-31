<template>
  <p>{{text}}</p>
</template>

<script>
export default {
  name: "MessageText",
  props: {
    text: {type: String, required: true}
  }
}
</script>

<style scoped>

</style>
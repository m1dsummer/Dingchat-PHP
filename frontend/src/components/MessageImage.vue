<template>
  <div>
    <img :src="imgURL">
  </div>
</template>

<script>
export default {
  name: "MessageImage",
  props: {
    src: { type: String, required: true}
  },
  computed: {
    imgURL() {
      return `https://summer-chat.oss-cn-hangzhou.aliyuncs.com/${this.src}`
    }
  }
}
</script>

<style scoped>
img {
  width: 8em;
}
</style>
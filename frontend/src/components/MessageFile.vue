<template>
  <div>
    <img src="/assets/download.png" title="download this file" @click="download">
    <p>{{filename}}</p>
  </div>
</template>

<script>
import parse from "parse-filepath"

export default {
  name: "MessageFile",
  props: {
    file: {type: String, required: true}
  },
  computed: {
    filename() {
      return parse(this.file).base.replace(/SummerChatMsg_\d+_/, "")
    }
  },
  methods: {
    download() {
      window.open(`https://summer-chat.oss-cn-hangzhou.aliyuncs.com/${this.file}`)
    }
  }
}
</script>

<style scoped>
div {
  display: flex;
  align-items: center;
}
img {
  width: 2em;
  margin-right: 1em;
  cursor: pointer;
}
p {
  margin: 0;
  padding: 0;
}
</style>
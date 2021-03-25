<template>
  <div @click="clickHandler" class="container">
    <div class="wrapper text">
      <img :src="imgURL" alt="">
    </div>
    <div class="wrapper">
      <p>{{name}}</p>
    </div>
  </div>  
</template>

<script>
export default {
  name: "GroupInfo",
  props: {
    icon: {
      type: String,
      default: "1.png"
    },
    name: {
      type: String,
      default: "Group Chat"
    }
  },
  computed: {
    imgURL() {
      return `/assets/groups/${this.icon}`
    }
  },
  methods: {
    clickHandler() {
      this.$emit("changeGroup", this.name)
    }
  },
  mounted() {

  }
}
</script>

<style scoped>
.container {
  display: grid;
  grid-template-columns: 1fr 5fr;
  height: 3em;
  border-bottom: 1px solid #aaa;
}
img {
  width: 2em;
  height: 2em;
}
p {
  margin: 0;
  width: 100%;
  text-align: left;
}
.wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}
.text {
  line-height: 2em;
}
</style>
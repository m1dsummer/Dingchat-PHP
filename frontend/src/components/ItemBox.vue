<template>
  <div @click="clickHandler" class="container">
    <div class="wrapper img">
      <img :src="imgURL" alt="">
    </div>
    <div class="wrapper text">
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
  width: 2.5em;
  height: 2.5em;
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
  padding-left: .8em;
}
img {
  background: #fff;
  border-radius: 50%;
  padding: 10px;
  box-sizing: padding-box;
  cursor: pointer;
}
</style>
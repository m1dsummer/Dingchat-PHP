<template>
  <div class="menu-item">
    <img :src="src" v-bind:style="`width:${width};height:${width};`">
  </div>
</template>

<script>
export default {
  name: "MenuItem",
  props: {
    src: {
      type: String,
      default: "/assets/avatar/1.png"
    },
    width: {
      type: String,
      default: "2.5em"
    }
  },
  mounted() {

  }
}
</script>

<style scoped>
.menu-item {
  flex-basis: 4em;
  padding: .5em 0;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
</style>
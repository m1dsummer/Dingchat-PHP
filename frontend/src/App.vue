<template>
  <router-view/>
</template>

<script>
export default {
  name: "App"
}
</script>

<style>
html,body,#app {
  height: 100%;
  overflow: hidden;
}
#nav {
  padding: 1em 2em 0;
}
#title {
  text-decoration: none;
  color: inherit;
}
#chatroom {
  height: auto;
}
</style>

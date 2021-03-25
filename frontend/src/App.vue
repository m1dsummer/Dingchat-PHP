<template>
  <router-view />
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      userInfo: {
        name: "Summer",
        avatar: ""
      },
    }
  }
}
</script>

<style>
html, body, #chatroom {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
}
html {
  background: url("/assets/background.jpg");
}
body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: rgba(0, 0, 0, .6);
}
</style>

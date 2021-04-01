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
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
}
html {
  background: url("/assets/background.jpg");
}
html:after {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  top: 0; 
  bottom: 0;
  z-index: -1;
  background: url("/assets/background.jpg");
  filter: blur(5px);
}
body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: rgba(0, 0, 0, .6);
}
</style>

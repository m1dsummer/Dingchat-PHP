<template>
  <div class="container">
    <div id="nav" class="row">
      <div class="col-lg-10">
        <router-link to="/" id="title">
          <h1>Summer's chatroom</h1>
        </router-link>
      </div>
      <div class="col-lg-1 align-middle">
        <router-link to="/user/login" type="button" class="btn btn-info">login</router-link>
      </div>
      <div class="col-lg-1 align-middle">
        <router-link to="/user/register" type="button" class="btn btn-primary">register</router-link>
      </div>
    </div>
    <form>
    <div class="row justify-content-center">
      <label class="col-lg-1 col-form-label">username:</label>
      <div class="col-lg-4">
        <input type="text" v-model="username" id="username" class="form-control">
      </div>
    </div>
    <div class="row justify-content-center">
      <label class="col-lg-1 col-form-label" for="password">password:</label>
      <div class="col-lg-4">
        <input type="password" v-model="password" id="password" class="form-control">
      </div>
    </div>
    <div class="row justify-content-center">
      <button @click="handler" class="col-lg-1">{{buttonText}}</button>
    </div>
  </form>
  </div>
</template>

<script>
import axios from "axios"

export default {
  name: "Login",
  data() {
    return {
      username: "",
      password: ""
    }
  },
  computed: {
    buttonText() {
      const page = this.$route.params.page
      if (["login", "register"].includes(page)) {
        return page
      } else {
        return "login"
      }
    }
  },
  methods: {
    post(url) {
      const data = {
        username: this.username,
        password: this.password
      }
      axios.post(url, data).then(res => {
        if (res.data.code == 1) {
          alert(res.data.msg)
        } else {
          this.$router.push("/")
        }
      })
    },
    login() {
      this.post("/index.php?action=login")
    },
    register() {
      this.post("/index.php?action=register")
    },
    handler(e) {
      e.preventDefault()
      this.buttonText == "login" ? this.login() : this.register()
    }
  },
  mounted() {
    console.log(this.buttonText)
  }
}
</script>

<style scoped>
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

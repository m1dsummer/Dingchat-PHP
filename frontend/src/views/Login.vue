<template>
  <div class="msg-box">
    <div id="page-switch">
      <router-link to="/register" v-bind:class="{emphasis:isRegisterPage}">SIGNUP</router-link>
      <router-link to="/login" v-bind:class="{emphasis:!isRegisterPage}">SIGNIN</router-link>
    </div>
    <div id="img-container">
      <div id="img-wrapper">
        <img src="/assets/logo.png" alt="logo" width="64px">
      </div>
    </div>
    <form>
      <div class="form-line">
        <input v-model="username" type="text" placeholder="username">
      </div>
      <div class="form-line">
        <input v-model="password" type="password" placeholder="password">
      </div>
      <div v-if="isRegisterPage" class="form-line">
        <input v-model="password2"
              v-bind:class="{'red-border':!passwdMatch}"
              type="password"
              placeholder="confirm password">
      </div>
      <div class="form-line">
        <button @click.prevent="handler" id="login" class="btn btn-success">SIGNIN</button>
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
      password: "",
      password2: ""
    }
  },
  computed: {
    isRegisterPage() {
      return this.$route.path === "/register"
    },
    passwdMatch() {
      return this.password2 != "" && (this.password == this.password2)
    }
  },
  methods: {
    handler() {
      let url = ""
      let des = ""
      const data = {
        username: this.username,
        password: this.password
      }
      if (this.isRegisterPage) {
        url = "/index.php?action=register"
        des = "/login"
      } else {
        url = "/index.php?action=login"
        des = "/"
      }
      axios.post(url, data).then(res => {
        if (res.data.code == 0) {
          this.$router.push(des)
        } else {
          alert(res.data.msg)
        }
      })
    }
  },
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap');

.msg-box {
  margin: 20% auto;
  width: 30%;
  padding: 2em 0;
  background-color: #ddd;
  font-family: 'Cairo', sans-serif;
  transition: all .8s linear;
}
#page-switch {
  display: grid;
  grid-template-columns: 1fr 1fr;
}
#page-switch a {
  text-decoration: none;
  color: #aaa;
  text-align: center;
  display: block;
  width: 100%;
}
.emphasis {
  color: #666 !important;
  font-weight: bolder;
}
#img-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: auto;
}
#img-wrapper {
  margin: 10px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 4px solid #eee; 
  background: #eee;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.form-line {
  display: flex;
  justify-content: center;
  margin: 1em auto;
  width: 70%;
}
.form-line > * {
  width: 100%;
}
.form-line > input {
  border-radius: 4px;
  padding: .3em 0;
  border: 2px solid #ccc;
  text-align: center;
  outline: none;
}
.form-element {
  display: flex;
  justify-content: center;
}
.red-border {
  border-color: rgba(255,0,0,.6) !important;
}
#login {
  border-radius: 4px;
}
</style>
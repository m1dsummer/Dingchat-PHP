<template>
  <div class="container">
    <div id="nav" class="row">
      <div class="col-lg-8">
        <router-link to="/" id="title">
          <h1>Summer's chatroom</h1>
        </router-link>
      </div>
      <div class="row col-lg-4 align-center"
           v-if="curUser==''"
      >
        <div class="col-lg-6">
          <router-link to="/user/login" type="button" class="btn btn-info">login</router-link>
        </div>
        <div class="col-lg-6">
          <router-link to="/user/register" type="button" class="btn btn-primary">register</router-link>
        </div>
      </div>
      <div class="row col-lg-4 align-center"
           v-else
      >
        <div class="col-lg-2">
          <p>{{curUser}}</p>
        </div>
        <div class="col-lg-5">
          <router-link to="/new-group" type="button" class="btn btn-primary">new room</router-link>
        </div>
        <div class="col-lg-5">
          <button @click="logout" class="btn btn-danger">logout</button>
        </div>
      </div>
    </div>
    <div id="chatroom" class="row">
      <div class="row">
        <div class="col-lg-2">
          <ul>
            <li v-for="(group,index) in groups" 
                :key="`chatroom-${index}`"
                :groupId="group"
                @click="changeGroup"
            >{{group}}</li>
          </ul>
        </div>
        <div class="col-lg-10">
          <ul>
            <li v-for="(item,index) in records" :key="`record-${index}`">{{item}}</li>
          </ul>
        </div>
      </div>
      <div v-show="curUser" class="row">
        <textarea v-model="message" type="text" class="col-lg-10"></textarea>
        <button @click="postMessage" class="col-lg-2 btn btn-primary">发送</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios"

export default {
  name: "Home",
  data() {
    return {
      curUser: "",
      curGroup: "",
      message: "",
      groups: [],
      records: []
    }
  },
  methods: {
    async changeGroup(e) {
      const gid = e.target.getAttribute("groupId")
      if (gid != this.curGroup) {
        console.log(gid)
        this.curGroup = gid
        this.getMsgRecord()
      }
    },
    async getGroups() {
      const res = await axios.post("/index.php?action=get-groups", {user:this.curUser})
      if (res.data.code == 0) {
        this.groups = res.data.data
        this.curGroup = this.groups[0]
      }
    },
    async getMsgRecord() {
      const res = await axios.post("/index.php?action=get-records", {gid:this.curGroup})
      console.log(res.data)
      if (res.data.code == 0) {
        this.records = res.data.data
      }
    },
    async logout() {
      await axios.get("/index.php?action=logout")
      location.reload()
    },
    async postMessage() {
      const data = {
        sender: this.curUser,
        content: this.message,
        gid: this.curGroup
      }
      const res = await axios.post("/index.php?action=post-message", data);
      if (res.data.code == 1) {
        alert(`failed to send message\n${res.data.msg}`)
      } else {
        this.message = ""
        this.getMsgRecord()
      }
    },
  },
  mounted() {
    axios.get("/index.php?action=get-status").then(async res => {
      if (res.data.code == 0) {
        this.curUser = res.data.data.username
        await this.getGroups()
        this.getMsgRecord()
      }
    })
  }
}
</script>

<style scoped>
</style>
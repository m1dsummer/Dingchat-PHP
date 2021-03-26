<template>
  <div id="chatroom">
    <new-group
      :curuser="userinfo.username"
      v-on:close="showDialog=false"
      v-on:succeed="getGroups"
      v-show="showDialog"
    ></new-group>
    <header>
      <div></div>
      <div></div>
    </header>
    <main>
      <div id="menu">
        <div>
          <menu-item :src="`/assets/avatar/${this.userinfo.avatar}`" :width="`3em`"></menu-item>
        </div>
        <div>
          <menu-item :src="`/assets/message.png`" :width="`2em`"></menu-item>
        </div>
        <div @click="showDialog=true">
          <menu-item :src="`/assets/add.png`" :width="`2em`"></menu-item>
        </div>
      </div>
      <div id="groups">
        <item-box
          v-for="(group,index) in groups"
          :key="`group-${index}`"
          :name="group.name"
          :icon="group.icon"
          :gid="group.gid"
          v-on:changeGroup="changeGroup"
        >{{group}}</item-box>
      </div>
      <div id="window">
        <div id="msg-list">
          <message-box
            v-for="(msg, index) in messageList"
            :key="`msg-${index}`"
            :icon="`/assets/avatar/${msg.avatar}`"
            :name="msg.sender"
            :content="msg.content"
            :self="msg.sender==userinfo.username"
          ></message-box>
        </div>
        <div id="input-area">
          <textarea v-model="message"></textarea>
          <button @click="postMessage">send</button>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import axios from "axios"
import MenuItem from "@/components/MenuItem.vue"
import ItemBox from "@/components/ItemBox.vue"
import NewGroup from "@/components/NewGroup.vue"
import MessageBox from "@/components/MessageBox"

export default {
  name: "Home",
  components: {
    ItemBox,
    MenuItem,
    NewGroup,
    MessageBox,
  },
  data() {
    return {
      userinfo:{
        username: "",
        avatar: "1.png"
      },
      groups: {},
      messageList: [],
      message: "",
      showDialog: false
    }
  },
  methods: {
    async getGroups() {
      const res = await axios.post("/index.php?action=get-groups", {user:this.userinfo.username})
      if (res.data.code == 0) {
        this.groups = res.data.data
        this.curGroup = this.groups[0].name
      }
    },
    async changeGroup(gid) {
      this.curGroup = gid
      this.getMsgRecord()
    },
    async getMsgRecord() {
      const res = await axios.post("/index.php?action=get-records", {gid:this.curGroup})
      if (res.data.code == 0) {
        this.messageList = res.data.data
      }
    },
    async logout() {
      await axios.get("/index.php?action=logout")
      location.reload()
    },
    async postMessage() {
      const data = {
        sender: this.userinfo.username,
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
  async mounted() {
    const res = await axios.get("/index.php?action=get-status")
    if (res.data.code != 0) {
      alert(res.data.msg)
      this.$router.push("/login")
    }
    for (const key in res.data.data) {
      this.$set(this.userinfo, key, res.data.data[key])
    }
    this.getGroups()
  }
}
</script>

<style scoped>
#chatroom {
  height: 600px;
  width: 1000px;
  margin: 0 auto;
  padding: 0;
  border-radius: 6px;
  border: 1px solid #000;
  display: flex;
  flex-direction: column;
}
header {
  flex-basis: 12.5%;
  flex-shrink: 0;
  background-color: #3d63f3;
  display: grid;
  grid-template-columns: 2fr 1fr;
}
main {
  flex-basis: 87.5%;
  display: flex;
}
.main > * {
  height: 100%;
}
#menu, .menu-item {
  display: flex;
  flex-direction: column;
  background-color: #e5e8f5;
}
#menu {
  flex-basis: 10%;
}
#groups {
  flex-basis: 30%;
  background-color: #f8faff;
  border-right: 1px solid #aaa;
}
#window {
  flex-basis: 70%;
  background-color: #f8faff;
  position: relative;
}
#msg-list {
  position: absolute;
  top: 0;
  width: 100%;
  height: 90%;
  max-height: 90%;
  overflow-y: scroll;
}
#input-area {
  height: 10%;
  width: 100%;
  position: absolute;
  bottom: 0;
  background: #333;
  display: grid;
  grid-template-columns: 8fr 1fr;
}
</style>
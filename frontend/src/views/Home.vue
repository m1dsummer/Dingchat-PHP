<template>
  <div id="chatroom" class="container">
    <new-group
      :curuser="userinfo.username"
      v-on:close="showDialog=false"
      v-on:succeed="getGroups"
      v-show="showDialog"
    ></new-group>
    <header>
      <div><h1>SummerChat</h1></div>
      <div></div>
    </header>
    <main class="row m-0">
      <div id="menu" class="col-sm-1 p-0">
        <div>
          <menu-item 
            :src="`/assets/avatar/${this.userinfo.avatar}`"
            :width="`3em`"
            :title="userinfo.username"
          ></menu-item>
        </div>
        <div>
          <menu-item :src="`/assets/message.png`" :width="`2em`"></menu-item>
        </div>
        <div @click="showDialog=true">
          <menu-item :src="`/assets/add.png`" :width="`2em`"></menu-item>
        </div>
        <div @click="logout">
          <menu-item :src="`/assets/logout.png`" :width="`2em`"></menu-item>
        </div>
      </div>
      <div id="groups" class="col-sm-3 p-0">
        <item-box
          v-for="(group,index) in groups"
          :key="`group-${index}`"
          :name="group.name"
          :icon="group.icon"
          :gid="group.gid"
          :class="{'cur-group':curGroup==group.name}"
          v-on:changeGroup="changeGroup"
        >{{group}}</item-box>
      </div>
      <div id="window" class="col-sm-8 p-0">
        <div id="msg-list">
          <message-box
            v-for="(msg, index) in messageList"
            :key="`msg-${index}`"
            :icon="`/assets/avatar/${msg.avatar}`"
            :name="msg.sender"
            :content="msg.content"
            :type="msg.type"
            :self="msg.sender==userinfo.username"
          ></message-box>
        </div>
        <div id="input-area">
          <div class="controller-contanier">
            <div class="controller">
              <label id="img-label" for="image-selector" title="send pictures"></label>
              <input @change="sendImage" id="image-selector" accept="image/*" type="file">
            </div>
            <div class="controller">
              <label id="file-label" for="file-selector" title="send files"></label>
              <input @change="sendFile" id="file-selector" type="file">
            </div>
          </div>
          <div id="text-field">
            <textarea
              v-model="message"
              v-on:keyup.enter.ctrl="sendMessage"
              placeholder="press Ctrl+Enter to send message"
            ></textarea>
            <button @click="sendMessage">send</button>
          </div>
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
import Player from "@/js/player"
import Reader from "@/js/reader"

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
        this.curGroup = this.curGroup || this.groups[0].name
      }
    },
    async changeGroup(gid) {
      this.curGroup = gid
      this.messageList = []
      this.getMsgRecord()
    },
    async getMsgRecord() {
      const res = await axios.post("/index.php?action=get-records",{gid:this.curGroup})
      const data = res.data.data
      const sender = data.length ? data[data.length-1].sender : ''
      const self = this.userinfo.username
      if (this.messageList.length && sender!=self && this.messageList.length != data.length) {
        Player.play()
      }
      this.messageList = data
    },
    async logout() {
      await axios.get("/index.php?action=logout")
      location.reload()
    },
    async postMessage(data) {
      const res = await axios.post("/index.php?action=post-message", data);
      if (res.data.code == 1) {
        alert(`failed to send message\n${res.data.msg}`)
      } else {
        this.message = ""
        this.getMsgRecord()
      }
    },
    async update() {
      if (this.userinfo.username) {
        await this.getGroups()
        this.getMsgRecord()
      }
    },
    async sendMessage() {
      if (!this.message) {
        return
      }
      const data = {
        sender: this.userinfo.username,
        content: this.message,
        gid: this.curGroup,
        type: "text"
      }
      this.postMessage(data)
    },
    async sendImage(e) {
      const file = e.target.files[0]
      const content = await Reader.readFile(file)
      const data = {
        sender: this.userinfo.username,
        content: btoa(content),
        filename: file.name,
        gid: this.curGroup,
        type: "image",
      }
      this.postMessage(data)
    },
    async sendFile(e) {
      const file = e.target.files[0]
      const content = await Reader.readFile(file)
      const data = {
        sender: this.userinfo.username,
        content: btoa(content),
        filename: file.name,
        gid: this.curGroup,
        type: "file",
      }
      this.postMessage(data)
    }
  },
  async mounted() {
    const res = await axios.get("/index.php?action=get-status")
    if (res.data.code != 0) {
      alert(res.data.msg)
      this.$router.push("/login")
      return
    }
    for (const key in res.data.data) {
      this.$set(this.userinfo, key, res.data.data[key])
    }
    setInterval(this.update, 1000)
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Prompt:ital@1&display=swap');
@import url('https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400&display=swap');

#chatroom {
  margin: 0 auto;
  padding: 0;
  width: 70%;
  height: 80%;
  display: flex;
  flex-direction: column;
}
header {
  flex-basis: 12.5%;
  flex-shrink: 0;
  background-color: #3d63f3;
  display: grid;
  grid-template-columns: 2fr 1fr;
  align-items: center;
  font-family: 'Prompt', sans-serif;
}
header  h1 {
  padding-left: 1em;
  color: rgba(255,255,255,.8);
  font-size: xx-large;
  margin: 0;
}
main {
  flex-basis: 87.5%;
  position: relative;
  font-family: 'M PLUS 1p', sans-serif;
}
#menu, .menu-item {
  display: flex;
  flex-direction: column;
  background-color: #e5e8f5;
}
#groups {
  background-color: #f8faff;
  border-right: 1px solid #aaa;
  overflow-y: overlay;
}
#window {
  background-color: #f8faff;
  position: relative;
}
#msg-list {
  position: absolute;
  top: 0;
  width: 100%;
  height: 80%;
  max-height: 90%;
  overflow-y: scroll;
}
#input-area {
  height: 20%;
  width: 100%;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #eee;
  background-color: #fff;
  display: flex;
  flex-direction: column;
}
.controller-contanier {
  display: flex;
  height: 24px;
}
.controller-contanier label {
  width: 24px;
  height: 24px;
  cursor: pointer;
}
input[type="file"] {
  text-decoration: none;
  opacity: 0;
  display: none;
}
.controller {
  height: fit-content;
  padding: 0 4px;
}
.controller > label {
  background-size: contain;
  background-position: center;
}
#img-label {
  background-image: url("/assets/image.png");
}
#file-label {
  background-image: url("/assets/file.png");
}
#text-field {
  flex-grow: 1;
  flex-shrink: 1;
  display: grid;
  grid-template-columns: 8fr 1fr;
  height: calc(100% - 24px);
}
#text-field > textarea {
  outline: none;
  resize: none;
  border: none;
}
#text-field > button {
  color: #75c2ff;
  border: none;
  background: inherit;
}
.cur-group {
  background-color: #D5EDFE;
}
</style>
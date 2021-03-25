<template>
  <form class="container dialog">
    <div class="row form-line">
      <input v-model="gid" type="text" placeholder="Group name" class="form-control">
    </div>
    <div class="row form-line">
        <div 
          class="row col-lg-6"
          v-for="(user,index) in users"
          :key="`user-${index}`"
        >
          <input 
            class="col-lg-1" type="checkbox"
            :id="`user-${index}`"
            :value="user.username"
            v-model="selectedUsers"
          >
          <label class="col-lg-11" :for="`user-${index}`">
            <item-box :icon="user.avatar" :name="user.username"></item-box>
          </label>
        </div>
    </div>
    <div class="row form-line">
      <button @click.prevent="newGroup" class="btn btn-success">create</button>
    </div>
    <div class="row form-line">
      <button @click.prevent="close" class="btn btn-danger">close</button>
    </div>
  </form>
</template>

<script>
import ItemBox from "@/components/ItemBox.vue"
import axios from "axios"

export default {
  name: "NewGroup",
  props: {
    curuser: {
      type: String,
      required: true
    }
  },
  components: {
    ItemBox
  },
  data() {
    return {
      gid: "",
      users: [],
      selectedUsers: []
    }
  },
  methods: {
    done() {
      this.$emit("close")
      this.$emit("succeed")
    },
    async getUsers() {
      const res = await axios.get("/index.php?action=get-users")
      this.users = res.data.data
    },
    async newGroup() {
      const data = {
        gid: this.gid,
        members: this.selectedUsers
      }
      console.log(data)
      const res = await axios.post("/index.php?action=new-group", data)
      if (res.data.code == 0) {
        alert("创建成功！")
        this.done()
      } else {
        alert(res.data.msg)
      }
    }
  },
  mounted() {
    this.getUsers()
  }
}
</script>

<style scoped>
.dialog {
  position: absolute;
  z-index: 1;
  width: 50%;
  background: #ccc;
  left: 50%;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 3em 0;
}
.form-line {
  width: 80%;
}
li {
  list-style: none;
  text-align: center;
}
</style>
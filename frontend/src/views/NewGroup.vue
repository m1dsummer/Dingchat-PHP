<template>
    <div class="container">
        <form>
            <div class="row">
                <label for="" class="col-form-label col-lg-4">Group name:</label>
                <div class="col-lg-8">
                    <input v-model="groupId" type="text" class="form-control">
                </div>
            </div>
            <ul class="row">
                <li v-for="(user, index) in userList"
                    :key="`user-${index}`"
                    class="col-lg-4"
                ><input type="checkbox" :value="user" v-model="checkedList">{{user}}</li>
            </ul>
            <button @click.prevent="newGroup">submit</button>
        </form>
    </div>
</template>

<script>
import axios from "axios"

export default {
    name: "NewGroup",
    data() {
        return {
            groupId: "",
            userList: [],
            checkedList: []
        }
    },
    methods: {
      async newGroup() {
        if (!this.groupId || !this.userList.length) {
          return
        }
        const data = {
          gid: this.groupId,
          members: this.checkedList
        }
        const res = await axios.post("/index.php?action=new-group", data)
        if (res.data.code != 0) {
          alert(res.data.msg)
        } else {
          this.$router.push("/")
        }
      }
    },
    mounted() {
        axios.get("/index.php?action=get-users").then(res => {
          this.userList = res.data.data
        })
    }
}
</script>
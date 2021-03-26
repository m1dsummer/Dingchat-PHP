<template>
  <div class="msg-container" :class="{self}">
    <div class="avatar-wrapper">
      <img :src="icon">
    </div>
    <div>
      <div class="id-wrapper">
        <p :class="{'self-id':self}">{{name}}</p>
      </div>
      <div class="content-wrapper" :class="{self}">
        <p>{{content}}</p>
      </div>
    </div>
    <div class="blank-wrapper"></div>
  </div> 
</template>

<script>
export default {
  name: "MessageBox",
  props: {
    icon: { type: String, required: true },
    name: { type: String, required: true },
    content: { type: String, required: true },
    self: { type: Boolean, default: false},
  }
}
</script>

<style scoped>
.msg-container {
  display: flex;
  margin: 10px 0;
}
.avatar-wrapper {
  flex-basis: 8%;
  padding: .2em .5em .2em 1em;
  cursor: pointer;
}
.avatar-wrapper > img {
  width: 2em;
  height: 2em;
}
.id-wrapper > p {
  font-size: smaller;
  color: #333;
}
.content-wrapper {
  flex-basis: 40%;
  display: flex;
  flex-direction: row;
  align-items: center;
}
p {
  margin: 0;
}
.content-wrapper > p {
  padding: .2em 1em .2em 1em;
  width: fit-content;
  border-radius: 6px;
  border: 1px solid #ccc;
  background-color: #fff;
}
.blank-wrapper {
  flex-basis: 62%;
}
.others {
  flex-direction: row;
}
.self {
  flex-direction: row-reverse;
}
.self-id {
  text-align: right;
}
</style>
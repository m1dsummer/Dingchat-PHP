(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-798bd780"],{"4ced":function(s,e,t){"use strict";t("e14e")},a55b:function(s,e,t){"use strict";t.r(e);var a=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("div",{staticClass:"msg-box"},[t("div",{attrs:{id:"page-switch"}},[t("router-link",{class:{emphasis:s.isRegisterPage},attrs:{to:"/register"}},[s._v("SIGNUP")]),t("router-link",{class:{emphasis:!s.isRegisterPage},attrs:{to:"/login"}},[s._v("SIGNIN")])],1),s._m(0),t("form",[t("div",{staticClass:"form-line"},[t("input",{directives:[{name:"model",rawName:"v-model",value:s.username,expression:"username"}],attrs:{type:"text",placeholder:"username"},domProps:{value:s.username},on:{input:function(e){e.target.composing||(s.username=e.target.value)}}})]),t("div",{staticClass:"form-line"},[t("input",{directives:[{name:"model",rawName:"v-model",value:s.password,expression:"password"}],attrs:{type:"password",placeholder:"password"},domProps:{value:s.password},on:{input:function(e){e.target.composing||(s.password=e.target.value)}}})]),s.isRegisterPage?t("div",{staticClass:"form-line"},[t("input",{directives:[{name:"model",rawName:"v-model",value:s.password2,expression:"password2"}],class:{"red-border":!s.passwdMatch},attrs:{type:"password",placeholder:"confirm password"},domProps:{value:s.password2},on:{input:function(e){e.target.composing||(s.password2=e.target.value)}}})]):s._e(),t("div",{staticClass:"form-line"},[t("button",{staticClass:"btn btn-success",attrs:{id:"login"},on:{click:function(e){return e.preventDefault(),s.handler(e)}}},[s._v("SIGNIN")])])])])},r=[function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("div",{attrs:{id:"img-container"}},[t("div",{attrs:{id:"img-wrapper"}},[t("img",{attrs:{src:"/assets/logo.png",alt:"logo",width:"64px"}})])])}],i=t("bc3a"),n=t.n(i),o={name:"Login",data:function(){return{username:"",password:"",password2:""}},computed:{isRegisterPage:function(){return"/register"===this.$route.path},passwdMatch:function(){return""!=this.password2&&this.password==this.password2}},methods:{handler:function(){var s=this,e="",t="",a={username:this.username,password:this.password};this.isRegisterPage?(e="/index.php?action=register",t="/login"):(e="/index.php?action=login",t="/"),n.a.post(e,a).then((function(e){0==e.data.code?s.$router.push(t):alert(e.data.msg)}))}}},d=o,p=(t("4ced"),t("2877")),c=Object(p["a"])(d,a,r,!1,null,"17c4149a",null);e["default"]=c.exports},e14e:function(s,e,t){}}]);
//# sourceMappingURL=chunk-798bd780.19d1e5dd.js.map
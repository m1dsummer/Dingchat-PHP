(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5e4603cd"],{"0329":function(e,t,r){"use strict";r("c0e8")},3253:function(e,t,r){"use strict";r("c9e5")},4981:function(e,t,r){},"5d88":function(e,t,r){"use strict";r("9903")},8885:function(e,t,r){"use strict";r("4981")},9318:function(e,t,r){"use strict";r("97cc")},"96cf":function(e,t,r){var n=function(e){"use strict";var t,r=Object.prototype,n=r.hasOwnProperty,a="function"===typeof Symbol?Symbol:{},o=a.iterator||"@@iterator",i=a.asyncIterator||"@@asyncIterator",s=a.toStringTag||"@@toStringTag";function c(e,t,r){return Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}),e[t]}try{c({},"")}catch(N){c=function(e,t,r){return e[t]=r}}function u(e,t,r,n){var a=t&&t.prototype instanceof g?t:g,o=Object.create(a.prototype),i=new O(n||[]);return o._invoke=E(e,r,i),o}function l(e,t,r){try{return{type:"normal",arg:e.call(t,r)}}catch(N){return{type:"throw",arg:N}}}e.wrap=u;var f="suspendedStart",p="suspendedYield",d="executing",h="completed",m={};function g(){}function v(){}function w(){}var y={};y[o]=function(){return this};var x=Object.getPrototypeOf,b=x&&x(x(S([])));b&&b!==r&&n.call(b,o)&&(y=b);var _=w.prototype=g.prototype=Object.create(y);function k(e){["next","throw","return"].forEach((function(t){c(e,t,(function(e){return this._invoke(t,e)}))}))}function L(e,t){function r(a,o,i,s){var c=l(e[a],e,o);if("throw"!==c.type){var u=c.arg,f=u.value;return f&&"object"===typeof f&&n.call(f,"__await")?t.resolve(f.__await).then((function(e){r("next",e,i,s)}),(function(e){r("throw",e,i,s)})):t.resolve(f).then((function(e){u.value=e,i(u)}),(function(e){return r("throw",e,i,s)}))}s(c.arg)}var a;function o(e,n){function o(){return new t((function(t,a){r(e,n,t,a)}))}return a=a?a.then(o,o):o()}this._invoke=o}function E(e,t,r){var n=f;return function(a,o){if(n===d)throw new Error("Generator is already running");if(n===h){if("throw"===a)throw o;return j()}r.method=a,r.arg=o;while(1){var i=r.delegate;if(i){var s=G(i,r);if(s){if(s===m)continue;return s}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if(n===f)throw n=h,r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);n=d;var c=l(e,t,r);if("normal"===c.type){if(n=r.done?h:p,c.arg===m)continue;return{value:c.arg,done:r.done}}"throw"===c.type&&(n=h,r.method="throw",r.arg=c.arg)}}}function G(e,r){var n=e.iterator[r.method];if(n===t){if(r.delegate=null,"throw"===r.method){if(e.iterator["return"]&&(r.method="return",r.arg=t,G(e,r),"throw"===r.method))return m;r.method="throw",r.arg=new TypeError("The iterator does not provide a 'throw' method")}return m}var a=l(n,e.iterator,r.arg);if("throw"===a.type)return r.method="throw",r.arg=a.arg,r.delegate=null,m;var o=a.arg;return o?o.done?(r[e.resultName]=o.value,r.next=e.nextLoc,"return"!==r.method&&(r.method="next",r.arg=t),r.delegate=null,m):o:(r.method="throw",r.arg=new TypeError("iterator result is not an object"),r.delegate=null,m)}function R(e){var t={tryLoc:e[0]};1 in e&&(t.catchLoc=e[1]),2 in e&&(t.finallyLoc=e[2],t.afterLoc=e[3]),this.tryEntries.push(t)}function C(e){var t=e.completion||{};t.type="normal",delete t.arg,e.completion=t}function O(e){this.tryEntries=[{tryLoc:"root"}],e.forEach(R,this),this.reset(!0)}function S(e){if(e){var r=e[o];if(r)return r.call(e);if("function"===typeof e.next)return e;if(!isNaN(e.length)){var a=-1,i=function r(){while(++a<e.length)if(n.call(e,a))return r.value=e[a],r.done=!1,r;return r.value=t,r.done=!0,r};return i.next=i}}return{next:j}}function j(){return{value:t,done:!0}}return v.prototype=_.constructor=w,w.constructor=v,v.displayName=c(w,s,"GeneratorFunction"),e.isGeneratorFunction=function(e){var t="function"===typeof e&&e.constructor;return!!t&&(t===v||"GeneratorFunction"===(t.displayName||t.name))},e.mark=function(e){return Object.setPrototypeOf?Object.setPrototypeOf(e,w):(e.__proto__=w,c(e,s,"GeneratorFunction")),e.prototype=Object.create(_),e},e.awrap=function(e){return{__await:e}},k(L.prototype),L.prototype[i]=function(){return this},e.AsyncIterator=L,e.async=function(t,r,n,a,o){void 0===o&&(o=Promise);var i=new L(u(t,r,n,a),o);return e.isGeneratorFunction(r)?i:i.next().then((function(e){return e.done?e.value:i.next()}))},k(_),c(_,s,"Generator"),_[o]=function(){return this},_.toString=function(){return"[object Generator]"},e.keys=function(e){var t=[];for(var r in e)t.push(r);return t.reverse(),function r(){while(t.length){var n=t.pop();if(n in e)return r.value=n,r.done=!1,r}return r.done=!0,r}},e.values=S,O.prototype={constructor:O,reset:function(e){if(this.prev=0,this.next=0,this.sent=this._sent=t,this.done=!1,this.delegate=null,this.method="next",this.arg=t,this.tryEntries.forEach(C),!e)for(var r in this)"t"===r.charAt(0)&&n.call(this,r)&&!isNaN(+r.slice(1))&&(this[r]=t)},stop:function(){this.done=!0;var e=this.tryEntries[0],t=e.completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(e){if(this.done)throw e;var r=this;function a(n,a){return s.type="throw",s.arg=e,r.next=n,a&&(r.method="next",r.arg=t),!!a}for(var o=this.tryEntries.length-1;o>=0;--o){var i=this.tryEntries[o],s=i.completion;if("root"===i.tryLoc)return a("end");if(i.tryLoc<=this.prev){var c=n.call(i,"catchLoc"),u=n.call(i,"finallyLoc");if(c&&u){if(this.prev<i.catchLoc)return a(i.catchLoc,!0);if(this.prev<i.finallyLoc)return a(i.finallyLoc)}else if(c){if(this.prev<i.catchLoc)return a(i.catchLoc,!0)}else{if(!u)throw new Error("try statement without catch or finally");if(this.prev<i.finallyLoc)return a(i.finallyLoc)}}}},abrupt:function(e,t){for(var r=this.tryEntries.length-1;r>=0;--r){var a=this.tryEntries[r];if(a.tryLoc<=this.prev&&n.call(a,"finallyLoc")&&this.prev<a.finallyLoc){var o=a;break}}o&&("break"===e||"continue"===e)&&o.tryLoc<=t&&t<=o.finallyLoc&&(o=null);var i=o?o.completion:{};return i.type=e,i.arg=t,o?(this.method="next",this.next=o.finallyLoc,m):this.complete(i)},complete:function(e,t){if("throw"===e.type)throw e.arg;return"break"===e.type||"continue"===e.type?this.next=e.arg:"return"===e.type?(this.rval=this.arg=e.arg,this.method="return",this.next="end"):"normal"===e.type&&t&&(this.next=t),m},finish:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.finallyLoc===e)return this.complete(r.completion,r.afterLoc),C(r),m}},catch:function(e){for(var t=this.tryEntries.length-1;t>=0;--t){var r=this.tryEntries[t];if(r.tryLoc===e){var n=r.completion;if("throw"===n.type){var a=n.arg;C(r)}return a}}throw new Error("illegal catch attempt")},delegateYield:function(e,r,n){return this.delegate={iterator:S(e),resultName:r,nextLoc:n},"next"===this.method&&(this.arg=t),m}},e}(e.exports);try{regeneratorRuntime=n}catch(a){Function("r","regeneratorRuntime = r")(n)}},"97cc":function(e,t,r){},9903:function(e,t,r){},b0c0:function(e,t,r){var n=r("83ab"),a=r("9bf2").f,o=Function.prototype,i=o.toString,s=/^\s*function ([^ (]*)/,c="name";n&&!(c in o)&&a(o,c,{configurable:!0,get:function(){try{return i.call(this).match(s)[1]}catch(e){return""}}})},bb51:function(e,t,r){"use strict";r.r(t);var n=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{attrs:{id:"chatroom"}},[r("new-group",{directives:[{name:"show",rawName:"v-show",value:e.showDialog,expression:"showDialog"}],attrs:{curuser:e.userinfo.username},on:{close:function(t){e.showDialog=!1},succeed:e.getGroups}}),e._m(0),r("main",[r("div",{attrs:{id:"menu"}},[r("div",[r("menu-item",{attrs:{src:"/assets/avatar/"+this.userinfo.avatar,width:"3em",title:e.userinfo.username}})],1),r("div",[r("menu-item",{attrs:{src:"/assets/message.png",width:"2em"}})],1),r("div",{on:{click:function(t){e.showDialog=!0}}},[r("menu-item",{attrs:{src:"/assets/add.png",width:"2em"}})],1),r("div",{on:{click:e.logout}},[r("menu-item",{attrs:{src:"/assets/logout.png",width:"2em"}})],1)]),r("div",{attrs:{id:"groups"}},e._l(e.groups,(function(t,n){return r("item-box",{key:"group-"+n,class:{"cur-group":e.curGroup==t.name},attrs:{name:t.name,icon:t.icon,gid:t.gid},on:{changeGroup:e.changeGroup}},[e._v(e._s(t))])})),1),r("div",{attrs:{id:"window"}},[r("div",{attrs:{id:"msg-list"}},e._l(e.messageList,(function(t,n){return r("message-box",{key:"msg-"+n,attrs:{icon:"/assets/avatar/"+t.avatar,name:t.sender,content:t.content,self:t.sender==e.userinfo.username}})})),1),r("div",{attrs:{id:"input-area"}},[r("textarea",{directives:[{name:"model",rawName:"v-model",value:e.message,expression:"message"}],domProps:{value:e.message},on:{input:function(t){t.target.composing||(e.message=t.target.value)}}}),r("button",{on:{click:e.postMessage}},[e._v("send")])])])])],1)},a=[function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("header",[r("div",[r("h1",[e._v("SummerChat")])]),r("div")])}];r("d3b7");function o(e,t,r,n,a,o,i){try{var s=e[o](i),c=s.value}catch(u){return void r(u)}s.done?t(c):Promise.resolve(c).then(n,a)}function i(e){return function(){var t=this,r=arguments;return new Promise((function(n,a){var i=e.apply(t,r);function s(e){o(i,n,a,s,c,"next",e)}function c(e){o(i,n,a,s,c,"throw",e)}s(void 0)}))}}r("96cf"),r("b0c0");var s=r("bc3a"),c=r.n(s),u=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"menu-item"},[r("img",{style:"width:"+e.width+";height:"+e.width+";",attrs:{src:e.src}})])},l=[],f={name:"MenuItem",props:{src:{type:String,default:"/assets/avatar/1.png"},width:{type:String,default:"2.5em"}},mounted:function(){}},p=f,d=(r("3253"),r("2877")),h=Object(d["a"])(p,u,l,!1,null,"3dee5cb9",null),m=h.exports,g=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"container",on:{click:e.clickHandler}},[r("div",{staticClass:"wrapper img"},[r("img",{attrs:{src:e.imgURL,alt:""}})]),r("div",{staticClass:"wrapper text"},[r("p",[e._v(e._s(e.name))])])])},v=[],w={name:"GroupInfo",props:{icon:{type:String,default:"1.png"},name:{type:String,default:"Group Chat"}},computed:{imgURL:function(){return"/assets/groups/".concat(this.icon)}},methods:{clickHandler:function(){this.$emit("changeGroup",this.name)}},mounted:function(){}},y=w,x=(r("8885"),Object(d["a"])(y,g,v,!1,null,"c226f7c0",null)),b=x.exports,_=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("form",{staticClass:"container dialog"},[r("h2",[e._v("New Chatroom")]),r("div",{staticClass:"row form-line"},[r("input",{directives:[{name:"model",rawName:"v-model",value:e.gid,expression:"gid"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Group name"},domProps:{value:e.gid},on:{input:function(t){t.target.composing||(e.gid=t.target.value)}}})]),r("p",[e._v("Select group members:（inlcude yourself）：")]),r("div",{staticClass:"row form-line users"},e._l(e.users,(function(t,n){return r("div",{key:"user-"+n,staticClass:"row col-lg-6"},[r("input",{directives:[{name:"model",rawName:"v-model",value:e.selectedUsers,expression:"selectedUsers"}],staticClass:"col-lg-1",attrs:{type:"checkbox",id:"user-"+n},domProps:{value:t.name,checked:Array.isArray(e.selectedUsers)?e._i(e.selectedUsers,t.name)>-1:e.selectedUsers},on:{change:function(r){var n=e.selectedUsers,a=r.target,o=!!a.checked;if(Array.isArray(n)){var i=t.name,s=e._i(n,i);a.checked?s<0&&(e.selectedUsers=n.concat([i])):s>-1&&(e.selectedUsers=n.slice(0,s).concat(n.slice(s+1)))}else e.selectedUsers=o}}}),r("label",{staticClass:"col-lg-11",attrs:{for:"user-"+n}},[r("item-box",{attrs:{icon:t.avatar,name:t.name}})],1)])})),0),r("div",{staticClass:"row form-line"},[r("button",{staticClass:"btn btn-success",on:{click:function(t){return t.preventDefault(),e.newGroup(t)}}},[e._v("create")])]),r("div",{staticClass:"row form-line"},[r("button",{staticClass:"btn btn-danger",on:{click:function(t){return t.preventDefault(),e.done(t)}}},[e._v("close")])])])},k=[],L={name:"NewGroup",props:{curuser:{type:String,required:!0}},components:{ItemBox:b},data:function(){return{gid:"",users:[],selectedUsers:[]}},methods:{done:function(){this.$emit("close"),this.$emit("succeed")},getUsers:function(){var e=this;return i(regeneratorRuntime.mark((function t(){var r;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,c.a.get("/index.php?action=get-users");case 2:r=t.sent,e.users=r.data.data;case 4:case"end":return t.stop()}}),t)})))()},newGroup:function(){var e=this;return i(regeneratorRuntime.mark((function t(){var r,n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return r={gid:e.gid,members:e.selectedUsers},t.next=3,c.a.post("/index.php?action=new-group",r);case 3:n=t.sent,0==n.data.code?(alert("创建成功！"),e.done()):alert(n.data.msg);case 5:case"end":return t.stop()}}),t)})))()}},mounted:function(){this.getUsers()}},E=L,G=(r("0329"),Object(d["a"])(E,_,k,!1,null,"69dfebdb",null)),R=G.exports,C=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{staticClass:"msg-container",class:{self:e.self}},[r("div",{staticClass:"avatar-wrapper"},[r("img",{attrs:{src:e.icon}})]),r("div",[r("div",{staticClass:"id-wrapper"},[r("p",{class:{"self-id":e.self}},[e._v(e._s(e.name))])]),r("div",{staticClass:"content-wrapper",class:{self:e.self}},[r("p",[e._v(e._s(e.content))])])]),r("div",{staticClass:"blank-wrapper"})])},O=[],S={name:"MessageBox",props:{icon:{type:String,required:!0},name:{type:String,required:!0},content:{type:String,required:!0},self:{type:Boolean,default:!1}}},j=S,N=(r("9318"),Object(d["a"])(j,C,O,!1,null,"66ce89db",null)),U=N.exports,P=document.createElement("audio");function $(){P.play()}P.src="/assets/ding.mp3";var M={play:$},I={name:"Home",components:{ItemBox:b,MenuItem:m,NewGroup:R,MessageBox:U},data:function(){return{userinfo:{username:"",avatar:"1.png"},groups:{},messageList:[],message:"",showDialog:!1}},methods:{getGroups:function(){var e=this;return i(regeneratorRuntime.mark((function t(){var r;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,c.a.post("/index.php?action=get-groups",{user:e.userinfo.username});case 2:r=t.sent,0==r.data.code&&(e.groups=r.data.data,e.curGroup=e.curGroup||e.groups[0].name);case 4:case"end":return t.stop()}}),t)})))()},changeGroup:function(e){var t=this;return i(regeneratorRuntime.mark((function r(){return regeneratorRuntime.wrap((function(r){while(1)switch(r.prev=r.next){case 0:t.curGroup=e,t.messageList=[],t.getMsgRecord();case 3:case"end":return r.stop()}}),r)})))()},getMsgRecord:function(){var e=this;return i(regeneratorRuntime.mark((function t(){var r,n,a,o;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,c.a.post("/index.php?action=get-records",{gid:e.curGroup});case 2:r=t.sent,n=r.data.data,a=n.length?n[n.length-1].sender:"",o=e.userinfo.username,e.messageList.length&&a!=o&&e.messageList.length!=n.length&&M.play(),e.messageList=n;case 8:case"end":return t.stop()}}),t)})))()},logout:function(){return i(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,c.a.get("/index.php?action=logout");case 2:location.reload();case 3:case"end":return e.stop()}}),e)})))()},postMessage:function(){var e=this;return i(regeneratorRuntime.mark((function t(){var r,n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(e.message){t.next=2;break}return t.abrupt("return");case 2:return r={sender:e.userinfo.username,content:e.message,gid:e.curGroup},t.next=5,c.a.post("/index.php?action=post-message",r);case 5:n=t.sent,1==n.data.code?alert("failed to send message\n".concat(n.data.msg)):(e.message="",e.getMsgRecord());case 7:case"end":return t.stop()}}),t)})))()},update:function(){var e=this;return i(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(!e.userinfo.username){t.next=4;break}return t.next=3,e.getGroups();case 3:e.getMsgRecord();case 4:case"end":return t.stop()}}),t)})))()}},mounted:function(){var e=this;return i(regeneratorRuntime.mark((function t(){var r,n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,c.a.get("/index.php?action=get-status");case 2:if(r=t.sent,0==r.data.code){t.next=7;break}return alert(r.data.msg),e.$router.push("/login"),t.abrupt("return");case 7:for(n in r.data.data)e.$set(e.userinfo,n,r.data.data[n]);setInterval(e.update,1e3);case 9:case"end":return t.stop()}}),t)})))()}},D=I,F=(r("5d88"),Object(d["a"])(D,n,a,!1,null,"4ca95b46",null));t["default"]=F.exports},c0e8:function(e,t,r){},c9e5:function(e,t,r){}}]);
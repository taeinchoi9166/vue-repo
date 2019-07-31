<template>
  <div>
    <h1>컴포넌트 리스트</h1>
    <div class="list">
      <transition-group name="items" tag="div">
        <Child :key="item.id" :data="item" @changeMode="changeMode(item.id)"  v-for="item in list" @del="del(item.id)"></Child>
      </transition-group>
    </div>
    <div @keyup.ctrl.enter="inputForm" class="myForm">
      <input type="text" v-model="title">
      <textarea name="" id="" cols="30" rows="10" v-model="content" ></textarea>
      <template v-if="formMode == 'input'">
        <button @click="inputForm">입력</button>
      </template>
      <template v-if="formMode == 'modi'">
        <button @click="modi(modiId,title,content)">수정</button>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
        list:[
            {id:1,title:'자연을 위하여', desc:'contente'},
            {id:2,title:'자연이 그대를 거부하리라', desc:'contentsd'},
            {id:3,title:'음, 잘했네',desc:'내뇽ㅇ어어'}
        ],
        title:'',
        content:'',
        nextId:4,
        modiId:0,
        formMode:'input'
    }
  },
    methods:{
        inputForm(){
            if(this.title.trim().length > 0 && this.content.trim().length > 0){
                this.list.push({id:this.nextId,title:this.title,desc:this.content});
                this.nextId++;
            }else{
                alert('아이고! 입력 창 중 하나가 빈거 같네요!');
            }
        },
        changeMode(id){
            this.formMode = 'modi';
            this.modiId = id;
            console.log(id);
            let index =  this.list.findIndex(item => item.id == id);
            this.title = this.list[index].title;
            this.content = this.list[index].desc;
        },
        del(id){
            console.log(id);
            let index =  this.list.findIndex(item => item.id == id);
            this.list.splice(index,1);

            if(this.modiId === id) this.changeToInput()
        },
        modi(id,title,content){
            console.log('modi')
            let index =  this.list.findIndex(item => item.id == id);
            this.list[index].title = title;
            this.list[index].desc = content;

            this.changeToInput()
        },
        changeToInput(){
            this.modiId = 0;
            this.title = "";
            this.content = "";
            this.formMode = "input"
        }

    }
}
</script>

<style>

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}

.items-enter, .items-leave-to{
  opacity: 0;
}
.items-active-enter, .items-active-leave{
  transition:all 0.5s;
  transform: translateX(-200px);
}

.items-leave-active{
  position: absolute;
}

.items-move{
  transition: 0.4s;
}

.myForm{
  width:600px;
  height:50px;
  margin:10px;
}
.myForm > *{
  float:left;
}
.myForm input, .myForm textarea{
  width:40%;
  height:100%;
  resize:none;
  border: none;
  background: #eee;
  margin-right:5%;
  font-size:1.5rem;
}
.myForm > button{
  width:10%;
  height: 100%;
  background: #333;
  color:#eee;
  border-radius: 10px;
  border: none;
}
</style>

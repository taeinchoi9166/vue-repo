
<template>
  <div class="todo">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="row">
          <div class="col">
            <h2>할 일 리스트</h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="할일입력" v-model="content">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="add">추가</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <transition-group tag="ul" name="todos" class="list-group">
              <li class="list-group-item" v-for="(item,index) in list" :key="index">
                <span class="name">{{item.name}}</span>
                <span class="badge badge-primary">{{item.date.toLocaleDateString()}}</span>
                <div class="btn-group float-right">
                  <button type="button" class="btn btn-sm btn-outline-info" @click="done(item.id)">완료하기</button>
                  <button type="button" class="btn btn-sm btn-outline-danger" @click="del(item.id)">삭제</button>
                </div>
              </li>
            </transition-group>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col">
            <h2>Complete List</h2>
            <ul class="list-group">
              <li class="list-group-item" v-for="item in completeList">
                <span class="name">{{item.name}}</span>
                <span class="badge badge-success">{{item.date.toLocaleDateString()}}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "todoCompo",
        mounted(){
          // fetch('http://localhost/read.php').then(resp => resp.json()).then(data =>{
          //     console.log(this.$http);
          //     this.list = data.map(x => {
          //         x.date = new Date(x.date);
          //         return x;
          //     });
          // })
            this.$http.get('http://localhost/read.php')
                .then(resp =>{
                    this.list = resp.data.map(x => {
                        x.date = new Date(x.date);
                        return x;
                    });
                })
        },
        data(){
            return {
                list:[
                    // {id:1,name:'청소하기',date:new Date('2019-08-01')},
                    // {id:2,name:'청소하기2',date:new Date('2019-08-03')},
                    // {id:3,name:'청소하기3',date:new Date('2019-08-04')},
                    // {id:4,name:'청소하기4',date:new Date('2019-08-07')},

                ],
                completeList:[

                ],
                content:'',
                nextId:5
            };
        },
        methods:{
            del(id){
                let idx = this.list.findIndex(item => item.id === id);
                this.list.splice(idx,1);
            },
            add(){
                if(this.content.trim() === ""){
                    alert('무언가를 입력하세요!');
                    return;
                }
                this.list.push({id:this.nextId++,name:this.content,date:new Date()});
                // alert('등록 성공!');
                // this.$router.push('/');

                let form = new FormData();
                form.append('todo', this.content);

                this.$http.post('http://localhost/post.php',form).then(res => {
                    console.log(res.data);
                })
            },
            done(id){
                let item = this.list.find(x => x.id === id);
                this.completeList.push(item);
                this.del(id);
            }
        }
    }
</script>

<style scoped>
  .todos-enter, .todos-leave-to{
    opacity: 0;
    transform: translateX(100px);
  }
  .todos-enter-active{
    /*position: absolute;*/
    transition: 1.6s;

  }
  .todos-leave-active{
    transition: 1.6s;
  }
  .todos-move{
    transition: 1.6s;
  }
</style>

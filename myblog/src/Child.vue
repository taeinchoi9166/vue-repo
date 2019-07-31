<template>
  <div class="item px-2 py-1">
    <h1 class="title">{{data.title}}</h1>
    <p class="desc">{{data.desc}}</p>
    <div class="text-right mb-2">
      <button @click="changeMode" class="btn btn-warning">수정!</button>
      <button @click="del" class="btn btn-danger">삭제!</button>
    </div>
  </div>
</template>

<script>
    export default {
        name: "Child",
        props:['data'],
        methods:{
            del(){
                this.$emit('del')
            },
            modi(){
              this.$emit('modi')
            },
            changeMode(){
                this.$emit('changeMode')
            }
        }
    }
</script>

<style scoped>
  .item{
    height:180px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 0.5rem;
  }

  .item > .title{
    font-size: 30px;
    color:rgba(0,0,255,0.8);
  }

  .item > .desc{
    margin-top:10px;
    color:#777;
  }

  /*.item   button{*/
  /*  width:80px;*/
  /*  height:30px;*/
  /*  color:#fff;*/
  /*  margin-left:20px;*/
  /*  background: #333;*/
  /*  border:none;*/

  /*}*/
</style>

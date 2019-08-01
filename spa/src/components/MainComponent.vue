<template>
  <div class="jumbotron">
    <h1 class="display-4">Hello Vue.js Todo App</h1>
    <p class="lead">웰컴 투 양영 방과후!!!</p>
    <hr class="my-4">
    <p>으아아아아아아 나를 살려줘</p>
    <p class="lead">
      <router-link to="/todo" class="btn btn-primary" tag="button">일정보기</router-link>
    </p>
  </div>
</template>

<script>
    export default {
        name: "mainCompo",
        data(){
          return{

          }
        }
    }
</script>

<style scoped>

</style>

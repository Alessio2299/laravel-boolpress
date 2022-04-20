<template>
  <div class="main">
    <div class="container">
      <h1>Welcome at my Blog</h1>
    </div>
  </div>
</template>

<script>
  export default {
    name : 'Home',
  }
</script>

<style lang="scss" scoped>
  .main{
    height: calc(100vh - 87px - 74.55px);
    display: flex;
    text-align: center;
    align-items: center;
    background-color: gray;
    width: 100%;
    background-image: url('https://images.unsplash.com/photo-1500622944204-b135684e99fd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2922&q=80');
    background-position: center;
    background-size: cover;
    h1{
      font-size: 50px;
      color: #fff;
      text-transform: uppercase;
      font-family: cursive;
    }
  }
</style>>

<template>
  <div class="container">
    <h1>SinglePost</h1>
    <span>This Post is: {{$route.params.slug}}</span>
  </div>
</template>

<script>
  export default {
    name : 'SinglePost',
  }
</script>

<style>

</style>
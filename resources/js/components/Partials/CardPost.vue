<template>
  <div class="col-6 mx-auto">
    <div class="card mb-4">
      <div class="card-body">
        <div class="mb-3">
          <div>
            <h1 class="my_title">{{title}}</h1>
            <div v-if="category" class="text-muted small">Category: {{category.name}}</div>
            <div class="text-muted small">{{updated}}</div>
          </div>
        </div>
        <p>{{description}}</p>
        <img :src="url" class="my_img">
        <div v-if="tags">
          <span class="btn btn-primary mr-2 mt-3" v-for="tag in tags" :key="tag.id">{{tag.name}}</span>
        </div>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name : 'CardPost',
    props:{
      title: String,
      category: Object,
      description: String,
      url: String,
      updated: String,
      tags: Array
    }
  }
</script>

<style  lang="scss" scoped>
  .my_title{
    font-weight: bold;
  }
  .my_img{
    width: 100%;
  }
</style>
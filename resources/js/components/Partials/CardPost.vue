<template>
  <div class="my_card">
    <div class="card mb-4">
      <div class="card-body">
        <div class="mb-3">
          <div class="section-title">
            <h1 class="my_title">{{title}}</h1>
            <div v-if="category" class="text-muted small">Category: {{category.name}}</div>
            <div class="text-muted small">{{updated}}</div>
          </div>
        </div>
        <p>{{description}}</p>
        <div class="image">
          <img :src="image" class="my_img">
        </div>
        <div class="tags" v-if="tags">
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
      image: String,
      updated: String,
      tags: Array
    }
  }
</script>

<style  lang="scss" scoped>

  .my_card{
    height: 700px;
    position: relative;
    .card{
      height: 100%;
      .card-body{
        height: 100%;
        .tags{
          position: absolute;
          bottom: 50px;
        }
      }
    }
  }
  .my_title{
    font-weight: bold;
    text-transform: uppercase;
  }
  .image{
    display: flex;
    .my_img{
      width: 300px;
      height: 250px;
      object-fit: contain;
    }
  }
</style>
<template>
  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3">
              <div>
                <h1 class="my_title">{{post.title}}</h1>
                <div class="text-muted small">Category: {{post.category.name}}</div>
                <div class="text-muted small">{{post.updated_at}}</div>
              </div>
            </div>
            <p>{{post.description}}</p>
            <img :src="post.url" class="my_img">
            <span class="btn btn-primary mr-2 mt-3" v-for="tag in post.tags" :key="tag.id">{{tag.name}}</span>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name : 'SinglePost',
    data(){
      return{
        post: null
      }
    },
    methods:{
      getPost(){
        const urlSlug = this.$route.params.slug
        axios.get('/api/posts/' + urlSlug)
        .then(response =>{
          if(response.data.success == false){
            this.$router.push({name: 'home'});
          } else{
            this.post = response.data.response;
          }
        })
      }
    },
    mounted(){
      this.getPost();
    }
  }
</script>

<style lang="scss" scoped>
  .my_title{
    font-weight: bold;
  }
  .my_img{
    width: 100%;
  }
</style>
<template>
  <div class="container pt-3">
    <div class="row">
      <Card
        v-if="flag"
        :title="post.title"
        :category="post.category"
        :description="post.description"
        :image="post.image"
        :updated="dayCreatedPost(post.updated_at)"
        :tags="post.tags"
      />
      <div class="relatedPosts py-3">
        <h3 class="d-inline-block">If you like this post, perhaps this could also be interested in:</h3>
        <div class="d-inline-block" v-for="recommendedPost in recommendedPosts" :key="recommendedPost.id">
          <a class="ml-3 h3 text-decoration-none" :href="recommendedPost.slug">{{recommendedPost.title}}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Card from '../components/Partials/CardPost.vue'
  export default {
    name : 'SinglePost',
    data(){
      return{
        post: null,
        relatedPosts: null,
        flag: false,
        recommendedPosts: [],
      }
    },
    components:{
      Card
    },
    methods:{
      dayCreatedPost(text){
        return text.split('').slice('0','10').join('').split('-').reverse().join('-')
      },
      getPost(){
        const urlSlug = this.$route.params.slug
        axios.get('/api/posts/' + urlSlug)
        .then(response =>{
          if(response.data.success == false){
            this.$router.push({name: 'page-error'});
          } else{
            this.post = response.data.response;
            this.flag = true;
            this.getRelatedPost();
          }
        })
      },
      getRelatedPost(){
        const urlId = this.post.category_id
        axios.get('/api/category/' + urlId)
        .then(response =>{
          this.relatedPosts = response.data.response;
          if(this.relatedPosts){
            for(let i = 0; i < this.relatedPosts.length; i++){
              if(this.relatedPosts[i].slug != this.post.slug){
                this.recommendedPosts.push(this.relatedPosts[i]);
              }
            }
          }
        })
      }
    },
    mounted(){
      this.getPost();
    },
    updated(){
    }
  }
</script>

<style>
  
</style>
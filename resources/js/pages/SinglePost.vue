<template>
  <div class="container">
    <Card 
      :title="post.title"
      :category="post.category"
      :description="post.description"
      :url="post.url"
      :updated="dayCreatedPost(post.updated_at)"
      :tags="post.tags"
    />
  </div>
</template>

<script>
  import Card from '../components/Partials/CardPost.vue'
  export default {
    name : 'SinglePost',
    data(){
      return{
        post: null
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
          }
        })
      }
    },
    mounted(){
      this.getPost();
    }
  }
</script>

<style>
  
</style>
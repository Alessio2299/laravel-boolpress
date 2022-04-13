<template>
  <div class="container">
    <div class="row">
      <router-link  v-for="post in posts" :key="post.id" class=" nav-link text-dark" :to="{name: 'singlePost', params:{slug: post.slug}}">
        <Card 
        :title="post.title"
        :category="post.category"
        :description="post.description"
        :url="post.url"
        :updated="dayCreatedPost(post.updated_at)"
        :tags="post.tags"
        />
      </router-link>
    </div>
    <div class="text-center">
      <span @click="currentPage--, getPost(currentPage)" class="mx-3 btn btn-primary btn-lg" :class="currentPage <= 1 ? 'd-none' : ''">Prev</span>
      <span @click="currentPage++, getPost(currentPage)" class="mx-2 btn btn-primary btn-lg" :class="currentPage == totalPage ? 'd-none' : ''">Next</span>
    </div>
  </div>
</template>

<script>
  import Card from '../components/Partials/CardPost.vue'
  export default {
    name : 'Posts',
    data(){
      return{
        posts : null,
        currentPage: 1,
        totalPage: '',
      }
    },
    components:{
      Card
    },
    methods:{
      dayCreatedPost(text){
        return text.split('').slice('0','10').join('').split('-').reverse().join('-')
      },
      sliceDescription(text){
        if(text.length < 80)
          return text
        else{
          let word = text.split('').slice(0,80).join('').split(' ');
          return word.slice(0, word.length - 1).join(' ') + '...';
        }
      },
      getPost(pageApi){
        axios.get('/api/posts', {
          'params' : {
            'page' : pageApi
          }
        }).then(response =>{
          this.posts = response.data.response.data;
          this.totalPage = response.data.response.last_page;
        })
      }
    },
    created(){
      this.getPost(this.currentPage);
    }
  }
</script>

<style lang="scss" scoped>
  .my_card{
    min-height: 200px;
  }
</style>
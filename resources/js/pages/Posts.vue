<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-6" v-for="post in posts" :key="post.id">
          <router-link  class="nav-link" :to="{name: 'singlePost', params:{slug: post.slug}}">
            <div class="my_card card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img class="w-100 p-3" :src="post.url" :alt="post.tilte">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">{{post.description}}</p>
                    <div class="category">
                        <span><strong>Category: </strong>{{post.category != null ? post.category.name : 'None'}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </router-link>
        </div>
      </div>
      <div class="text-center">
        <span @click="currentPage--, getPost(currentPage)" class="mx-3 btn btn-primary btn-lg" :class="currentPage <= 1 ? 'd-none' : ''">Prev</span>
        <span @click="currentPage++, getPost(currentPage)" class="mx-2 btn btn-primary btn-lg" :class="currentPage == totalPage ? 'd-none' : ''">Next</span>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name : 'Posts',
    data(){
      return{
        posts : null,
        currentPage: 1,
        totalPage: '',
      }
    },
    methods:{
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
    min-height: 300px;
  }
</style>
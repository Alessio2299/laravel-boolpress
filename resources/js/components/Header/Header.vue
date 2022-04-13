<template>
  <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
      <div class="container">
        <router-link class="nav-link" :to="{name : 'home'}"><h2>Boolpress</h2></router-link>

        <div class="collapse navbar-collapse justify-content-between" id="navbarButtonsExample">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ml-5" v-for="(link,index) in navLink" :key="index">
              <router-link class="nav-link" :to="{name : link.urlName}">{{link.name}}</router-link>
            </li>
          </ul>

          <div class="navbar-nav d-flex align-items-center justify-content-end">
            <a href="/admin" class="nav-link">
              Admin
            </a>
            <a class="btn btn-dark px-3" target="_blank" href="https://github.com/Alessio2299"><i class="fab fa-github"></i></a>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
  export default {
    name : 'Header',
    data(){
      return{
        navLink: [
          {
            urlName: 'posts',
            name: 'Posts'
          },
          {
            urlName: 'contacts',
            name: 'Contacts'
          },
          {
            urlName: 'about',
            name: 'About'
          }
        ]
      }
    }
  }
</script>

<style>

</style>
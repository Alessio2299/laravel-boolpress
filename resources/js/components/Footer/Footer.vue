<template>
  <footer class="bg-dark">
    <div class="footer-distributed">
      <div class="footer-right">
        <a target="_blank" href="https://github.com/Alessio2299"><i class="fab fa-github"></i></a>
      </div>
      <div class="footer-left">
        <p class="footer-links">
          <router-link class="nav-link" v-for="(link,index) in navLink" :key="index" :to="{name : link.urlName}">
            {{link.name}}
          </router-link>
        </p>
        <p class="ml-3">Alessio Napoli 2022</p>
      </div>
    </div>
  </footer>
</template>

<script>
  export default {
    name : 'Footer',
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

<style lang="scss" scoped>

  footer {
    width: 100%;
    display: inline-block;
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    text-decoration: underline;
    .footer-distributed {
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
      box-sizing: border-box;
      width: 85%;
      margin: auto;
      text-align: left;
      font: normal 16px sans-serif;
      padding: 15px 50px;
      .footer-left p {
        color: #8f9296;
        font-size: 14px;
        margin: 0;
      }
      .footer-links {
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
        margin: 0 0 10px;
        padding: 0;
        transition: ease .25s;
        a {
          display: inline-block;
          line-height: 1.8;
          text-decoration: none;
          color: inherit;
          transition: ease .25s;
        }
      }
      .footer-right {
        float: right;
        margin-top: 6px;
        max-width: 180px;
        a {
          display: inline-block;
          width: 35px;
          height: 35px;
          background-color: #33383b;
          border-radius: 2px;
          font-size: 20px;
          color: #ffffff;
          text-align: center;
          line-height: 35px;
          margin-left: 3px;
          transition:all .25s;
        }
        .footer-right a:hover{
          transform:scale(1.1);
        }
        .footer-links a:hover{
          text-decoration:underline;
        }
      }
      @media (max-width: 600px) {
        .footer-left, .footer-right {
          text-align: center;
        }
        .footer-right {
          float: none;
          margin: 0 auto 20px;
        }
        .footer-left .footer-links {
          line-height: 1.8;
        }
      }
    }
  }
</style>>


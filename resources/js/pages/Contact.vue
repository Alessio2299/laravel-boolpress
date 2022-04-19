<template>
  <div class="container">
    <h1>Contact to</h1>
    <form @submit.prevent="sendMail()">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" v-model="name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" v-model="email">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea name="message" class="form-control" cols="30" rows="10" v-model="message"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
</template>

<script>
  export default {
    name : 'Contact',
    data(){
      return{
        name: '',
        email: '',
        message: ''
      }
    },
    methods:{
      sendMail(){
        axios.post('/api/contacts', {
          'name': this.name,
          'email': this.email,
          'message': this.message
        })
        .then(resp => {
          console.log(resp)
        })
      }
    }
  }
</script>

<style>

</style>
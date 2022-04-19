<template>
  <div class="container mb-5">
    <h1>Contact us</h1>
    <form @submit.prevent="sendMail()">
      <div v-if='sentSuccessfully' class="alert alert-success" role="alert">
        Email sent successfully
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" :class="errors.name ? 'is-invalid' : ''" id="exampleInputEmail1" name="name" v-model="name">
        <p v-for="(error, index) in errors.name" :key="'error-name' + index" class="invalid-feedback">
          {{error}}
        </p>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" :class="errors.email ? 'is-invalid' : ''" id="exampleInputEmail1" name="email" v-model="email">
        <p v-for="(error, index) in errors.email" :key="'error-email' + index" class="invalid-feedback">
          {{error}}
        </p>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea name="message" class="form-control" :class="errors.message ? 'is-invalid' : ''" cols="30" rows="10" v-model="message"></textarea>
        <p v-for="(error, index) in errors.message" :key="'error-message' + index" class="invalid-feedback">
          {{error}}
        </p>
      </div>
      <button type="submit" class="btn btn-primary">{{send ? 'Send in progress..' : 'Send'}}</button>
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
        message: '',
        errors: {},
        send: false,
        sentSuccessfully: false
      }
    },
    methods:{
      sendMail(){
        this.send = true
        axios.post('/api/contacts', {
          'name': this.name,
          'email': this.email,
          'message': this.message
        })
        .then(resp => {
          if(!resp.data.success){
            this.errors = resp.data.errors;
          } else{
            this.send = false;
            this.errors = {};
            this.name = '';
            this.email = '';
            this.message = '';
            this.sentSuccessfully = true;
          }
        })
      }
    }
  }
</script>

<style>

</style>
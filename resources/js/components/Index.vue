<template>
  <div class="container">
    <div class="d-flex justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li  class="nav-item">
                <router-link :to="{name: 'home.index'}" class="nav-link fs-5 fw-bold">Задание</router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{name: 'demoshow.index'}" class="nav-link fs-5 fw-bold">Демо#1</router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{name: 'demotypeshow.index'}" class="nav-link fs-5 fw-bold">Демо#2</router-link>
              </li>
              <li class="nav-item ms-5">
                <router-link v-if="token" :to="{name: 'demoadmin.index'}" class="nav-link fs-5 fw-bold">Админ</router-link>
              </li>
              <li class="nav-item ms-5 mt-2" v-if="token">
                  <img :src="imgPath + 'avatar.png'"
                                width="24"
                                height="24"
                                alt="avatar">
              </li>
              <li v-if="token" class="nav-item mt-2 pt-1 ms-3">
                {{ manager }}
              </li>
              <li class="nav-item ms-2 mt-2">
                <div class="dropdown" v-if="token">
                  <a class="btn btn-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                  </a>
                  <ul class="dropdown-menu" style="border:0;background-color:transparent;">
                    <li>
                      <a @click.prevent="logout" v-if="token" href="#" class="dropdown-item nav-link rounded" style="width:60px;">Выйти</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
            
          </div>
      </nav>
    </div>

    <div class="justify-content-center">
        <div class="">
            <div class="">
                <router-view></router-view>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

    export default {
        name: 'Index',
        data() {
            return {
                imgPath: 'images/',
                manager: '',
                token: null,// key for displaing nav menu items
                isLogged: false // check if user logged
            }
        },
        methods: {
          getToken(){
            // get token from local storage
            this.token = localStorage.getItem('x_xsrf_token')
            // prevent send request every update page
            // send request if token=true and in the first time
            if ( this.token && this.isLogged == false ) { 
              this.isLogged = true // visit one time after login
                axios.get('/public/api/manager')
                  .then(response=>{
                      //console.log('manager: ' + response.data.manager)
                      this.manager = response.data.manager
                  })
                  .catch(err => {
                      console.log(err.response)
                  })
            }
            
          },
          logout() {
            // clearing isLogged
            this.isLogged = false
            axios.post('/public/logout')
              .then(res => {
                // remove token from storage
                localStorage.removeItem('x_xsrf_token')
                this.manager = ''
                this.$router.push({name:'user.login'})
                
              })
              .catch( error => {
                console.log('res >>> '+ error.data)
              })
          },
        },
        mounted() {
          this.getToken()
        },
        // refresh nav link if token changes
        updated(){ 
          this.getToken()
        },
        watch: {
        }
    }
</script>

<style>
  .router-link-active,
  .router-link-exact-active {
    font-weight: 900;
    cursor: pointer;
  }
</style>

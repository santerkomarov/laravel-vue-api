<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <h1 class="text-center">Регистрация</h1>
                <div class="p-3" style="max-width:400px;">
                    <a class="d-block mb-4 "> 
                            <router-link :to="{name: 'user.login'}" class="fw-bold text-secondary" style="font-size:18px;">Вход</router-link>
                        </a>
                    <div class="form-group mb-4">
                        <label for="exampleInputEmail1">Имя</label>
                        <input v-model="register.name" type="text" class="form-control" id="name"  placeholder="Имя">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputEmail1" class="mb-2">Email</label>
                        <input v-model="register.email" type="email" class="form-control" id="exampleInputEmail1"  placeholder="Введите email" autocomplete="on">
                    </div>
                    <div class="form-group mb-4">
                        <label for="exampleInputPassword1" class="mb-2">Пароль</label>
                        <input v-model="register.password" type="password" class="form-control mb-2" id="exampleInputPassword1" placeholder="Пароль">
                    </div>
                    <div class="form-group mb-4">
                        <label for="confirm-password" class="mb-2">Подтвердите пароль</label>
                        <input v-model="register.password_confirmation" type="password" class="form-control mb-2" id="confirm-password" placeholder="Подтвердите пароль">
                    </div>
                    
                    <button @click.prevent="registration" type="submit" class="btn btn-secondary">Регистрация</button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'Login',
        data() {
            return {
                register: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                
                token: ''
            }
        },
        methods: {

            login() {
                axios.post('/public/api/register', this.register)
                    .then(r => {
                        this.token = r.data.token
                        axios.defaults.headers.common['Authorization'] = 'Bearer ' + r.data.token;
                        localStorage.setItem( 'token', this.token )
                    })
                    .catch(err => console.log(err.response));
            },
            registration() {
                axios.get('/public/sanctum/csrf-cookie')
                    .then(response => {
                        // send generated cookies in default route "/login" with form data
                        axios.post('/public/register', this.register)
                            .then(response => {
                                // geting cookies from config->headers(X-XSRF-TOKEN)
                                let token = response.config.headers['X-XSRF-TOKEN']
                                // pass it to localStorage
                                localStorage.setItem('x_xsrf_token', token)
                                // redirect to admin page
                                this.$router.push({name:'demoadmin.index'})
                            })
                    .catch(err => console.log(err.response.data))
                    })
                    .catch(err => console.log(err.response))
            }
        }
    }
</script>
<template>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <h1 class="text-center">Войти</h1>
            <div class="p-3" style="max-width:400px;">
                <a class="d-block mb-4 "> 
                    <router-link :to="{name: 'user.registration'}" class="fw-bold text-secondary" style="font-size:18px;">Регистрация</router-link>
                </a>
            
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1" class="mb-2">Email</label>
                    <input v-model="email" type="email" class="form-control" id="exampleInputEmail1"  placeholder="Email: a@mail.ru" autocomplete="on">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputPassword1" class="mb-2">Пароль</label>
                    <input v-model="password" type="password" class="form-control mb-2" id="exampleInputPassword1" placeholder="Пароль: 123123123">
                </div>
                <div v-if="isError" class="bg-danger text-white mb-3 p-3 rounded">
                        {{ error }}
                </div>
                
                <button @click.prevent="loginAdmin" type="submit" class="btn btn-secondary mb-5">Войти</button>
                <!-- <div>
                    <span>default email:</span><br>
                    <span>default password:</span>

                </div> -->
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'Login',
        data() {
            return {
                email: null,
                password: null,
                token: '',
                error: '', // content of error
                isError: false // show/hide div
            }
        },
        methods: {

            login() {
                axios.post('/public/api/login', {email: this.email, password: this.password})
                    .then(r => {
                        this.token = r.data.token
                        axios.defaults.headers.common['Authorization'] = 'Bearer ' + r.data.token;
                        localStorage.setItem( 'token', this.token )
                    })
                    .catch(err => console.log(err.response));
            },
            loginAdmin() {
                // remove error message
                this.isError = false
                axios.get('/public/sanctum/csrf-cookie')
                    .then(response => {
                        // send generated cookies in default route "/login" with form data
                        //! in routes method have to GET !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                        axios.post('/public/login', { email: this.email, password: this.password })
                            .then(response => {
                                // geting cookies from config->headers(X-XSRF-TOKEN)
                                let token = response.config.headers['X-XSRF-TOKEN']
                                // pass it to localStorage
                                localStorage.setItem('x_xsrf_token', token)
                                // redirect to admin page
                                this.$router.push({name:'demoadmin.index'})
                            })
                            .catch(err => {
                                console.log(err.response.data)
                                this.isError = true
                                this.error = err.response.data.message
                            })
                    })
                    .catch(err => console.log(err.response))
            }
        }
    }
</script>
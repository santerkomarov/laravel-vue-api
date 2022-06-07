const { default: router } = require('./router');

window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.withCredentials = true;

window.axios.interceptors.response.use = ({},error => { // intercept errors 401 or 419
    
    if ( error.respnse.status == 401 || error.respnse.status == 419 ) {
        const token = localStorage.getItem('x_xsrf_token')
        if ( token ) {
            localStorage.removeItem('x_xsrf_token')
        }
        router.push({ name: "user.login"})
    } 

});

import Vue from 'vue';
import VueRouter from 'vue-router';
import hljs from 'highlight.js'
import Task from './components/Task.vue';
import Login from './components/Login.vue';
import Registration from './components/Registration.vue';
import DemoAdmin from './components/DemoAdmin.vue';
import DemoShow from './components/DemoShow.vue';
import DemoTypeShow from './components/DemoTypeShow.vue';



Vue.use(VueRouter, hljs);

Vue.directive('highlightjs', {
   deep: true,
   bind: function (el, binding) {
     // on first bind, highlight all targets
      let targets = el.querySelectorAll('code')
      targets.forEach((target) => {
         // if a value is directly assigned to the directive, use this
         // instead of the element content.
         if (binding.value) {
            target.innerHTML = binding.value
         }
         hljs.highlightBlock(target)
      })
   },
   componentUpdated: function (el, binding) {
      // after an update, re-fill the content and then highlight
      let targets = el.querySelectorAll('code')
      targets.forEach((target) => {
         if (binding.value) {
            target.innerHTML = binding.value
            hljs.highlightBlock(target)
         }
      })
   }
})


//init Router and define some routes
//export default new VueRouter({
const router = new VueRouter({
   mode:'history',
   routes: [
      {
         // path: '/get', component: () => import('./components/Get'),
         path: '/public/home', component: Task, 
         name: 'home.index',
      },
      {
         path: '/public/demoadmin', component: DemoAdmin,
         name: 'demoadmin.index',
      },
      {
         path: '/public/demo', component: DemoShow,
         name: 'demoshow.index',
      },
      {
         path: '/public/demotype', component: DemoTypeShow,
         name: 'demotypeshow.index',
      },
      {
         path: '/public/user/login', component: Login,
         name: 'user.login',
      },
      {
         path: '/public/user/registration', component: Registration,
         name: 'user.registration',
      },
      {
         path : '*',
         redirect : '/public/home',
      }

   ]
})

router.beforeEach(( to, from, next )=> {
   const token = localStorage.getItem('x_xsrf_token')

   if ( !token ) {// unauthorize user
      if ( to.name == 'user.login' || 
            to.name == 'user.registration' || 
            to.name == 'home.index' ||  
            to.name == 'demoshow.index' ||
            to.name == 'demotypeshow.index' ) { // user can visit this routes
         return next()
      } else { // if user wants other routes, he was redirect to login.page
         return next({
            name:'user.login'
         })
      }
   } 


   if ( to.name == 'user.login' || 
         to.name == 'user.registration' && 
         token ) { // user has token and wants visit this links
      return next({ // so he will be redirect to demoshow page
         name:'demoshow.index'
      })
   } 

   next()

})
export  default router
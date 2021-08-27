import inmujuridico from "./components/inmujuridico";

require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueSimpleAlert from "vue-simple-alert";
// import 'sweetalert2/src/sweetalert2.scss'
Vue.use(VueSimpleAlert);
// Vue.component('verificar', require('./components/verificar.vue').default);
import contribuyente from './components/contribuyente';
import modcontrib from './components/modcontrib';
import inmueble from './components/inmueble';
import home from './components/ExampleComponent';
import conjuridico from "./components/conjuridico";
import listado from "./components/listado";
const routes = [
    { path: '/home', component: home },
    { path: '/contribuyente', component: contribuyente },
    { path: '/inmueble', component: inmueble },
    { path: '/buscar', component: modcontrib },
    { path: '/inmujuridico', component: inmujuridico },
    { path: '/conjuridico', component: conjuridico },
    { path: '/listado', component: listado },
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    mounted() {
        // You are able to access plugin from everywhere via this.$toastr
        // this.$toastr.defaultPosition = "toast-top-left";
        // Send message to browser screen
        // this.$toastr.s(
        //     "This Message From Toastr Plugin\n You can access this plugin : <font color='yellow'>this.$toastr</font>"
        // );
    }
});

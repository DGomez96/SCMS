/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Swal = require('sweetalert2');
window.Vue = require('vue');
require('selectize');

//Vue 
 
//Librerias

//Librerias Javascript de los Componentes

//RxJS
import Rx from 'vue-rx'
import VueRx from 'vue-rx'
//Axios Observable!
import Axios from  'axios-observable';


//Importacion del Chat de Vue
import VueChatScroll from 'vue-chat-scroll'

//Uso de VUE
Vue.use(VueChatScroll,Axios,Rx,VueRx)

Vue.component('message', require('./components/message.vue').default);
Vue.component('menuweb', require('./components/menuWeb.vue').default);
Vue.component('editar-excel',require('./components/editarExcel.vue').default);

const app = new Vue({
    el: '#app',
 
});

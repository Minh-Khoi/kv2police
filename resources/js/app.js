/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// window.Vue = require('vue');

// import VueRouter from "vue-router";
import {
    vue_router
} from './routes.js';

// Vue.use(VueRouter);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('danh-sach-component', require('./components/DanhSachComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const vue_router = new VueRouter({
//     routes
// })

const app = new Vue({
    el: '#app',
    router: vue_router,
    // template: `<example-component></example-component>`,
    // components: {
    //     DanhSachComponent,
    //     ExampleComponent
    // }
});

//when click the "Danh sách hộ" render the DanhsachComponent
document.querySelector('.list-fixed.ho ').addEventListener('click', function (e) {
    vue_router.push({
        path: "/"
    });
});

//when click the "Danh sách nhân khẩu" render the DanhsachNhanKhauComponent
document.querySelector('.list-fixed.nhankhau ').addEventListener('click', function (e) {
    vue_router.push({
        path: "/vue/danhsachnhankhau"
    });
});

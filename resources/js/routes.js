import DanhSachComponent from './components/DanhSachComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import HoComponent from "./components/HoComponent.vue";
import NhanKhauComponent from "./components/NhanKhauComponent.vue";
import VueRouter from "vue-router";

window.Vue = require('vue');
Vue.use(VueRouter);

/** router vue js */
const routes = [{
    path: '/',
    component: DanhSachComponent,
    props: true
}, {
    path: '/vue/demo',
    component: ExampleComponent,
    props: true
}, {
    path: '/vue/chitietho/:ho_id',
    component: HoComponent,
    props: true
}, {
    path: '/vue/chitiethonhankhau/:nhankhau_id',
    component: NhanKhauComponent,
    props: true
}];

export const vue_router = new VueRouter({
    routes
});

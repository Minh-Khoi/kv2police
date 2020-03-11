import DanhSachComponent from './components/DanhSachComponent.vue';
import HoComponent from "./components/HoComponent.vue";
import ChinhSuaNhanKhauComponent from "./components/ChinhSuaNhanKhauComponent.vue";
import DanhSachNhanKhauComponent from "./components/DanhSachNhanKhauComponent.vue";
import ChinhSuaHoComponent from './components/ChinhSuaHoComponent.vue';
import VueRouter from "vue-router";

window.Vue = require('vue');
Vue.use(VueRouter);

/** router vue js */
const routes = [{
    path: '/',
    component: DanhSachComponent,
    props: true
}, {
    path: '/vue/danhsachnhankhau',
    component: DanhSachNhanKhauComponent,
    props: true
}, {
    path: '/vue/chitietho/:ho_id',
    component: HoComponent,
    props: true
}, {
    path: '/vue/chinhsuaho/:ho_id',
    component: ChinhSuaHoComponent,
    props: true
}, {
    path: '/vue/chinhsuanhankhau/:nhankhau_id',
    component: ChinhSuaNhanKhauComponent,
    props: true
}];

/** vue_router will be imported in the app.js and every vue components which use programic navigation of route  */
export const vue_router = new VueRouter({
    routes
});

import router from "./routes";
import Index from './index';
import VueRouter from "vue-router";
import BootstrapVue from "bootstrap-vue";

window.Vue = require('vue').default;
Vue.use(VueRouter);
Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app',
    router,
    components: {
        index: Index
    }
});

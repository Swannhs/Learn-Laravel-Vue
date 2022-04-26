import VueRouter from "vue-router";
import Home from "./pages/Home";

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router;

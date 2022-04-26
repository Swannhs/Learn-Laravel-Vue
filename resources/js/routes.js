import VueRouter from "vue-router";
import Home from "./pages/Home";
import Blog from "./pages/Blog";

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/blog',
        component: Blog,
        name: 'blog'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router;

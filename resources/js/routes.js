import VueRouter from "vue-router";
import Home from "./pages/Home";
import Blog from "./pages/Blog";
import SingleBlog from "./components/Blog/SingleBlog";

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
    },
    {
        path: '/blog/:id',
        component: SingleBlog,
        name: 'single-blog'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router;

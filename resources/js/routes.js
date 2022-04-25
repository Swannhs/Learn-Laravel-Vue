import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent";

const routes = [
    {
        path: '/',
        component: ExampleComponent,
        name: 'home'
    }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router;

<template>
    <div>
        <navbar></navbar>

        <div class="container vue-body">
            <router-view></router-view>
        </div>

        <Footer></Footer>
    </div>
</template>

<script>
import Navbar from "./components/Navbar/Navbar";
import Footer from "./components/Footer/Footer";

export default {
    name: "index",
    components: {
        Navbar,
        Footer
    }
}
</script>

<style scoped>
.vue-body {
    min-height: 35vh;
}
</style>

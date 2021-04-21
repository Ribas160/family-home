<template>
    <div id="app">
        <Horizontal />
        <router-view class="router" />
    </div>
</template>
<script>
    import Horizontal from "./components/Horizontal";
    export default {
        name: 'App',
        components: { Horizontal },
        mounted() {
            console.log('done');
        }
    }
</script>
<style>
    #app, .router {
        height: 100%;
    }

    /*body {*/
    /*    background: #f8fafc;*/
    /*}*/

    /*body::before, body::after {*/
    /*    display: none;*/
    /*}*/

    section {
        height: 100%;
    }
</style>

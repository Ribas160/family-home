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
    }
</script>
<style>
    html, body, #app, .router {
        height: 100%;
    }

    #app {
        overflow: hidden;
    }
</style>

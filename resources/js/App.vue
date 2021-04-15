<template>
    <div id="app">
        <router-view class="router" />
    </div>
</template>
<script>
    export default {
        name: 'App',
    }
</script>
<style>
    html, body, #app, .router {
        height: 100%;
    }
</style>

<template>
    <div class="container d-flex align-items-center justify-content-center">
        <Header :title="'Камера'" />
        <div class="camera">
            <img :src="path" alt="Camera">
        </div>
    </div>
</template>
<script>
    import Header from "../../components/devices/Header";

    export default {
        components: { Header },
        data() {
            return {
                path: '',
            };
        },
        methods: {
            generatePath() {
                let host = document.location.href.replace(/#.*/s , '');
                this.path = host + 'images/camera.jpg?random=' + this.randomString(20);
            },
            randomString(length) {
                let rnd = '';
                while (rnd.length < length) {
                    rnd += Math.random().toString(36).substring(2);
                }
                return rnd.substring(0, length);
            },
        },
        mounted() {
            this.generatePath();
            setInterval(() => {
                this.generatePath();
            }, 30000);
        }
    }
</script>
<style scoped>
    .container {
        position: relative;
        background: #292b2c;
    }
    .camera img {
        width: 100%;
    }
</style>

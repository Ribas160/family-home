<template>
    <div class="container d-flex">
        <div class="camera d-flex align-items-center justify-content-center">
            <font-awesome-icon icon="video" size="1x" />
        </div>
        <div class="temperature d-flex align-items-center justify-content-center" v-on:click="$router.push('/temperature')">
            <font-awesome-icon icon="thermometer-three-quarters" size="1x" />
        </div>
    </div>
</template>
<script>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { library } from '@fortawesome/fontawesome-svg-core';
    import { faVideo, faThermometerThreeQuarters } from '@fortawesome/free-solid-svg-icons';

    library.add(faVideo, faThermometerThreeQuarters);
    export default {
        components: { FontAwesomeIcon },
    }
</script>
<style scoped>
    .container, .camera, .temperature {
        height: 100%;
    }

    .container {
        width: 100%;
        max-width: 1140px;
        padding: 0;
    }

    .camera, .temperature {
        width: 50%;
        font-size: 60px;
        color: #fff;
    }

    .camera {
        background: #292b2c;
    }

    .temperature {
        background: #0275d8;
    }
</style>

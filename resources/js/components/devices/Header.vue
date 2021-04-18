<template>
    <header>
        <div class="back" v-if="$route.name !== 'index'" v-on:click="$router.push('/')">
            <font-awesome-icon class="icon" icon="arrow-left" />
        </div>
        <div class="title">{{ title }}</div>
    </header>
</template>

<script>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { library } from '@fortawesome/fontawesome-svg-core';
    import { faArrowLeft } from '@fortawesome/free-solid-svg-icons';

    library.add(faArrowLeft);

    export default {
        components: { FontAwesomeIcon },
        props: ['title'],
    }
</script>

<style scoped>
    header {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 0;
        font-size: 30px;
        color: #fff;
    }

    .back {
        position: absolute;
        top: 50%;
        transform: translateY(-55%);
        left: 10px;
        display: flex;
        align-items: center;
    }

    .back:hover {
        cursor: pointer;
    }

    .title {
        text-align: center;
        font-weight: bold;
        color: #fff;
    }
</style>

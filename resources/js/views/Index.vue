<template>
    <div class="wrapper">
        <header>
            <div class="title">Family Home</div>
            <div class="user" v-on:click="toggleUserMenu()">
                <div class="account">
                    <font-awesome-icon class="icon" icon="user" size="1x" />
                    {{ username }}
                </div>
                <div class="usermenu">
                    <span v-on:click="logout()">Выйти</span>
                </div>
            </div>
        </header>
        <div>
            <div class="camera d-flex align-items-center justify-content-center" v-on:click="$router.push('/camera')">
                <font-awesome-icon icon="video" size="1x" />
            </div>
        </div>
        <div class="grid-right">
            <div class="temperature d-flex align-items-center justify-content-center" v-on:click="$router.push('/temperature')">
                <font-awesome-icon icon="thermometer-three-quarters" size="1x" />
            </div>
            <div class="humidity d-flex align-items-center justify-content-center" v-on:click="$router.push('/humidity')">
                <font-awesome-icon icon="tint" size="1x" />
            </div>
        </div>
    </div>
</template>
<script>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
    import { library } from '@fortawesome/fontawesome-svg-core';
    import { faVideo, faThermometerThreeQuarters, faUser, faTint } from '@fortawesome/free-solid-svg-icons';
    import api from '../api/auth';

    library.add(faVideo, faThermometerThreeQuarters, faUser, faTint);
    export default {
        components: { FontAwesomeIcon },
        computed: {
            username: function () {
                let user = JSON.parse(localStorage.getItem('user'));
                return user.name;
            }
        },
        methods: {
            toggleUserMenu () {
                let user = document.querySelector('.user');
                if (user.classList.contains('openMenu')) {
                    user.classList.remove('openMenu');
                    user.classList.add('closeMenu');
                    setTimeout(() => {user.style.height = '18px'}, 500);
                } else {
                    user.classList.remove('closeMenu');
                    user.classList.add('openMenu');
                    setTimeout(() => {user.style.height = '56px'}, 500);
                }
            },
            logout() {
                api.logout().then(res => {
                    if (res.request.status === 200) {
                        localStorage.removeItem('user');
                        localStorage.removeItem('FAToken');
                        this.$router.push('/login');
                    }
                }).catch(err => console.log(err.response));
            },
        },
    }
</script>
<style scoped>
    .wrapper {
        width: 100%;
        height: calc(100% - 52px);
        /*max-width: 1140px;*/
        margin-top: 52px;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .grid-right {
        grid-template-rows: repeat(2, 1fr);
    }

    header {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        margin: 0 auto;
        padding: 10px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        background: #fff;
    }

    .title {
        font-size: 20px;
    }

    .user {
        position: absolute;
        top: 29%;
        right: 10px;
        padding: 0 5px;
        height: 18px;
        display: flex;
        flex-direction: column;
        background: #fff;
        overflow: hidden;
    }

    .user:hover {
        cursor: pointer;
    }

    .usermenu {
        margin-top: 10px;
        text-decoration: underline;
    }

    .icon {
        margin-right: 5px;
    }

    .camera, .temperature, .humidity {
        font-size: 60px;
        color: #fff;
    }

    .camera:hover, .temperature:hover, .humidity:hover {
        cursor: pointer;
    }

    .camera {
        height: 100%;
        background: #292b2c;
    }

    .temperature {
        height: 50%;
        background: #f0ad4e;
    }

    .humidity {
        height: 50%;
        background: #0275d8;
    }

    /* Animation */
    .openMenu {
        animation: openMenu 0.5s ease;
    }

    .closeMenu {
        animation: closeMenu 0.5s ease;
    }

    @keyframes openMenu {
        0% {
            height: 18px;
        }

        100% {
            height: 56px;
        }
    }

    @keyframes closeMenu {
        0% {
            height: 56px;
        }

        100% {
            height: 18px;
        }
    }
</style>

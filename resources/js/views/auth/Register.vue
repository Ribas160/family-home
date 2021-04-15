<template>
    <div class="form">
        <h1>Регистрация</h1>
        <div class="form-group" v-bind:class="{error: errors.name}">
            <label for="name">Имя</label>
            <input type="text" v-model="data.name" class="form-control" id="name" placeholder="Enter email">
            <small class="form-text" v-if="errors.name">{{ errors.name[0] }}</small>
        </div>
        <div class="form-group" v-bind:class="{error: errors.email}">
            <label for="email">Адрес электронной почты</label>
            <input type="email" v-model="data.email" class="form-control"  id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small class="form-text" v-if="errors.email">{{ errors.email[0] }}</small>
        </div>
        <div class="form-group" v-bind:class="{error: errors.password}">
            <label for="password">Пароль</label>
            <input type="password" v-model="data.password" class="form-control" id="password" placeholder="Password">
            <small class="form-text" v-if="errors.password">{{ errors.password[0] }}</small>
        </div>
        <div class="form-group" v-bind:class="{error: errors.password}">
            <label for="passwordConfirm">Повторите пароль</label>
            <input type="password" v-model="data.password_confirmation" class="form-control" id="passwordConfirm" placeholder="Password">
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary" v-on:click="submit">Отправить</button>
            <span v-on:click="$router.push('/login')">Авторизация</span>
        </div>
    </div>
</template>
<script>
    import api from '../../api/auth';
    export default {
        components: { api },
        data() {
            return {
                data: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {},
            }
        },
        methods: {
            submit() {
                this.errors = {};

                api.register(this.data)
                    .then(res => {
                        console.log(res);
                        if (res.request.status === 201) {
                            localStorage.setItem('user', res.data.user);
                            localStorage.setItem('FAToken', res.data.token);
                            this.$router.push('/');
                        }
                    })
                    .catch(err => this.errors = err.response.data.errors);
            }
        }
    }
</script>
<style scoped>
    .form {
        width: 90%;
        max-width: 700px;
        margin: 0 auto;
        padding-top: 20px;
    }

    .error label, .error small {
        color: #d9534f;
    }

    .error input {
        border-color: #d9534f;
    }

    .button {
        display: flex;
        align-items: flex-end;
    }

    .button span {
        margin-left: 30px;
        text-decoration: underline;
    }

    .button span:hover {
        cursor: pointer;
    }
</style>

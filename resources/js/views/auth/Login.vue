<template>
    <div class="form">
        <h1>Авторизация</h1>
        <div class="form-group" v-bind:class="{error: errors.name}">
            <label for="name">Имя</label>
            <input type="text" v-model="data.name" class="form-control" id="name" placeholder="Введите имя">
            <small class="form-text" v-if="errors.name">{{ errors.name[0] }}</small>
        </div>
        <div class="form-group" v-bind:class="{error: errors.password}">
            <label for="password">Пароль</label>
            <input type="password" v-model="data.password" class="form-control" id="password" placeholder="Введите пароль">
            <small class="form-text" v-if="errors.password">{{ errors.password[0] }}</small>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary" v-on:click="submit">Отправить</button>
<!--            <span v-on:click="$router.push('/register')">Зарегестрироваться</span>-->
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
                password: '',
            },
            errors: {},
        }
    },
    methods: {
        submit() {
            this.errors = {};

            api.login(this.data)
                .then(res => {
                    localStorage.setItem('user', JSON.stringify(res.data.user));
                    localStorage.setItem('FAToken', res.data.token);
                    this.$router.push('/');
                })
                .catch(err => {
                    console.log(err.response);

                    if (err.response.status === 422) {
                        this.errors = err.response.data.errors;
                    }

                    if (err.response.status === 401) {
                        this.errors = err.response.data.errors;
                        this.errors.name = this.errors.message;
                    }
                });
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

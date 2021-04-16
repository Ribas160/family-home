import csrf from "./config";

export default {
    register(data) {
        return csrf.then(() => {
            return axios.post('api/register', data);
        });
    },

    login(data) {
        return csrf.then(() => {
           return axios.post('api/login', data);
        });
    },

    logout() {
        let token = localStorage.getItem('FAToken');

        return csrf.then(() => {
            return axios.post('api/logout', {}, {
                headers: { Authorization: `Bearer ${token}` },
            });
        });
    },

    isAuth() {
        let token = localStorage.getItem('FAToken');

        return csrf.then(() => {
            return axios.get('api/user', {
                headers: { Authorization: `Bearer ${token}` },
            });
        });
    }
}

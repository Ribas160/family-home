let url = 'http://localhost/projects/tmp/family-home/public';

import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://localhost/projects/tmp/family-home/public/';

let csrf = axios.get('sanctum/csrf-cookie');
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
        axios.post('api/logout').then(res => {
            if (res.request.status === 200) {
                localStorage.removeItem('user');
                localStorage.removeItem('FAToken');
            }
        });
    }
}

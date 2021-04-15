let url = 'http://localhost/projects/tmp/family-home/public';

import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://localhost/projects/tmp/family-home/public/';

let csrf = axios.get('sanctum/csrf-cookie');
export default {
    temperature() {
        let user = localStorage.getItem('user');
        let token = localStorage.getItem('FAToken');

        return csrf.then(() => {
            return axios.get('api/devices/temperature', {
                headers: { Authorization: `Bearer ${token}` },
            });
        });
    },
}

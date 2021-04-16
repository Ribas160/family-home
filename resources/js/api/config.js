import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = document.location.href.replace(/#.*/s , '');

let csrf = axios.get('sanctum/csrf-cookie');

export default csrf;

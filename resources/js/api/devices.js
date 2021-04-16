import csrf from "./config";

export default {
    temperature() {
        let token = localStorage.getItem('FAToken');

        return csrf.then(() => {
            return axios.get('api/devices/temperature', {
                headers: { Authorization: `Bearer ${token}` },
            });
        });
    },

    humidity() {
        let token = localStorage.getItem('FAToken');

        return csrf.then(() => {
            return axios.get('api/devices/humidity', {
                headers: { Authorization: `Bearer ${token}` },
            });
        });
    }
}

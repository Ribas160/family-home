<template>
    <div class="wrapper d-flex align-items-center justify-content-center">
        <Header :title="'Влажность'" />
        <Speedometer
            :minValue="minValue"
            :maxValue="maxValue"
            :segmentStops="segmentStops"
            :segmentColors="segmentColors"
            :textColor="textColor"
            :needleHeight="needleHeight"
            :needleColor="needleColor"
            :value="value"
            :currentValueText="''"
            :data="humidity"
            :measure="'%'"
        />
    </div>
</template>
<script>
import Header from "../../components/devices/Header";
import Speedometer from "../../components/devices/Speedometer";
import api from "../../api/devices";

export default {
    components: { Header, Speedometer },
    data() {
        return {
            minValue: 10,
            maxValue: 80,
            segmentStops: [10, 30, 60, 80],
            segmentColors: ['#f0ad4e', '#5cb85c', '#d9534f'],
            textColor: '#fff',
            needleHeight: 0.7,
            needleColor: '#fff',
            value: 10,
            humidity: 0,
        }
    },
    methods: {
        getData() {
            api.humidity().then(res => {
                if (res.data < this.minValue) this.value = this.minValue;
                else if (res.data > this.maxValue) this.value = this.maxValue;
                else this.value = res.data;
                this.humidity = res.data;
            }).catch(err => console.log(err.response));
        }
    },
    mounted() {
        this.getData();
        setInterval(() => {
            this.getData();
        }, 60000)
    }
}
</script>
<style scoped>
    .wrapper {
        position: relative;
        width: 100%;
        height: 100vh;
        padding: 0;
        background: #0275d8;
    }
</style>

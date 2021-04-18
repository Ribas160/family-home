<template>
    <div class="container d-flex align-items-center justify-content-center">
        <Header :title="'Температура'" />
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
            :data="temperature"
            :measure="' ℃'"
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
                minValue: 12,
                maxValue: 36,
                segmentStops: [12, 20, 28, 36],
                segmentColors: ['#8ecbf3', '#5cb85c', '#d9534f'],
                textColor: '#fff',
                needleHeight: 0.7,
                needleColor: '#fff',
                value: 12,
                temperature: 0,
            }
        },
        methods: {
            getData() {
                api.temperature().then(res => {
                    if (res.data.c < this.minValue) this.value = this.minValue;
                    else if (res.data.c > this.maxValue) this.value = this.maxValue;
                    else this.value = res.data.c;
                    this.temperature = res.data.c;
                }).catch(err => console.log(err.response));
            },
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
    .container {
        position: relative;
        width: 100%;
        max-width: 1140px;
        height: 100vh;
        padding: 0;
        background: #f0ad4e;
    }
</style>

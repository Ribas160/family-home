<template>
    <div class="container d-flex align-items-center justify-content-center">
        <Header :title="'Влажность'" />
        <div class="speedometer">
            <vue-speedometer
                :width="width"
                :height="height"
                :minValue="minValue"
                :maxValue="maxValue"
                :customSegmentStops="segmentStops"
                :segmentColors="segmentColors"
                textColor="#fff"
                :needleHeightRatio="0.7"
                needleColor="#fff"
                :value="value"
                :currentValueText="''"
            />
            <div class="value">{{ humidity }}%</div>
        </div>
    </div>
</template>
<script>
import VueSpeedometer from "vue-speedometer";
import Header from "../../components/Header";
import api from "../../api/devices";

export default {
    components: {Header, VueSpeedometer },
    data() {
        return {
            minValue: 20,
            maxValue: 80,
            segmentStops: [20, 30, 60, 80],
            segmentColors: ['#f0ad4e', '#5cb85c', '#d9534f'],
            value: 20,
            humidity: 0,
        }
    },
    computed: {
        width: function () {
            let landscape = window.innerWidth > window.innerHeight;

            if (!landscape) {
                if (window.innerWidth < 700) {
                    return window.innerWidth * 0.9;
                }

                return 700 * 0.9;
            } else {
                if (window.innerHeight < 700) {
                    return window.innerHeight * 0.9;
                }

                return 700 * 0.9;
            }
        },

        height: function () {
            let landscape = window.innerWidth > window.innerHeight;

            if (!landscape) {
                if (window.innerWidth < 700) {
                    return window.innerWidth * 0.48;
                }

                return 700 * 0.48;
            } else {
                if (window.innerHeight < 700) {
                    return window.innerHeight * 0.48;
                }

                return 700 * 0.48;
            }
        }
    },
    mounted() {
        api.humidity().then(res => {
            if (res.data < this.minValue) this.value = this.minValue;
            else if (res.data > this.maxValue) this.value = this.maxValue;
            else this.value = res.data;
            this.humidity = res.data;
        }).catch(err => console.log(err.response));
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
    background: #0275d8;
}

.value {
    margin-top: 30px;
    font-size: 10vw;
    text-align: center;
    color: #fff;
}

@media (orientation: landscape) and (max-height: 500px) {
    .value {
        font-size: 10vh;
    }
}

@media (min-width: 700px) {
    .value {
        font-size: 70px;
    }
}
</style>

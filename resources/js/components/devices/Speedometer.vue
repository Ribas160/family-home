<template>
    <div>
        <vue-speedometer
            :width="width"
            :height="height"
            :minValue="minValue"
            :maxValue="maxValue"
            :customSegmentStops="segmentStops"
            :segmentColors="segmentColors"
            :textColor="textColor"
            :needleHeightRatio="needleHeight"
            :needleColor="needleColor"
            :value="value"
            :currentValueText="''"
        />
        <div class="value">{{ data }}{{ measure }}</div>
    </div>
</template>
<script>
import VueSpeedometer from "vue-speedometer";

export default {
    components: { VueSpeedometer },
    props: [
        'minValue',
        'maxValue',
        'segmentStops',
        'segmentColors',
        'textColor',
        'needleHeight',
        'needleColor',
        'value',
        'data',
        'measure'
    ],
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
}
</script>
<style scoped>
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

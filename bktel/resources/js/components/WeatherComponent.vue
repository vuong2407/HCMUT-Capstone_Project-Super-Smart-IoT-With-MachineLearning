<template>
    <section class="h-[92vh] rounded overflow-hidden"
        style="background-image:url('/images/weather.jpeg');   background-position: center; background-repeat: no-repeat;background-size: cover;">
        <div class=" h-100">
            <div class="row d-flex justify-content-center align-items-center h-100" style="color: #282828">
                <div class="col-md-9 col-lg-7 col-xl-5">
                    <div class="card mb-4 gradient-custom" style="border-radius: 25px">
                        <div class="card-body p-4">
                            <div id="demo1" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators mb-0">
                                    <li data-target="#demo1" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo1" data-slide-to="1"></li>
                                    <li data-target="#demo1" data-slide-to="2"></li>
                                </ul>
                                <!-- Carousel inner -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="d-flex justify-content-between mb-4 pb-2">
                                            <div>
                                                <h2 class="display-2">
                                                    <strong>{{ changeTemptoDeg }}°C</strong>
                                                </h2>
                                                <p class="text-muted mb-0">
                                                    Độ ẩm {{ current.forecast.humidity }} %
                                                </p>
                                                <p class="text-muted mb-0">
                                                    {{ current.location.name }}
                                                </p>
                                                <p class="text-muted mb-0">
                                                    <!-- {{ currentTime }} {{ current.datetime.formatted_day }} {{ current.datetime.formatted_date }} -->
                                                    {{ current.datetime.formatted_time }} {{ current.datetime.formatted_day
                                                    }} {{ current.datetime.formatted_date }}
                                                </p>
                                            </div>
                                            <div class="flex flex-col items-center">
                                                <img :src="current.condition.icon" width="120px" />
                                                <span>{{ current.condition.desc }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4" style="border-radius: 25px">
                        <div class="card-body p-4">
                            <div id="demo2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators mb-0">
                                    <li data-target="#demo2" data-slide-to="0"></li>
                                    <li data-target="#demo2" data-slide-to="1" class="active"></li>
                                    <li data-target="#demo2" data-slide-to="2"></li>
                                </ul>
                                <!-- Carousel inner -->
                                <div class="carousel-inner">
                                    <p class="font-bold text-blue-600">Today Weather Forecast</p>
                                    <div class="carousel-item active">
                                        <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2">
                                            <div v-for="forecastToday in todayArr" class="flex-column">
                                                <p class="small">
                                                    <strong>{{ Math.floor((forecastToday.forecast.temp - 32) * 55.555) / 100
                                                    }}°C</strong>
                                                </p>
                                                <!-- <i class="far fa-sun fa-2x mb-3" style="color: #ddd"></i> -->
                                                <img :src="forecastToday.condition.icon" width="50px" />
                                                <p class="mb-0">
                                                    <strong>{{ forecastToday.datetime.formatted_time }}</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    {{ forecastToday.condition.desc }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="border-radius: 25px">
                        <div class="card-body p-4">
                            <div id="demo3" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators mb-0">
                                    <li data-target="#demo3" data-slide-to="0"></li>
                                    <li data-target="#demo3" data-slide-to="1"></li>
                                    <li data-target="#demo3" data-slide-to="2" class="active"></li>
                                </ul>
                                <!-- Carousel inner -->
                                <div class="carousel-inner">
                                    <p class="font-bold text-blue-600">Week Weather Forecast</p>
                                    <div class="carousel-item active">
                                        <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2">
                                            <div v-for="forecastWeek in forecastArr" class="flex-column">
                                                <p class="small">
                                                    <strong>{{ Math.floor((forecastWeek.forecast.temp - 32) * 55.555) / 100
                                                    }}°C</strong>
                                                </p>
                                                <!-- <i class="far fa-sun fa-2x mb-3" style="color: #ddd"></i> -->
                                                <img :src="forecastWeek.condition.icon" width="50px" />
                                                <p class="mb-0">
                                                    <strong>{{ forecastWeek.datetime.formatted_time }}</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    {{ forecastWeek.condition.desc }}
                                                </p>
                                                <p class="mb-0 text-muted" > {{ forecastWeek.datetime.formatted_day }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import firebase from "../../utl/firebase";
import database from "../../utl/firebase";
import { motorStatus } from "../../utl/firebase";
export default {
    firebase: {
        status: motorStatus.once("value"),
    },
    computed: {
        changeTemptoDeg() {
            return Math.floor((this.current.forecast.temp - 32) * 55.555) / 100
        },
        currentTime() {
            return (`${this.time.getHours()}h:${this.time.getMinutes()}m:${this.time.getSeconds()}s`)
        },
    },
    props: {
        current: {
            type: Object,
            default() {
                return {};
            },
        },
        forecast: {
            type: Object,
            default() {
                return {};
            },
        },
    },
    mounted() {
        let today = this.current.datetime.formatted_day;
        this.todayArr = this.forecast.forecast.filter(obj => obj.datetime.formatted_day === today);
        let allDays = [];
        this.forecast.forecast.forEach(item => {
            const formatDate = item.datetime.formatted_day;
            // console.log(allDays.includes(formatDate));
            if (!allDays.includes(formatDate)) {
                allDays.push(formatDate);
                this.forecastArr.push(item);
            }
        });
        console.log(this.forecastArr);
    },
    data() {
        return {
            time: new Date(),
            todayArr: [],
            forecastArr: [],
        };
    },
};
</script>

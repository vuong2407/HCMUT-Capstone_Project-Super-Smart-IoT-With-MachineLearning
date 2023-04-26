<template>
    <section class="vh-96" style="background-color: #c1cfea">
        <div class="py-2 h-100">
            <input type="file" placeholder="img" @change="checkFile($event)" class="w-full h-full" />
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
                                                    <strong>23°C</strong>
                                                </h2>
                                                <p class="text-muted mb-0">
                                                    Coimbra, Portugal
                                                </p>
                                            </div>
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu3.webp"
                                                    width="150px" />
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
                                    <div class="carousel-item active">
                                        <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2">
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>21°C</strong>
                                                </p>
                                                <i class="fas fa-sun fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>12:00</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    PM
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>2°C</strong>
                                                </p>
                                                <svg style="margin-bottom: 15px;" viewBox="0 0 512 512">
                                                    <path style="color: #ffffff"
                                                        d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z" />
                                                </svg>
                                                <p class="mb-0">
                                                    <strong>1:00</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    PM
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>20°C</strong>
                                                </p>
                                                <i class="fa fa-cloud fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>2:00</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    PM
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>19°C</strong>
                                                </p>
                                                <i class="fa fa-cloud fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>3:00</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    PM
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>18°C</strong>
                                                </p>
                                                <i class="fa fa-cloud-showers-heavy fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>4:00</strong>
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size: 0.65rem">
                                                    PM
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
                                    <div class="carousel-item active">
                                        <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2">
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>21°C</strong>
                                                </p>
                                                <i class="fas fa-sun fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>Mon</strong>
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>20°C</strong>
                                                </p>
                                                <i class="fas fa-sun fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>Tue</strong>
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>16°C</strong>
                                                </p>
                                                <i class="fa fa-cloud fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>Wed</strong>
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>17°C</strong>
                                                </p>
                                                <i class="fa fa-cloud fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>Thu</strong>
                                                </p>
                                            </div>
                                            <div class="flex-column">
                                                <p class="small">
                                                    <strong>18°C</strong>
                                                </p>
                                                <i class="fa fa-cloud-showers-heavy fa-2x mb-3" style="color: #ddd"></i>
                                                <p class="mb-0">
                                                    <strong>Fri</strong>
                                                </p>
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
import { onMounted, reactive } from "vue";
import { motorStatus } from "../../utl/firebase";
import VueToastr from "vue-toastr";
export default {
    firebase: {
        status: motorStatus.once("value"),
    },
    props: {
        current: {
            type: Object,
            default() {
                return {};
            },
        },
    },
    setup() {
        const state = reactive({
            motorStatus: {},
        });
        onMounted(async () => {
            let motorStatusSet = motorStatus.on("value", (change) => {
                state.motorStatus = change.val();
                console.log(state.motorStatus);
            });
        });
        return { state };
    },
    data() {
        return {
            motorStatus: "",
            commands: [],
            commandSelected: {},
            manual: true,
            ledStatus: "",
            userName: "",
            status: "",
            time: new Date(),
        };
    },
    mounted() {
        axios.get('/fetch-data').then((res) => {
                console.log(res);
            })
        // const headers = {
        //     'Content-Type': 'application/json',
        //     'Accept': 'application/json',
        // }
        // axios.defaults.baseURL = "http://localhost:5001";
        // axios.defaults.headers.common["Content-Type"] =
        //     "application/json;charset=utf-8";
        // axios.defaults.headers.common["Access-Control-Allow-Origin"] = "*";
        // axios
        //     .get("http://localhost:5001/", {
        //         withCredentials: false,
        //     }, {headers: headers})
        //     .then((res) => {
        //         console.log(res);
        //     });
        // this.fetchData();
        // let motorStatusSet = motorStatus.on("value", (change) => {
        //     this.motorStatus = change.val();
        //     console.log(this.motorStatus);
        // });
    },
    methods: {
        checkFile(e) {
            const image = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = (e) => {
                this.previewImage = e.target.result;
                // console.log(this.previewImage);
            };
            console.log(image);
            axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            const headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json',

            }
            axios
                .post("http://127.0.0.1:5001/api/predict-diseases", {
                    file: image,
                }, { headers: headers })
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => { });
        },
        toggleMotor() {
            if (this.motorStatus == 0) {
                this.motorStatus = 1;
                this.status = "turn on motor";
                firebase.database.ref("/").update({
                    motorStatus: 1,
                });
            } else {
                this.status = "turn off motor";
                this.motorStatus = 0;
                firebase.database.ref("/").update({
                    motorStatus: 0,
                });
            }

            let obj = {
                name: this.user.name,
                command: this.status,
                timestamp: this.time.toLocaleString(),
            };
            firebase.firestore
                .collection("commands")
                .add(obj)
                .then((doc) => {
                    // alert('command '+ this.status  + 'is send with Doc id: ' + doc.id )
                    this.$toastr.s(
                        "command" +
                        this.status +
                        " is send with Doc id: " +
                        doc.id,
                        "SUCCESS MESSAGE"
                    );
                    this.status = "";
                    this.fetchData();
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        toggleLed() {
            if (this.ledStatus == 0) {
                this.ledStatus = 1;
                this.status = "turn on led";
                firebase.database.ref("/").update({
                    ledStatus: 1,
                });
            } else {
                this.status = "turn off led";
                this.ledStatus = 0;
                firebase.database.ref("/").update({
                    ledStatus: 0,
                });
            }

            let obj = {
                name: this.user.name,
                command: this.status,
                timestamp: this.time.toLocaleString(),
            };
            firebase.firestore
                .collection("commands")
                .add(obj)
                .then((doc) => {
                    // alert('command '+ this.status  + 'is send with Doc id: ' + doc.id )
                    this.$toastr.s(
                        "command" +
                        this.status +
                        " is send with Doc id: " +
                        doc.id,
                        "SUCCESS MESSAGE"
                    );
                    this.status = "";
                    this.fetchData();
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        toggleLcd() {
            this.lcdOn = !this.lcdOn;
            if (this.lcdOn) {
                this.status = "turn on Lcd";
            } else {
                this.status = "turn off Lcd";
            }
            let obj = {
                name: this.user.name,
                command: this.status,
                timestamp: this.time.toLocaleString(),
            };
            firebase.firestore
                .collection("commands")
                .add(obj)
                .then((doc) => {
                    alert("command is send with Doc id: " + doc.id);
                    this.status = "";
                    this.fetchData();
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        saveData() { },
        fetchData() {
            (this.commands = []),
                firebase.firestore
                    .collection("commands")
                    .get()
                    .then((docs) => {
                        docs.forEach((doc) => {
                            this.commands.push({
                                ...doc.data(),
                                ...{ docId: doc.id },
                            });
                            // console.log({...doc.data(),...{docId:doc.id}})
                        });
                    });
        },
        deleteData(command) {
            this.commandSelected = command;
            if (confirm("Are you sure delete?")) {
                firebase.firestore
                    .collection("commands")
                    .doc(command.docId)
                    .delete()
                    .then(() => {
                        this.$toastr.s("remove done", "SUCCESS MESSAGE");
                        this.commands.splice(
                            this.commands.indexOf(this.commandSelected),
                            1
                        );
                        // this.fetchData()
                    })
                    .catch((e) => {
                        console.log(e);
                    });
            }
        },
    },
};
</script>

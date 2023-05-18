<template>
    <div>
        <div class="flex flex-col items-center ml-[3.2rem] md:ml-72 mt-[50px] md:mt-[70px]">
            <div class="flex flex-row">
                <div class=" w-full flex flex-col md:flex-row justify-left md:justify-around ">
                    <div class="border border-solid rounded-[10px] w-[300px] md:w-[500px]  h-auto bg-[#d9f99d]">
                        <div class="my-[30px] flex justify-center text-center flex-col">
                            <span class="font-bold text-[20px]"> Mode</span>
                            <div class="mt-[20px] mb-[20px] flex justify-center text-center flex-row gap-x-[40px]">
                                <div>
                                    <input type="checkbox" name="Manual" v-model="manual" class="scale-150">
                                    <span class="font-bold text-[20px] ml-[5px]"> Manual </span>
                                </div>
                            </div>
                            <div class="w-full flex justify-center my-[10px]">
                                <div class="flex text-center flex-col gap-y-[15px] scale-125">
                                    <div class="flex flex-row gap-x-[15px] items-center w-[140px]">
                                        <span class="text-sm font-semibold text-gray-900 dark:text-gray-300  mr-[10px]">ROOF</span>
                                        <label class="inline-flex relative items-center cursor-pointer ">
                                            <input type="checkbox" v-model="motorStatus" class="sr-only peer"
                                                @click="toggleMotor()">
                                            <div
                                                class="w-11 border-[2px] border-green-600 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                            <span v-if="motorStatus"
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">On</span>
                                            <span v-if="!motorStatus"
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Off</span>
                                        </label>
                                    </div>
                                    <div class="flex flex-row gap-x-[15px] items-center w-[140px]">
                                        <span
                                            class="text-sm font-semibold text-gray-900 dark:text-gray-300 mr-[25px]">LED</span>
                                        <label class="inline-flex relative items-center cursor-pointer">
                                            <input type="checkbox" v-model="ledStatus" @click="toggleLed()"
                                                class="sr-only peer">
                                            <div
                                                class="w-11 border-[2px] border-green-600 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                            <span v-if="ledStatus"
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">On</span>
                                            <span v-if="!ledStatus"
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Off</span>
                                        </label>
                                    </div>
                                    <div class="flex flex-row gap-x-[15px] items-center w-[140px]">
                                        <span
                                            class="text-sm font-semibold text-gray-900 dark:text-gray-300 mr-[25px]">FAN</span>
                                        <label class="inline-flex relative items-center cursor-pointer">
                                            <input type="checkbox" v-model="lcdStatus" @click="toggleLcd()"
                                                class="sr-only peer">
                                            <div
                                                class="w-11 border-[2px] border-green-600 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                            <span v-if="lcdStatus"
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">On</span>
                                            <span v-if="!lcdStatus"
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Off</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border border-solid rounded-[10px] w-[300px] md:w-[500px]  md:mt-0 mt-[20px] h-auto bg-blue-200 ">
                        <div class="my-[30px] flex justify-center text-center flex-col">
                            <span class="font-bold text-[20px]"> Mode</span>
                            <div class="mt-[20px] mb-[20px] flex justify-center text-center flex-row gap-x-[40px]">
                                <div>
                                    <input type="checkbox" name="Manual" disabled class="scale-150">
                                    <span class="font-bold text-[20px] ml-[5px]"> Auto</span>
                                </div>
                            </div>
                            <div class="w-full flex justify-center my-[10px]">
                                <div class="flex justify-center text-center flex-col gap-y-[15px] scale-125">
                                    <div class="flex flex-row gap-x-[15px] items-center w-[140px]">
                                        <span class="text-sm font-semibold text-gray-900 dark:text-gray-300 ">MOTOR</span>
                                        <label class="inline-flex relative items-center cursor-pointer ">
                                            <input type="checkbox" class="sr-only peer" disabled>
                                            <div
                                                class="w-11 border-[2px] border-green-600 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                            <span
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Auto</span>
                                        </label>
                                    </div>
                                    <div class="flex flex-row gap-x-[15px] items-center w-[140px]">
                                        <span
                                            class="text-sm font-semibold text-gray-900 dark:text-gray-300 mr-[25px]">LED</span>
                                        <label class="inline-flex relative items-center cursor-pointer">
                                            <input type="checkbox" value="" class="sr-only peer" disabled>
                                            <div
                                                class="w-11 border-[2px] border-green-600 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                            <span
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Auto</span>
                                        </label>
                                    </div>
                                    <div class="flex flex-row gap-x-[15px] items-center w-[140px]">
                                        <span
                                            class="text-sm font-semibold text-gray-900 dark:text-gray-300 mr-[25px]">LCD</span>
                                        <label class="inline-flex relative items-center cursor-pointer">
                                            <input type="checkbox" value="" class="sr-only peer" disabled>
                                            <div
                                                class="w-11 border-[2px] border-green-600 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                            </div>
                                            <span
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Auto</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto ">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="h-[300px] overflow-auto bg-yellow-50">
                            <table class="min-w-full">
                                <thead class="border border-solid rounded-lg bg-gray-300 ">
                                    <tr class="h-[50px]">
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                            DocumentId
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                            Command
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                            Time Setting
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                            Options
                                        </th>
                                    </tr>
                                </thead>
                                <tbody v-for="(command, index) in commands" :key="command.id">
                                    <tr class="border-b">
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ command.docId }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                            {{ command.name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                            {{ command.command }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                            {{ command.timestamp }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                            <button @click="deleteData(command, index)" type="button"
                                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium  rounded bg-red-500">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div>{{state.motorStatus}}</div> -->
    <!-- <div class="flex w-[50%] justify-center gap-[20px]"> 
            <input v-model="userName" class="border focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sfull sm:w-auto px-5 py-2.5 text-center" placeholder="User Name" required/>
            <button @click="saveData()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sfull sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </div> -->
</template>
    
<script>
import firebase from '../../utl/firebase'
import database from '../../utl/firebase'
import { onMounted, reactive } from 'vue'
import { motorStatus, led1Status, ledStatus } from '../../utl/firebase'
import VueToastr from "vue-toastr";
export default {
    firebase: {
        status: motorStatus.once("value")
    },
    props: {
        user: {
            type: Object,
            default() {
                return {}
            }
        },
    },
    setup() {
        const state = reactive({
            motorStatus: {},
        })
        onMounted(async () => {
            let motorStatusSet = motorStatus.on("value", change => {
                this.motorStatus = change.val() == 1 ? 0 : 1;
                console.log(state.motorStatus);
            });
            ledStatus.on("value", change => {
                this.ledStatus = change.val()
            })
        })
        return { state };
    },
    data() {
        return {
            motorStatus: "",
            commands: [],
            commandSelected: {},
            manual: true,
            ledStatus: "",
            lcdStatus: "",
            userName: "",
            status: "",
            time: new Date(),
        }
    },
    mounted() {
        this.fetchData();
        let motorStatusSet = motorStatus.on("value", change => {
            this.motorStatus = change.val() == 1 ? 0 : 1;
            console.log(this.motorStatus);
        });
    },
    methods: {
        toggleMotor() {
            // this.$toastr.s("SUCCESS MESSAGE", "Success Toast Title");
            // this.$toastr.w("WARNING MESSAGE");
            if (this.motorStatus == 0) {
                this.motorStatus = 0;
                this.status = "turn on motor";
                firebase.database.ref("/").update({
                    "motorStatus": 0,
                })
            }
            else {
                this.status = "turn off motor";
                this.motorStatus = 1;
                firebase.database.ref("/").update({
                    "motorStatus": 1,
                })
            }

            let obj = {
                name: this.user.name,
                command: this.status,
                timestamp: this.time.toLocaleString(),
            }
            firebase.firestore.collection("commands").add(obj)
                .then(doc => {
                    // alert('command '+ this.status  + 'is send with Doc id: ' + doc.id )
                    this.$toastr.s('command' + this.status + ' is send with Doc id: ' + doc.id, "SUCCESS MESSAGE");
                    this.status = "";
                    this.fetchData()
                }).catch(e => {
                    console.log(e);
                })
        },
        toggleLed() {
            if (this.ledStatus == 0) {
                this.ledStatus = 1;
                this.status = "turn on led";
                firebase.database.ref("/").update({
                    "ledStatus": 1,
                })
            }
            else {
                this.status = "turn off led";
                this.ledStatus = 0;
                firebase.database.ref("/").update({
                    "ledStatus": 0,
                })
            }

            let obj = {
                name: this.user.name,
                command: this.status,
                timestamp: this.time.toLocaleString(),
            }
            firebase.firestore.collection("commands").add(obj)
                .then(doc => {
                    // alert('command '+ this.status  + 'is send with Doc id: ' + doc.id )
                    this.$toastr.s('command' + this.status + ' is send with Doc id: ' + doc.id, "SUCCESS MESSAGE");
                    this.status = "";
                    this.fetchData()
                }).catch(e => {
                    console.log(e);
                })
        },
        toggleLcd() {
            if (this.lcdStatus == 0) {
                this.lcdStatus = 1;
                this.status = "turn on fan";
                firebase.database.ref("/").update({
                    "led1Status": 1,
                })
            }
            else {
                this.status = "turn off led";
                this.lcdStatus = 0;
                firebase.database.ref("/").update({
                    "led1Status": 0,
                })
            }

            let obj = {
                name: this.user.name,
                command: this.status,
                timestamp: this.time.toLocaleString(),
            }
            firebase.firestore.collection("commands").add(obj)
                .then(doc => {
                    // alert('command '+ this.status  + 'is send with Doc id: ' + doc.id )
                    this.$toastr.s('command' + this.status + ' is send with Doc id: ' + doc.id, "SUCCESS MESSAGE");
                    this.status = "";
                    this.fetchData()
                }).catch(e => {
                    console.log(e);
                })
        },
        saveData() {
        },
        fetchData() {
            this.commands = [],
                firebase.firestore.collection('commands').get()
                    .then(docs => {
                        docs.forEach(doc => {
                            this.commands.push({ ...doc.data(), ...{ docId: doc.id } })
                            // console.log({...doc.data(),...{docId:doc.id}})
                        })
                    })
        },
        deleteData(command) {
            this.commandSelected = command;
            if (confirm('Are you sure delete?')) {
                firebase.firestore.collection('commands').doc(command.docId).delete()
                    .then(() => {
                        this.$toastr.s('remove done', "SUCCESS MESSAGE");
                        this.commands.splice(this.commands.indexOf(this.commandSelected), 1);
                        // this.fetchData()
                    }).catch(e => {
                        console.log(e)
                    })
            }
        },
    }

}
</script>
    
<style></style>
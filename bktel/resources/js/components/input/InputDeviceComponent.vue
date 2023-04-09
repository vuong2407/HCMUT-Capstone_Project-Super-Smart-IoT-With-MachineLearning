<template>
    <div> 
        <div class="flex justify-start pl-8 text-[26px] font-bold">Add input device</div>
        <div class="flex flex-row"> 
            <div class="flex justify-start p-8 w-[400px]">  
                <form onsubmit="return false" class="w-full">
                    <div class="mb-2">
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Name Device</label>
                        <input v-model="device.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:focus:border-blue-500" placeholder="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Parameter</label>
                        <input v-model="device.parameter" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 blocfull p-2.5 dark:focus:border-blue-500" placeholder="parameter" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Add by</label>
                        <input v-model="device.userName" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 blocfull p-2.5 dark:focus:border-blue-500" placeholder="User name" required>
                    </div>
                    <div class="mb-2" v-if="errorForm">
                        <span type="text" class="font-bold text-red-600" v-for="error in errorForm" :key="error.id" > 
                            {{error}}
                        </span>
                        <!-- cho nay su dung 2 vong for https://www.youtube.com/watch?v=25JbDjHWzsE -->
                    </div>
                    <button @click="saveData()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sfull sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                </form>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto ">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="h-[300px] overflow-auto">
                        <table class="min-w-full bg-blue-100" >
                            <thead class="border border-solid rounded-lg bg-gray-300 ">
                                <tr class="h-[50px]">
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                        Parameter
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                        Added_by
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 text-left">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="(item) in allDevices" :key="item.id">
                                <tr class="border-b">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">{{item.id}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                        {{item.name}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                        {{item.parameter}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                        {{item.added_by}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
                                        <button @click="deleteData(item)" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium  rounded bg-red-500">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    
    export default {
        props: {
            saveInputDeviceUrl: {
                type: String,
                default() {
                    return "";
                }
            },
            getAllInputDevice: {
                type: String,
                default() {
                    return "";
                }
            },
            deleteDeviceUrl: {
                type: String,
                default() {
                    return "";
                }
            }
        },
        data() {
            return{
                device: {
                    name: "",
                    parameter: "",
                    userName: "",
                },
                errorForm: {},
                allDevices: [],
                deviceSelected: {},
                current_page: "",
            }
        },
        mounted(){
            this.fetchData();
        },
        methods:{
            saveData(){
                this.errorForm = null;
                axios.post(this.saveInputDeviceUrl, this.device)
                .then((res )=> {
                    console.log(res) ;
                    this.fetchData();
                    this.device = {} ;
                })
                .catch(err => {
                    console.log(err.response.data.errors)
                    this.errorForm = err.response.data.errors
                })
            },
            fetchData(){
                this.allDevices = [];
                axios.get(this.getAllInputDevice, {
                    param: {
                        page: this.current_page ,
                    }
                }).then((res) => {
                    this.allDevices = res.data 
                })
            },
            deleteData(item){
                let data = {
                    id: item.id,
                }
                this.deviceSelected = item;
                if(confirm('Are you sure delete?')){
                    axios.post(this.deleteDeviceUrl , data)
                    .then(()=>{
                        alert('remove done')
                        this.allDevices.splice(this.allDevices.indexOf(this.deviceSelected), 1) ;
                        // this.fetchData()
                    }).catch(e =>{
                        console.log(e)
                    })
                }
            },
        }
    
    }
    </script>
    
    <style>
    
    </style>
<template>
    <div>
        <div class="flex flex-col items-center justify-center px-6 py-4 mx-auto">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Add email infomation
                </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input v-model="email.email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                            <input v-model="email.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required="">
                        </div>
                        <div>
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm name</label>
                            <select @change="selectFarm($event)"  name="farms" id="farm">
                                <option>---- Select Farm ----</option>
                                <option v-for="farm in allFarms" :key="farm.id" :value=farm.id >{{farm.name}}</option>
                            </select>
                        </div>
                        <!-- <div>
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm name</label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="location" required="">
                        </div> -->
                        <button @click=saveData()  type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center mt-[10px] w-full">
            <div class="overflow-x-auto flex justify-center">
                <div class="py-2 inline-block">
                    <div class="h-auto max-h-[300px] overflow-auto">
                        <table class=" bg-blue-100" >
                            <thead class="border border-solid rounded-lg bg-gray-300 ">
                                <tr class="h-[50px]">
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Email
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Farm id
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="(item) in allMails" :key="item.id">
                                <tr class="border-b">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{item.id}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                                        {{item.email}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                                        {{item.name}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                                        {{item.farm_id}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                                        <button @click="sendMail(item)" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium  rounded bg-blue-500">Send Mail</button>
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
    import VueToastr from "vue-toastr";
export default {
    props:{
        allFarms:{
            type: Array,
        }
    },
    data() {
        return {
            email :{
                email: "",
                name: "",
                farm_id: "" ,
            },
            allMails: [],
            errorForm: []
        }
    },
    mounted(){
        this.fetchData();
    },
    methods:{
        selectFarm(e){
            this.email.farm_id = e.target.value;
            console.log(e.target.value)
        },
        saveData(){
            this.errorForm = null;
            axios.post( '/register-receive-mail', this.email)
            .then((res )=> {
                console.log(res) ;
                this.fetchData();
                this.email = {} ;
            })
            .catch(err => {
                console.log(err.response.data.errors)
                this.errorForm = err.response.data.errors
            })
        },
        fetchData(){
            this.allMails = [];
            axios.get('/get-all-mails', {
                param: {
                    page: this.current_page ,
                }
            }).then((res) => {
                this.allMails = res.data 
            })
        },
        sendMail(item){
            axios.post('/test-email', item)
            .then((res) => {
                // this.allMails = res.data 
                this.$toastr.s('this mail is send', "SUCCESS MESSAGE");
            })
        }
    }
}
</script>

<style>

</style>
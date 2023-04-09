<template>
    <div>
        <div class="flex flex-col items-center justify-center px-6 mx-auto py-4 ">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
              Register Farm
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Add farm infomation
                    </h1>
                        <form class="space-y-4 md:space-y-6" action="#">
                            <div>
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Farm name </label>
                                <input v-model="farm.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required="">
                            </div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Farm Loaction</label>
                                <input v-model="farm.location" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="location" required="">
                            </div>
                            <button @click=saveData() type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center mt-[20px] w-full">
            <div class="overflow-x-auto flex justify-center">
                <div class="py-2 inline-block">
                    <div class="h-[300px] overflow-auto">
                        <table class=" bg-blue-100" >
                            <thead class="border border-solid rounded-lg bg-gray-300 ">
                                <tr class="h-[50px]">
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Location
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-[80px] text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-for="(item) in allFarms" :key="item.id">
                                <tr class="border-b">
                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900 text-center">{{item.id}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                                        {{item.name}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
                                        {{item.location}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap text-center">
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
    data() {
        return {
            farm :{
                name: "",
                location: "",
            },
            allFarms: [],
        }
    },
    mounted(){
        this.fetchData();
    },
    methods:{
        saveData(){
            this.errorForm = null;
            axios.post( '/register-farm', this.farm)
            .then((res )=> {
                console.log(res) ;
                // this.fetchData();
                this.farm = {} ;
            })
            .catch(err => {
                console.log(err.response.data.errors)
                this.errorForm = err.response.data.errors
            })
        },
        fetchData(){
            this.allFarms = [];
            axios.get('/get-all-farm', {
                param: {
                    page: this.current_page ,
                }
            }).then((res) => {
                this.allFarms = res.data 
            })
        },
    }

}
</script>

<style>

</style>
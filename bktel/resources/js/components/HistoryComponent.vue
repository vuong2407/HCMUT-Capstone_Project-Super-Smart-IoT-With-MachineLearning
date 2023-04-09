<template>
    <div>  
        <div class="mt-[30px] flex justify-center text-center"> 
            <span class=" font-bold text-[30px] "> 
                History 
            </span>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-[30px] mx-[10px]">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr >
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Product id
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Value
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Time Update
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody v-for="data in dataLM35" :key="data.id">
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{data.name}}
                        </th>
                        <td class="py-2 px-6">
                            {{data.device_id}}
                        </td>
                        <td class="py-2 px-6">
                            {{data.value}}
                        </td>
                        <td class="py-2 px-6">
                            {{data.timestamp}}
                        </td>
                        <td class="py-2 px-6">
                            <a href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete Row</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-[30px]"> 
            <nav aria-label="Page navigation example" class="flex flex-row justify-center">
                <ul class="inline-flex ">
                    <li>
                    <a href="#" class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
                </nav>
            <div class="flex flex-row justify-end mr-[40px]"> 
                <button class="w-[80px] bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded-[10px]">
                    Export
                </button>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    import firebase from '../../utl/firebase'
    export default {
    
        props:{

        },
        data() {
            return{
                dataLM35: [],
                // commandSelected: {},
            }
        },
        mounted(){
            this.fetchData();
        },
        methods:{
            fetchData(){
                this.dataLM35 = [],
                firebase.firestore.collection('dataLM35').get()
                .then(docs => {
                    docs.forEach(doc =>{
                        this.dataLM35.push({...doc.data(),...{docId:doc.id}})
                        // console.log({...doc.data(),...{docId:doc.id}})
                    })
                })
            },
            deleteData(command){
                this.commandSelected = command ;
                if(confirm('Are you sure delete?')){
                    firebase.firestore.collection('commands').doc(command.docId).delete()
                    .then(()=>{
                        alert('remove done')
                        this.commands.splice(this.commands.indexOf(this.commandSelected), 1) ;
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
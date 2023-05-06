<template>
    <div class="relative h-[92vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url(https://images.unsplash.com/photo-1621243804936-775306a8f2e3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80);">
        <div class="absolute bg-black opacity-40 inset-0 z-0"></div>
        <div class="sm:max-w-lg w-full p-[30px] bg-white rounded-xl z-10 scale-[95%]">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-gray-900">
                    File Upload!
                </h2>
                <p class="mt-2 text-sm text-gray-400">Put your leaf into here</p>
            </div>
            <div class="mt-3 space-y-3">
                <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Document</label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-5 group text-center">
                            <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                    <img v-if="!imageUrl" class="has-mask h-36 object-center"
                                        src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                        alt="freepik image">
                                    <img v-if="imageUrl" :src="imageUrl" style="max-width: 200px;">
                                </div>
                                <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here
                                    <br /> or <a id="" class="text-blue-600 hover:underline">select a
                                        file</a>
                                    from your computer
                                </p>
                            </div>
                            <input type="file" ref="fileInput" @change="previewImage($event)" class="hidden">
                        </label>
                    </div>
                </div>
                <p class="text-sm text-gray-300">
                    <span>File type: doc,pdf,types of images</span>
                </p>
                <div class=" space-y-2">
                    <label class="text-[12px] font-bold text-gray-800 tracking-wide">Result</label>
                    <div class="grid  grid-cols-2 gap-[10px] flex flex-row">
                        <div
                            class="flex justify-center items-center text-base h-[40px] border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <span>{{ result.name !== {} ? result.name : '' }}</span>
                        </div>
                        <div
                            class="flex justify-center items-center text-base h-[40px] border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                            <span>{{ result.disease !== {} ? result.disease : '' }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <button @click="uploadImage"
                        class="w-full flex justify-center bg-blue-500 text-gray-100 p-3 rounded-full tracking-wide
                                font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                        Upload
                    </button>
                </div>
                <div v-if="result.name !== ''"
                    class="flex flex-col bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative"
                    role="alert">
                    <span class="block sm:inline">I found from your {{ result.name }} leaf {{ result.disease }}
                        disease.</span>
                    <span class="block sm:inline">Do you want get information from chat GPT <span @click="chatWithGPT"
                            class="text-green-500 cursor-pointer">Yes</span>/No</span>
                </div>
            </div>
        </div>
        <div class="vl-parent">
            <Loading :active="isActive" :can-cancel="true" :on-cancel="onCancel" :is-full-page="fullPage"
                style="z-index: 1000;" />
        </div>
    </div>
</template>

<script >
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    props: {
        predictDiseaseUrl: {
            type: String,
        },
        redirectToChatGpt: {
            type: String,
        }
    },
    data() {
        return {
            imageFile: null,
            imageUrl: null,
            isActive: false,
            fullPage: true,
            result: { name: "", disease: "" },
        }
    },
    components: {
        Loading
    },
    methods: {
        chatWithGPT() {
            const url = '/chat-GPT';
            window.location.href = `${url}?name=${this.result.name}&disease=${this.result.disease}`;
        },
        onCancel() {
            this.isActive = false;
        },
        selectFile() {
            this.$refs.fileInput.click();
        },
        previewImage(event) {
            const file = event.target.files[0];
            this.imageFile = file;
            this.imageUrl = URL.createObjectURL(file);
            console.log(this.imageFile);
        },
        uploadImage() {
            const formData = new FormData();
            formData.append('file', this.imageFile);
            this.isActive = true;
            axios
                .post(this.predictDiseaseUrl, formData)
                .then((res) => {
                    console.log(res);
                    this.result = res.data;
                })
                .catch((err) => { })
                .finally(() => {
                    this.isActive = false;
                })
        }
    }
}
</script>
<style>
.has-mask {
    position: absolute;
    clip: rect(10px, 150px, 130px, 10px);
}
</style>
<template>
  <div class="w-full flex justify-center items-center mt-[50px] ">
        <!-- <div v-if="errors[title]" class="alert alert-danger">
            <ul>
                <li>{{ errors[title] }}</li>
            </ul>
        </div> -->
    <div class=""> 
        <form onsubmit="return false">
            <label for="title">Title</label>
            <input type="text" v-model="title" id="title" name="title" placeholder="Your Title.." >
    
            <label for="content">Content</label>
            <textarea v-model="content" id="content" name="content" placeholder="Write something.." style="height:200px"></textarea>
        <div class="flex justify-end">
            <button type="submit" @click="sendNotify()" class="w-[80px] bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded-[10px] ">
                Submit
            </button>
        </div>
    </form>
    </div>
</div>


</template>

<script>
export default {    
    props:{
        sendNotifyUrl: {
            type: String,
            default: '',
        }
    },
    data(){
        return {
            title: '',
            content: '' ,
            errors: [],
        }
    },
    methods: {
        sendNotify(){
            let formData = new FormData();
            formData.append('title', this.title);
            formData.append('content', this.content);
            axios.post(this.sendNotifyUrl, formData)
            .then(res => {
                console.log(res)
            })
            .catch((err) => {
                console.log(err)
                this.errors = err
            })

        }
    }

}
</script>

<style>
    /* Style inputs with type="text", select elements and textareas */
    input[type=text], select, textarea {
        width: 100%; /* Full width */
        padding: 12px; /* Some padding */
        border: 1px solid #ccc; /* Gray border */
        border-radius: 4px; /* Rounded borders */
        box-sizing: border-box; /* Make sure that padding and width stays in place */
        margin-top: 6px; /* Add a top margin */
        margin-bottom: 16px; /* Bottom margin */
        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
    }

    /* Style the submit button with a specific background color etc */
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* When moving the mouse over the submit button, add a darker green color */
    input[type=submit]:hover {
        background-color: #45a049;
    }

    /* Add a background color and some padding around the form */
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        width: 500px;
        margin: 0 auto;
    }
    .alert-danger { color: red}
</style>
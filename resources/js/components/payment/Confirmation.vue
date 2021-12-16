<template>
    <div class="container mt-5" align="center">
        <div style="background-color:#fcfcfc" class="p-4 shadow-sm">
            <img style="width:520px" src="https://i.imgur.com/LaHmYc2.jpeg" alt="sad animal">


            <b-table>
                
            </b-table>
        </div>
    </div>
</template>
<script>
export default {
    
    data(){
        return{

        }
    },
    methods:{

    },
    created(){
        console.log(this.$route.params)
    },
}
</script>
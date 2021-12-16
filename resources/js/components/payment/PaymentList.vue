<template>
    <div>
        <b-table striped hover :items="items"></b-table>
    </div>
</template>
<script>
export default ({
    data(){
        return{
            items:null,

        }
    },

    methods:{
        getAllCustomer(){
            this.axios.get('api/customer')
                .then(({data})=>{
                    this.items = data;
                })
                .catch(error => {
                console.log("error");
            })

        }
    },
    created(){
        this.getAllCustomer();
    },
})
</script>

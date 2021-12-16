<template>
    <div>
        <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Type to Search"
            ></b-form-input>

        <b-table striped hover 
            :items="items" 
            type="search"
            :filter="filter"
                  @filtered="onFiltered"
              ></b-table>
    </div>
</template>
<script>
export default ({
    data(){
        return{
            items:null,
            filter:null,
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

        },
         onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      }
    },
    created(){
        this.getAllCustomer();
    },
})
</script>

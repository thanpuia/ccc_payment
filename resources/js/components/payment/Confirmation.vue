<template>
    <div class="container mt-5" align="center">
   <div style="background-color:#fcfcfc" class="shadow-sm col-md-6">
       
      <div v-if="!paymentResponse.data.success">
         <h3>PAYMENT NOT YET AVAILABLE</h3>
      </div>
      <div v-if="paymentResponse.data.success">
          <h3>Payment Successful!</h3>
         <table class="table p-5 m-5" align="left">
            <tbody>
               <tr>
                  <td>Token</td>
                  <th scope="row">{{ paymentResponse.data.body.token }}</th>
               </tr>
               <tr>
                  <td>Name</td>
                  <th scope="row">{{ paymentResponse.data.body.name }}</th>
               </tr>
               <tr>
                  <td>Phone</td>
                  <th scope="row">{{ paymentResponse.data.body.mobile }}</th>
               </tr>
               <tr>
                  <td>Test</td>
                  <th scope="row">{{ paymentResponse.data.body.token }}</th>
               </tr>
               <tr>
                  <td>Amount</td>
                  <th scope="row">{{ paymentResponse.data.body.amount }}</th>
               </tr>
               <tr>
                  <td>Payment Date</td>
                  <th scope="row">{{ paymentResponse.data.body.created_at }}</th>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
</template>
<script>
export default {
    
    data(){
        return{
            paymentResponse:{},
            rr:"LLO",
            success:null,
        }
    },
    methods:{

    },
    created(){
        console.log(this.$route.params);
        this.paymentResponse = this.$route.params;
        this.success = this.paymentResponse.data.success;
    },
}
</script>
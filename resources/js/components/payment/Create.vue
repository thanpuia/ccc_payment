<template>
    <div>
          <div class="container mt-5">
        <div class="row">
            <div class="col">
                    <h3>New Customer</h3>

                <div style="background-color:#fcfcfc" class="p-4 shadow-sm">

                    <form action="">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control mb-3"  id="name">

                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control  mb-3"  id="mobile_number">

                        <label for="locality" class="form-label">Locality</label>
                        <input type="text" class="form-control mb-3"  id="locality">

                        <label for="city" class="form-label">Village/Town/City</label>
                        <input type="text" class="form-control mb-3"  id="city">

                        <label for="district" class="form-label">District</label>
                        <input type="text" class="form-control mb-3"  id="dictrict">

                        <label for="name" class="form-label">State</label>
                        <input type="text" class="form-control mb-3"  id="name">
                    </form>
                </div>
            </div>
            
            <div class="col">
                    <h3>Test</h3>
                    <div style="background-color:#fcfcfc" class="p-4 shadow-sm">
                        <div style="background-color:aquamarine" class="p-3">
                            <form action="">
                                <input type="checkbox"  id="free" name="free" value="free" @click="freeClick" >
                                <label for="free">Free</label>
                                <input v-if="freeModel" type="text" name="free-reason"  id="free-reason" placeholder="Reasons">
                                <hr>
                                <input type="checkbox"  id="pcr" name="pcr" value="pcr">
                                <label for="pcr">RT-PCR Test</label>

                                <input type="checkbox"  id="truenat" name="truenat" value="truenat">
                                <label for="truenat">Truenat Test</label>

                                <input type="checkbox"  id="rat" name="rat" value="rat">
                                <label for="rat">Rapit Antigen Test</label>
                                <br>
                                <input type="checkbox"  id="other" name="other" value="other" @click="otherFieldClick">
                                <label for="rat">Other Expenses</label>
                                <br>
                                <div class="row" v-if="otherField">
                                    <div class="col">
                                        <label for="otherName" class="form-label">Name</label>
                                        <input type="text" class="form-control mb-3"  id="otherName">
                                    </div>
                                    <div class="col">
                                        <label for="otherAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control mb-3"  id="otherAmount">
                                    </div>
                                </div>
                                <input type="checkbox"  id="stayingAtCCC" name="stayingAtCCC" value="stayingAtCCC" @click="stayingAtCCCClick">
                                <label for="stayingAtCCC" class="form-label">Staying at Covid Care Center (CCC)</label>

                                <div class="row" v-if="stayingAtCCCClickField">
                                    
                                    <div class="col">
                                       <v-date-picker v-model="cccRangeModel" is-range />
                                    </div>
                                    <div class="col">
                                        <label for="cccFood" class="form-label">Food</label>
                                        <input type="checkbox"  id="cccFood" name="cccFood" value="cccFood" @click="cccFoodClick">

                                    </div>
                                </div>

                            </form>
 
                        </div>
                        <div class="mt-2" style="font-size:22px">
                            Total Amount To Pay: ₹{{ amountToPay }}
                        </div>
                    </div>
                    
            </div> 
            <button type="button" class="btn btn-primary mt-4" style="background-color:#e65251;border:none;">Submit</button>
        </div>
    </div>
 
    </div>
</template>
<script>
export default {
    data(){
        return{
            freeModel:false,
            otherField:false,
            stayingAtCCCClickField:true,
            cccRangeModel:'',
            amountToPay:0,

            pcrRate:0,
            truenatRate:0,
            ratRate:0,
            foodRate:0,
            accomodationRate:0,
            rate:[{}],

        }
    },
    methods:{
        freeClick(){

            this.freeModel=!this.freeModel;

            console.log(this.freeModel);
        },
        otherFieldClick(){
            this.otherField=!this.otherField;

        },
        stayingAtCCCClick(){
            this.stayingAtCCCClickField=!this.stayingAtCCCClickField;

        },
        cccFoodClick(){

        },

        getTestingFees(){
            this.axios.get('api/rate/get')
            .then(({data}) => {
                // for(i=0;i<data.length;i++){
                //     this.rate.name = data.name;
                //     this.rate.rate = data.rate;
                // }
                console.log(this.rate);
            })
            .catch(error => {
                console.log("error");
            })
        },
    },
    created(){
        this.getTestingFees();
    },
    
}
</script>
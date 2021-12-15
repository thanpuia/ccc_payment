<template>
    <div>
          <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">

                <div style="background-color:#fcfcfc" class="p-4 shadow-sm">
                    <h3>New Customer</h3>

                  
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control mb-3"  id="name" v-model="formName">

                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control  mb-3"  id="mobile_number" v-model="formMobileNumber">

                        <label for="locality" class="form-label">Locality</label>
                        <input type="text" class="form-control mb-3"  id="locality" v-model="formLocality">

                        <label for="city" class="form-label">Village/Town/City</label>
                        <input type="text" class="form-control mb-3"  id="city" v-model="formCity">

                        <label for="district" class="form-label">District</label>
                        <input type="text" class="form-control mb-3"  id="dictrict" v-model="formDistrict">

                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control mb-3"  id="state" v-model="formState">

                        <label for="center" class="form-label">Center</label>
                        <input type="text" class="form-control mb-3"  id="center" v-model="center">
                    
                </div>
            </div>
            
            <div class="col-md-6">
                    <div style="background-color:#fcfcfc" class="p-4 shadow-sm">
                    <h3>Test</h3>

                        <div style="background-color:#f2f2f2" class="p-3">
                            <form action="">
                                <input type="checkbox"  id="free" name="free" value="free" @click="freeClick" v-model="formFree">
                                <label for="free">Free</label>
                                <input v-if="freeModel" type="text" name="free-reason"  id="free-reason" placeholder="Reasons">
                                <hr>
                                <input type="checkbox"  id="pcr" name="pcr" value="pcr" @click="pcrClick" v-model="formPcr">
                                <label for="pcr">RT-PCR Test</label>

                                <input type="checkbox"  id="truenat" name="truenat" value="truenat" @click="truenatClick" v-model="formTruenat">
                                <label for="truenat">Truenat Test</label>

                                <input type="checkbox"  id="rat" name="rat" value="rat" @click="ratClick" v-model="formRat">
                                <label for="rat">Rapit Antigen Test</label>
                                <br>
                                <input type="checkbox"  id="other" name="other" value="other" @click="otherFieldClick" >
                                <label for="other">Other Expenses</label>
                                <br>
                                <div class="row" v-if="otherField">
                                    <div class="col">
                                        <label for="otherName" class="form-label">Name</label>
                                        <input type="text" class="form-control mb-3"  id="otherName" v-model="formOtherName">
                                    </div>
                                    <div class="col">
                                        <label for="otherAmount" class="form-label">Amount</label>
                                        <input type="number" class="form-control mb-3"  id="otherAmount" v-model="formOtherExpense">
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn bg-color" @click="extraCalcClick">Calculate</button>                                    
                                    </div>
                                </div>
                                <input type="checkbox"  id="stayingAtCCC" name="stayingAtCCC" value="stayingAtCCC" @click="stayingAtCCCClick">
                                <label for="stayingAtCCC" class="form-label">Staying at Covid Care Center (CCC)
                                    
                                </label>
                                <p style="background-color:red">Calender days lak dan tur ka hre lo</p>
                                <div class="row" v-if="stayingAtCCCClickField">
                                    
                                    <div class="col">
                                       <v-date-picker mode="range" v-model="cccRangeModel" is-range />
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
                            <!-- <br>Days: {{ cccRangeModel.days }}
                            <br>Start: {{ cccRangeModel.start }} -->
                        </div>
                        

                        

                    </div>
                    <div style="background-color:#fcfcfc" class="p-4 shadow-sm mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="iName" class="form-label">Issuer Name (Optional)</label>
                                    <input type="text" class="form-control mb-3"  id="iName" v-model="iName">
                                </div>
                                <div class="col-md-4">
                                    <label for="iDesignation" class="form-label">Issuer Designation (Optional)</label>
                                    <input type="text" class="form-control mb-3"  id="iDesignation" v-model="iDesignation">
                                </div>
                                <div class="col-md-4">
                                    <label for="iAddress" class="form-label">Issuer Office Address (Optional)</label>
                                    <input type="text" class="form-control mb-3"  id="iAddress" v-model="iAddress">
                                </div>
                            </div>
                            
                    </div>
            </div> 
            <button type="button" class="btn mt-4 bg-color" @click="submitForm" >Submit</button>
        </div>
    </div>
 
    </div>
</template>
<style>
    
  
      .bg-color{
        color: #fff;
        background-color: #e65251;
        border:none;
    }
</style>
<script>
export default {
    data(){
        return{
            freeModel:false,
            otherField:false,
            formOtherExpense:0,
            stayingAtCCCClickField:false,
            cccRangeModel:{},
            amountToPay:0,

            pcrRate:0,
            truenatRate:0,
            ratRate:0,
            foodRate:0,
            accomodationRate:0,
            
            pcrBoolean:false,
            ratBoolean:false,
            truenatBoolean:false,
            foodBoolean:false,
            accomodationBoolean:false,
            tempAmount:0,

            stayingDay:0,

            formName:'',
            formMobileNumber:'',
            formLocality:'',
            formCity:'',
            formDistrict:'',
            formState:'',
            formCenter:'',

            formFree:false,
            formOtherExpense:'',
            formOtherName:'',
            
            formPcr:false,
            formTruenat:false,
            formRat:false,
            iName:'',
            iDesignation:'',
            iAddress:'',

            formSubmitObject:{},


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
        pcrClick(){
            this.pcrBoolean = !this.pcrBoolean;
            if(this.pcrBoolean)
                this.amountToPay = this.pcrRate +this.amountToPay;
            else
                this.amountToPay = this.amountToPay -this.pcrRate ;

        },
        truenatClick(){
            this.truenatBoolean = !this.truenatBoolean;
             if(this.truenatBoolean)
                this.amountToPay = this.truenatRate +this.amountToPay;
            else
                this.amountToPay = this.amountToPay -this.truenatRate;
        },
        ratClick(){
            this.ratBoolean = !this.ratBoolean;
             if(this.ratBoolean)
                this.amountToPay = this.ratRate +this.amountToPay;
            else
                this.amountToPay = this.amountToPay - this.ratRate;
        },
      
        getTestingFees(){
            this.axios.get('api/rate/get')
            .then(({data}) => {
               
                console.log(this.rate);

    /*
    NOTE:-
    0.PCT | 1. Truenat | 2. RAT | 3.Food | 4. Accomodation
    This is how it is ordered in the database, its easier
    */
                this.pcrRate=parseInt(data[0].rate);
                this.truenatRate=parseInt(data[1].rate);
                this.ratRate=parseInt(data[2].rate);
                this.foodRate = parseInt(data[3].rate);
                this.accomodationRate=parseInt(data[4].rate);
            })
            .catch(error => {
                console.log("error");
            })
        },
        extraCalcClick(){
            //this.amountToPay = this.formOtherExpense - this.tempAmount;


            this.amountToPay = parseInt(this.amountToPay) + parseInt(this.formOtherExpense) - parseInt(this.tempAmount);

            this.tempAmount = parseInt(this.formOtherExpense);

        },
        submitForm(){
            this.formSubmitObject.name = this.formName;
            this.formSubmitObject.mobileNumber = this.formMobileNumber;
            this.formSubmitObject.locality = this.formLocality;
            this.formSubmitObject.city = this.formCity;
            this.formSubmitObject.district = this.formDistrict;
            this.formSubmitObject.state = this.formState;

            this.formSubmitObject.free = this.formFree;
            this.formSubmitObject.pcr = this.formPcr;
            this.formSubmitObject.truenat = this.formTruenat;
            this.formSubmitObject.rat = this.formRat;
            this.formSubmitObject.otherName = this.formOtherName;
            this.formSubmitObject.otherExpense = this.formOtherExpense;


            this.formSubmitObject.iname = this.formName;
            this.formSubmitObject.iDesignation = this.formCity;
            this.formSubmitObject.iAddress = this.formName;

            this.formSubmitObject.amountToPay = this.amountToPay;

            axios.post('api/customer/create',{
                body:this.formSubmitObject
            })
            .then(response =>{

            })
            .catch(e=>{

            })
        },
    },
    created(){
        this.getTestingFees();
    },
    
}
</script>
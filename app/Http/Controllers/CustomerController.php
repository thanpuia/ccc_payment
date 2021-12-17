<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\RModels\ate;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Carbon\Carbon;

class CustomerController extends Controller
{
    private $returnURL ="http://localhost:8000/payment-return";
    /*
    public function index()
    {
        $centers = Center::all();
        $customers = Customer::orderBy('created_at',"DESC")->get();

        $customerArr = $customers->toArray();
  
        Excel::store(new ExcelExport($customerArr), 'tempCustomers.xlsx');
        //Product::where('id',$id)->sum('quantity');
        $amount = Customer::sum('amount');

        $customerCount = $customers->count();
        $pcrCount = Customer::where("pcr",1)->count();
        $ratCount = Customer::where("rat",1)->count();
        $truenatCount = Customer::where("truenat",1)->count();
        $centerName = "All";
        $fromDate = "none";
        $toDate = "none";
        
        return view ('customer.index',compact('customers','customerCount','pcrCount','ratCount','truenatCount','centers','centerName','fromDate','toDate','amount'));

    }
    */
    public function index()
    {
       return Customer::all();
    }
    
    public function create()
    {
        $rates = Rate::all();
        $centers = Center::all();
       return view('customer.create',compact('rates','centers'));
    }
    /*
    TODO::THIS IS POST SENT TO store()

    {"body":{
        "name":"Lalthanpuia","mobileNumber":"8765","locality":"Electric",
        "city":"Aizawl","district":"Aizawl","state":"Mizoram","free":false,"freeReason":"df",
        "pcr":true,"truenat":true,"rat":true,"otherName":"OtherName","otherExpense":"77",
        "iname":"Lalthanpuia","iDesignation":"Aizawl","iAddress":"Lalthanpuia","amountToPay":377}}
    */
/*
    TODO::THINGS TO REMEMBER : THIS IS THE OLD ONE

    
    public function store(Request $request)
    {
       

        $customer = new Customer();  
        $customer->token= Str::random(8);
        
        if(Auth::user()){
            $customer->user_id = Auth::user()->id;
        }else{

        }
        $customer->amount = $request['amountToPay'];
        $customer->name = $request['name'];
        $customer->locality = $request['locality'];
        $customer->city = $request['city'];
        $customer->district = $request['district'];
        $customer->state = $request['state'];
        $customer->mobile = $request['mobileNumber'];
        $customer->center = $request['center'];

        if($request['pcr']=="false")   
            $customer->pcr = false;
        else
            $customer->pcr = true;

        if($request['truenat']=="false")   
            $customer->truenat = false;
        else
            $customer->truenat = true;

        if($request['rat']=="false")   
            $customer->rat = false;
        else
            $customer->rat = true;
        
        if($request['ccc']=="false")   
            $customer->ccc = false;
        else
            $customer->ccc = true;

        $customer->other= $request['other'];
        
        $customer->ccc_days = $request['ccc_days'];
        $customer->ccc_start = $request['ccc_start'];
        $customer->ccc_end = $request['ccc_end'];
        $customer->issuer_name = $request['iname'];
        $customer->issuer_designation = $request['iDesignation']; 
        $customer->issuer_office_address = $request['iAddress'];
 
        $customer->reason = $request['reason'];

        if($request['free']=="false")   
            $customer->free = false;
        else
            $customer->free = true;

        $customer->save();

        $user = Auth::user(); 
        $REDIRECT_URL = $this->returnURL;
        $CANCEL_URL = $this->returnURL;
        
        $merchant_data='2';
        $working_key='37058F2ADEA578726A2E5928EA39BA16';  //'E2B122A0140C55090B17A284925A0465';//Shared by CCAVENUES
	    $access_code='AVDN04IC25AQ18NDQA';//'AVVM67DI04BP90MVPB';//Shared by CCAVENUES
	
        $data = $request->except('_token');
        $data = $request->except('my_file');
        $d = Carbon::now()->timestamp; // Produces something like 1552296328
        $last4phone = substr($user->contact, -4);
        $merchant_data.='tid'.'='.$d.'&';
        $merchant_data.='merchant_id=348507&';
        $merchant_data.='order_id'.'='.$d.$last4phone.'&';
        $merchant_data.='amount='. $request['amount'] .'&';
        $merchant_data.='currency=INR&';
        $merchant_data.='redirect_url='.$REDIRECT_URL.'&';
        $merchant_data.='cancel_url='.$CANCEL_URL.'&';
        $merchant_data.='language=EN&';
        
        $merchant_data.='billing_name'.'='.$user->name.'&';
        $merchant_data.='billing_tel'.'='.$customer->mobile.'&';
        $merchant_data.='billing_email'.'='.$user->email.'&';

        foreach($data as $key => $value){
            $merchant_data.=$key.'='.$value.'&';
        }
        //26 => "merchant_param1=“.     ->department ID
        $merchant_data.='merchant_param1'.'='.$customer->id.'&';
        $encrypted_data = $this->encrypt($merchant_data,$working_key);
        return view('payment.myCcavRequestHandler',compact('encrypted_data','access_code'));
     
       
       
    }*/
    public function store(Request $request)
    {
        error_log($request->name);
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'mobileNumber'=>'required',
            'locality'=>'required',
            'city'=>'required',
            'district'=>'required',
            'state'=>'required',
            'center'=>'required',
        ]);

        if($validator->fails()){
            error_log("I Fail");

        // return "FAIL";
        }else{
            error_log("I succeedd");
        //    return "SUCCESS";
        }
        error_log($request['free']);

        if($request->free){

            $customer = new Customer();
            $customer->token= Str::random(8);

            $customer->amount = $request['amountToPay'];
            $customer->name = $request['name'];
            $customer->locality = $request['locality'];
            $customer->city = $request['city'];
            $customer->district = $request['district'];
            $customer->state = $request['state'];
            $customer->mobile = $request['mobileNumber'];
            $customer->center = $request['center'];

            $customer->pcr = $request['pcr'];
            $customer->truenat = $request['truenat'];
            $customer->rat = $request['rat'];

            $customer->issuer_name = $request['iname'];
            $customer->issuer_designation = $request['iDesignation']; 
            $customer->issuer_office_address = $request['iAddress'];

            //CCC STAYING TODO:

            $current_timestamp = Carbon::now()->timestamp;
            $random_number = Str::random(4);
            $customer->token = $random_number."_".$current_timestamp;

            $customer->free = $request['free'];
            $customer->reason = $request['freeReason'];

            if($request['otherExpenseCheckbox']){
                $customer->other_expense = $request['otherExpense'];
                $customer->other_name = $request['otherName'];
            }
            $customer->save();
            //return $customer;
            return response()->json([
                'success' => true,
                'body' => $customer
            ]);

        }else{
            return response()->json([
                'success' => false,
                'body' => "PAYMENT NOT YET AVAILABLE",
            ]);

        }
    }
 
    public function show(Customer $customer)
    {  
        $customer = Customer::find($customer['id']);

        return view('customer.show',compact('customer'));
    }

    
    public function edit(Customer $customer)
    {
        $customer = Customer::find($customer['id']);

        return view('customer.edit',compact('customer'));
    }

     
    public function update(Request $request, Customer $customer)
    {
        $customer = Customer::find($customer['id']);

        $customer->amount = $request['amount'];
        $customer->name = $request['name'];
        $customer->locality = $request['locality'];
        $customer->city = $request['city'];
        $customer->district = $request['district'];
        $customer->state = $request['state'];
        $customer->mobile = $request['mobile'];
        $customer->center = $request['center'];
        $customer->other= $request['other'];

        if($request['pcr']!='false')   
            $customer->pcr = false;
        else
            $customer->pcr = true;

        if($request['truenat']=='false')   
            $customer->truenat = false;
        else
            $customer->truenat = true;

        if($request['rat']=='false')   
            $customer->rat = false;
        else
            $customer->rat = true;
        
        if($request['ccc']=='false')   
            $customer->ccc = false;
        else
            $customer->ccc = true;

      //  $customer->ccc = $request['ccc'];
        $customer->ccc_days = $request['ccc_days'];
        $customer->ccc_start = $request['ccc_start'];
        $customer->ccc_end = $request['ccc_end'];
        $customer->issuer_name = $request['issuer_name'];
        $customer->issuer_designation = $request['issuer_designation']; 
        $customer->issuer_office_address = $request['issuer_office_address'];

        $customer->save();

        //return redirect("/customer/$customer->id")->withSuccess(trans('Update successfully'));
        return true;
    }

   
    public function destroy(Customer $customer)
    {
        Customer::withTrashed()->find($customer['id'])->delete();
        return redirect('customer'); 
    }
}

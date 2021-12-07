@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <h3>New Customer</h3>
            <div class="col">
                <div style="background-color:#fcfcfc" class="p-4 shadow-sm">

                    <form action="">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control mb-3" id="name">

                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control  mb-3" id="mobile_number">

                        <label for="locality" class="form-label">Locality</label>
                        <input type="text" class="form-control mb-3" id="locality">

                        <label for="city" class="form-label">Village/Town/City</label>
                        <input type="text" class="form-control mb-3" id="city">

                        <label for="district" class="form-label">District</label>
                        <input type="text" class="form-control mb-3" id="dictrict">

                        <label for="name" class="form-label">State</label>
                        <input type="text" class="form-control mb-3" id="name">
                    </form>
                </div>
            </div>
            
            <div class="col bbb">
                    <div style="background-color:#fcfcfc" class="p-4 shadow-sm">

                            <form action="">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control mb-3" id="name">
        
                                <label for="mobile_number" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control  mb-3" id="mobile_number">
        
                                <label for="locality" class="form-label">Locality</label>
                                <input type="text" class="form-control mb-3" id="locality">
        
                                <label for="city" class="form-label">Village/Town/City</label>
                                <input type="text" class="form-control mb-3" id="city">
        
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control mb-3" id="dictrict">
        
                                <label for="name" class="form-label">State</label>
                                <input type="text" class="form-control mb-3" id="name">
                            </form>
                        </div>
            </div>
        </div>
    </div>

@endsection


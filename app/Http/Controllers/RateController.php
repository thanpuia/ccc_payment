<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
     
    public function index()
    {
        $rates = Rate::all();
        return view('rate.index',compact('rates'));
    }
 
    public function create()
    {
        
    }
 
    public function store(Request $request)
    {
       
    }
 
    public function show(Rate $rate)
    {
        $rate = Rate::find($rate['id']);
        return view('rate.show',compact('rate'));
    }

    public function edit(Rate $rate)
    {
        $rate = Rate::find($rate['id']);
        return view('rate.edit',compact('rate'));
    }
 
    public function update(Request $request, Rate $rate)
    {
        
    }
 
    public function destroy(Rate $rate)
    {
         
    }
}

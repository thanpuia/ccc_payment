<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
     
    public function index()
    {
        $centers = Center::all();
        
        return view('center.index',compact('centers'));
    }

     
    public function create()
    {
        return view('center.create');
    }

   
    public function store(Request $request)
    {
        $center = new Center();
        $center->name = $request['name'];
        $center->locality = $request['locality'];
        $center->district = $request['district'];
        $center->remarks = $request['remarks'];
        $center->code = $request['code'];
        $center->password = $request['password'];

        $center->save();

        // return view('center.index')->withSuccess(trans('Center created successfully'));
        return redirect('/center');
    }

    / 
    public function show(Center $center)
    {
        //
    }

     
    public function edit(Center $center)
    {
        $center = Center::find($center['id']);
        return view('center.edit',compact('center'));
    }

     
    public function update(Request $request, Center $center)
    {
        $center = Center::find($center['id']);
        
        $center->name = $request['name'];
        $center->locality = $request['locality'];
        $center->district = $request['district'];
        $center->remarks = $request['remarks'];
        $center->code = $request['code'];
        $center->password = $request['password'];

        $center->save();

      //  return view('center.index')->withSuccess(trans('Center update successfully'));
       return redirect("/center")->withSuccess(trans('Center update successfully'));
    }
 
    public function destroy(Center $center)
    {
        //
    }

    public function code(Request $request)
    {
        $code = $request['code'];
        $password = $request['password'];

        $center = Center::where("code",$code)->where("password",$password)->first();

        if($center==null)
        return false;
        else
        return true;
    }
}

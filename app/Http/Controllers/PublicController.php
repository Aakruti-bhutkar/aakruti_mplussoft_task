<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use Auth;
use Hash;

class PublicController extends Controller
{
    public function getHome(){
    	return view('auth.login');
    }

    public function getRegister(){
    	return view('register');
    }

    public function postRegister(Request $request){

    	$data = new User();
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->contact_number = $request->contact_number;
    	$data->password = Hash::make($request->password);
    	$data->address = $request->address;
    	$data->save();

    	return $data;
    }

    public function getAllUser(){
    	return view('user.all');
    }

    public function getAllData(){
    	$user = User::where('designation', 2)->get();
    	return DataTables::of($user)->make(true);
    }
    // public function getAllPackages(){

    // 	$user = Auth::User();
    // 	$package = Package::get();
    // 	return view('package/all')->with('user', $user)->with('package', $package);
    // }

    // public function getAddPackages(){
    // 	return view('package.add');
    // }

    // public function getAllData(){

    // 	$package = Package::get();
    // 	return DataTables::of($package)->make(true);
    // }

    // public function postAddPackages(Request $request){

    // 	$data = new Package();
    //     $data->title = $request->title;
    //     $data->price = $request->price;
    //     $data->details = $request->details;
    //     $data->package_duration = $request->package_duration;
    //     $data->image = $request->image;
    //     if($request->hasFile('image')){
    //         $image=$request->image;
    //         $path=$image->store('image');
    //         $data->image=$path;
    //     }
    //     $data->save();   

    // 	return redirect('package/all');
    // }

    // public function getPackageDetails(Request $request, $package_id){

    // 	$data = Package::where('package_id', $package_id)->first();
    // 	return view('package.edit')->with('data', $data);
    // }

    // public function postUpdatePackages(Request $request, $package_id){

    // 	$data = Package::find($package_id);
    //     $data->title = $request->title;
    //     $data->price = $request->price;
    //     $data->details = $request->details;
    //     $data->package_duration = $request->package_duration;
    //     if (isset($request->image)) {
        	
    //     	if($request->hasFile('image')){
	   //          $image=$request->image;
	   //          $path=$image->store('image');
	   //          $data->image=$path;
	   //      }
    //     }
        
    //     $data->save();   

    // 	return redirect('package/all');
    // }

    
}

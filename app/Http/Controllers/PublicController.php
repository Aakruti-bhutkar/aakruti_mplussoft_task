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
    
}

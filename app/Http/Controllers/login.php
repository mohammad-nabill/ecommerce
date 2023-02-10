<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class login extends Controller
{

    function login(){
         
         
    	 $this->validate(request(),[
         'email'=>'required|email',
         'password'=>'required',
    	]);
        
        if(auth()->guard('user')->attempt( ['email'=>request('email') , 'password'=>request('password') ] )){
        	return redirect('home');
        }else{
        	session()->flash('wrong_info','Wrong email or password');
        	return back();
        }
    	

    }



    function logout(){
    	session()->flush();
    	auth()->guard('user')->logout();
    	return redirect('home');
    }

}

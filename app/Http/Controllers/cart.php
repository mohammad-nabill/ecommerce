<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cart extends Controller
{
   
   function main(){


session()->push('id',request('id'));

/*
    if(session()->get('counter')){
        $counter = session()->get('counter');
        $counter++;
        session()->put('counter',$counter);
    }else{
        session()->put('counter',1);
        $counter = 1 ; 
    }
*/
//session()->flush();

$counter = request('id');
session()->put('id'.$counter,request('id'));
session()->put('name'.$counter,request('name'));
session()->put('description'.$counter,request('description'));
session()->put('price'.$counter,request('price'));
session()->put('trader'.$counter,request('trader'));
session()->put('quantity'.$counter,request('quantity'));
session()->put('pic'.$counter,request('pic'));


    return view('ecom/cart');
   }
}

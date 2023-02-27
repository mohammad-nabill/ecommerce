<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart_m;
use App\Models\products;


class cart extends Controller
{
   
   function main(){

if( session()->get('id') ){
if ( in_array( request('id'), session()->get('id') ) ){ return view('ecom/cart'); }
}

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


////////////////////////////////////////////////////////////////////////////////////////////////

    function add(){
    
        
   
    foreach (session()->get('id') as $id ) {

          $obj2 = new products;
          $data = $obj2->find($id);
          $new_quantity = $data->quantity - request('qty'.$id);
          $data->update(['quantity'=>$new_quantity]);

          $obj = new cart_m;
          $obj->product_id = request('id'.$id);
          $obj->quantity = request('qty'.$id);
          $obj->price = request('price'.$id);
          $obj->trader = request('trader'.$id);
          $obj->customer = auth()->guard('user')->user()->id ;

          $obj->save();

     }

     foreach (session()->get('id') as $id ) {

         session()->forget('id'.$id);
         session()->forget('name'.$id);
         session()->forget('description'.$id);
         session()->forget('price'.$id);
         session()->forget('trader'.$id);
         session()->forget('quantity'.$id);
         session()->forget('pic'.$id);

     }
      

      session()->forget('id');

      session()->flash('addedToCart','added to cart successfully');

      return redirect('home');
        

    

    }

///////////////////////////////////////////////////////////////////////////

    function stock(){

       $obj = new cart_m;

       $data = $obj->where('customer',auth()->guard('user')->user()->id)->get();

        return view('ecom/stock',compact('data'));
    }

//////////////////////////////////////////////////////////////////////

    function orders(){

       $obj = new cart_m;

       $data = $obj->where('trader',auth()->guard('user')->user()->id)->get();

      return view('ecom/orders',compact('data'));
    }
    //////////////////////////////////////////////////////////////////////

    function delivered (){
      
      $obj = new cart_m;
      $obj->find(request('id'))->delete();
      return back();


    }


}

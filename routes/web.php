<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});


route::get('home','App\Http\Controllers\product@index');

route::get('category','App\Http\Controllers\product@cat');

/////////// check if not auth ////////////////
route::group(['middleware'=>'addProduct'],function(){

route::resource('product','App\Http\Controllers\product');
route::view('add','ecom/addproduct');

});
///////////////////////////////////////////

/////////// check if auth ////////////////

route::group(['middleware'=>'checkAuth'],function(){

route::resource('register','App\Http\Controllers\user');

route::view('login','ecom/login');
route::post('login','App\Http\Controllers\login@login');
});
////////////////////////////////////


///////////////// logout ////////////////

route::get('logout','App\Http\Controllers\login@logout');
///////////////////////////////////////////

///////////////////////////// cart ///////////////////////

route::view('cart','ecom/cart');

route::post('cart','App\Http\Controllers\cart@main');

route::group(['middleware'=>'loged'],function(){
route::get('storeCart', 'App\Http\Controllers\cart@add' );	
route::get('stock','App\Http\Controllers\cart@stock');
});



route::get('cancel',function(){
	
$id = request('id');

$tarray = session()->pull('id');
unset( $tarray[$id] );
session()->put('id', $tarray);

return redirect('cart');

});







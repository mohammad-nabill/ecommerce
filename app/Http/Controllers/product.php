<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class product extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function cat()
    {
        $obj = new products;
        $data = $obj->where('category',request('cat'))->orderBy('created_at' , 'desc')->get();
        return view('ecom/category',compact('data') );
    }


public function myProduct()
    {
        $obj = new products;
        $data = $obj->where('trader', auth()->guard('user')->user()->id )->get();
        return view('ecom/products',compact('data') );
    }



    public function index()
    {
        $obj = new products;
        $data = $obj->orderBy('created_at' , 'desc')->get();
        return view('ecom/home',compact('data') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "welcome from create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      $data = $this->validate(request(),[
         'name'=>'required',
         'description'=>'required | max:330',
         'pic'=>'required | image',
         'price'=>'required | numeric',
         'trader'=>'required',
         'category'=>'required',
         'quantity'=>'required | integer'

      ]);

       $pic = request()->file('pic');
       $picName = time() . "." . $pic->extension();
       $pic->move('products',$picName);
       $data['pic'] = $picName;  
      
       $obj=new products;
       $obj->create($data);

       session()->flash('message','product added successfully');
       return redirect('add');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "welcome from show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "welcome from edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "welcome from update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "welcome from destroy";
    }
}

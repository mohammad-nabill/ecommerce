<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_m extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $fillable = ['product_id' , 'quantity' , 'price' , 'trader' , 'customer' ];

   function product_info(){
        return $this->hasone(products::class,'id','product_id');
    }


    
}

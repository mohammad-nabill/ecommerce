<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable= ['name','description','pic','price','category','trader','quantity'];

    function traderName(){
    	return $this->hasone( users::class ,'id','trader');
    }
}

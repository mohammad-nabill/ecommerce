<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\users;

class ajax extends Controller
{

       public function check_email()
    {

        $obj = new users;
        $data = $obj->get();

        

         foreach ($data as $key => $value) {


             if($value->email == request('name')){
            echo "email is already exist";
             }else{
            echo "" ;
          
        
        }


         }

    }

}
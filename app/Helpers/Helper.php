<?php

namespace App\Helpers;

class Helper{
    public static function IDGenerator($model){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            return  $data->id;
            }
       
    }
  
}










?>

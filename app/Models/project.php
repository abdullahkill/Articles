<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
   
    public function project_detail(){
        return $this->hasMany('App\Models\project_detail');
    }
}

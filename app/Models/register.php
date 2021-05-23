<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;
    public function project_detail(){
        return $this->hasMany('App\Models\project_detail');
    }
    public function applied_task(){
        return $this->hasMany('App\Models\applied_task');
    }
   
}

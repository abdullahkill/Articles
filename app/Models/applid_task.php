<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applid_task extends Model
{
    public function appliedwriter(){
        return $this->hasMany('App\Models\appliedwriter');
    }
    
    public  function register(){
        return $this->belongsTo('App\Models\register');
    }
    public  function project(){
        return $this->belongsTo('App\Models\project');
    }
    public  function project_detail(){
        return $this->belongsTo('App\Models\project_detail');
    }
    use HasFactory;
}

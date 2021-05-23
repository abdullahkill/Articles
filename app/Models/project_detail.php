<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_detail extends Model
{
    use HasFactory;
    public function applied_task(){
        return $this->hasMany('App\Models\applied_task');
    }
    public  function register(){
        return $this->belongsTo('App\Models\register');
    }
    public  function project(){
        return $this->belongsTo('App\Models\project');
    }
    
    
}

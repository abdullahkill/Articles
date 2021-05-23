<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appliedwriter extends Model
{
    
    public  function category(){
        return $this->belongsTo('App\Models\category');
    }
    
    public  function applid_task(){
        return $this->belongsTo('App\Models\applid_task');
    }
    use HasFactory;
}

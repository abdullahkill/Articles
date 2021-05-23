<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function appliedwriter(){
        return $this->hasMany('App\Models\appliedwriter');
    }
    use HasFactory;
}

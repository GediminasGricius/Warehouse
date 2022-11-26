<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Warehouse extends Model
{
    use HasFactory;


    public function products(){
        return $this->hasMany(Product::class);
    }

    public function scopeMyWarehouses($query){
        if (Auth::user()==null){
            abort(403);
        }
        return $query->where('user_id', Auth::user()->id);

    }
}


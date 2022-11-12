<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeSearch($query, $search){
        if ($search!==null){
            $query->where('name','like',"%$search%");
        }
        return $query;

    }


    public function scopeFromWarehouse($query, $warehouseId){
        if ($warehouseId!==null){
            $query->where('warehouse_id',$warehouseId);
        }
        return $query;
    }


}

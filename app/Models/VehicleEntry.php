<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleEntry extends Model
{
    use HasFactory;

    public function commodity_details()
    {
        return $this->hasMany(CommodityDetail::class);
    }
}

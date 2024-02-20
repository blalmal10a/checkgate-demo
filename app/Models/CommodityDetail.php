<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommodityDetail extends Model
{
    use HasFactory;

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }


    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function measurement_unit()
    {
        return $this->belongsTo(MeasurementUnit::class);
    }
}

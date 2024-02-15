<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }


    public function vehicle_check()
    {
        return $this->belongsTo(VehicleCheck::class);
    }
}

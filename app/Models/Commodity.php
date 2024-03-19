<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
    public function measurement_unit()
    {
        return $this->belongsTo(MeasurementUnit::class);
    }
}

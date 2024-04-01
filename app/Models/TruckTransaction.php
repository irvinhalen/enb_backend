<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'truck_id',
        'site_id',
        'in',
        'out',
        'soil_amount',
        'in_time',
        'out_time'
    ];
}

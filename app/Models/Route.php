<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'km', 'time', 'km_time'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

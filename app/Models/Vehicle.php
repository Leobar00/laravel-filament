<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',  // Ensure this is included
        'name',
        'year',
        'brand',
        'fuel',
        'km'
    ];


    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

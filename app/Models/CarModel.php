<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'make_id'
    ];

    public function make ()
    {
        return $this->belongsTo(Make::class, 'make_id', 'id');
    }

    public function cars ()
    {
        return $this->hasMany(Car::class);
    }
}

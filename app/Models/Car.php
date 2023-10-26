<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'condition',
        'make_id',
        'model_id',
        'mileage',
        'year',
        'exterior_color',
        'fuel_type',
        'transmission',
        'steering',
        'drive',
        'engine',
        'sales_price',
        'seller_notes'
    ];

    public function make ()
    {
        return $this->belongsTo(Make::class, 'make_id', 'id');
    }

    public function car_model ()
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }
}

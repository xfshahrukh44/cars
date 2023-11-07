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
        'seller_notes',
        'reference_link',
        'body_type'
    ];

    public function make ()
    {
        return $this->belongsTo(Make::class, 'make_id', 'id');
    }

    public function model ()
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }

    public function car_images ()
    {
        return $this->hasMany(CarImage::class);
    }

    public function feature_image ()
    {
        return $this->car_images()->count() > 0 ? (url('storage/images/cars') . '/' . $this->car_images()->first()->url) : asset('images/cars/no-image.jpg');
    }

    public function images_array ()
    {
        if ($this->car_images()->count() == 0) {
            return [
                asset('images/cars/no-image.jpg'),
            ];
        }

        $array = [];
        foreach ($this->car_images as $car_image) {
            $array []= (url('storage/images/cars') . '/' . $car_image->url);
        }

        return $array;
    }
}

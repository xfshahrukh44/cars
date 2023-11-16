<?php

use App\Models\Car;
use Illuminate\Support\Str;

function get_car_slug ($title) {
    $slug = Str::slug($title);
    $count = 0;

    while ($check = Car::where('slug', $slug)->where('title', '!=', $title)->first()) {
        $slug = str_replace(('_' . strval($count)), '', $slug);
        $count += 1;
        $slug .= ('_' . strval($count));
    }

    return $slug;
}

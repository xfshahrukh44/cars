<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::truncate();

        foreach (json_decode(file_get_contents(asset('documents/output.json'))) as $car) {
            try {
                $created_car = Car::create([
                    'title' => $car->title,
                    'location' => $car->location,
                    'condition' => $car->condition,
                    'mileage' => $car->mileage,
                    'year' => $car->year,
                    'exterior_color' => $car->exterior_color,
                    'fuel_type' => $car->fuel_type,
                    'transmission' => $car->transmission,
                    'steering' => $car->steering,
                    'drive' => $car->drive,
                    'sales_price' => $car->sales_price,
                    'seller_notes' => $car->seller_notes,
                ]);

                foreach ($car->car_images as $car_image_url) {
                    $extension = pathinfo(parse_url($car_image_url, PHP_URL_PATH), PATHINFO_EXTENSION);
                    $name = uniqid() . '.' . $extension;

                    // Download the image
                    $response = Http::get($car_image_url);

                    // Check if the request was successful (status code 2xx)
                    if ($response->successful()) {
                        // Store the image
                        Storage::put('public/images/cars/' . $name, $response->body());

                        // Create a record in the database
                        CarImage::create(['car_id' => $created_car->id, 'url' => $name]);
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}

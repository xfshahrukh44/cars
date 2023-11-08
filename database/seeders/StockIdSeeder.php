<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class StockIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_records = json_decode(file_get_contents(asset('documents/stockIds.json')));

        foreach ($car_records as $car_record) {
            if (!$car = Car::where('title', 'LIKE', '%'.$car_record->title.'%')->first()) {
                continue;
            }

            $car->stock_id = $car_record->stock_id;
            $car->save();
        }
    }
}

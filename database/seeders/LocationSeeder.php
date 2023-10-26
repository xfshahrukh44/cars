<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();
        Location::insert([
            [ 'name' => 'Germany' ],
            [ 'name' => 'Japan' ],
            [ 'name' => 'South' ],
            [ 'name' => 'Singapore' ],
            [ 'name' => 'Thailand' ],
            [ 'name' => 'UAE' ],
            [ 'name' => 'UK' ],
        ]);
    }
}

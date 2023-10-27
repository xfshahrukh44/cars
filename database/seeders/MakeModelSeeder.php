<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\Make;
use Illuminate\Database\Seeder;

class MakeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Make::truncate();
        CarModel::truncate();

        Make::insert([
            [ 'name' => 'Acura' ],
            [ 'name' => 'Audi' ],
            [ 'name' => 'BMW' ],
            [ 'name' => 'KIA' ],
            [ 'name' => 'Lamborghini' ],
            [ 'name' => 'Nissan' ],
            [ 'name' => 'Tesla' ],
            [ 'name' => 'VOLKSWAGEN' ],
        ]);
        $Bentley = Make::create([ 'name' => 'Bentley' ]);
        $Chevrolet = Make::create([ 'name' => 'Chevrolet' ]);
        $Ferrari = Make::create([ 'name' => 'Ferrari' ]);
        $Ford = Make::create([ 'name' => 'Ford' ]);
        $Lexus = Make::create([ 'name' => 'Lexus' ]);
        $Mazda = Make::create([ 'name' => 'Mazda' ]);
        $Mercedes = Make::create([ 'name' => 'Mercedes' ]);
        $Toyota = Make::create([ 'name' => 'Toyota' ]);
        $Honda = Make::create([ 'name' => 'Honda' ]);
        $Hyundai = Make::create([ 'name' => 'Hyundai' ]);

        CarModel::insert([
            [ 'name' => 'Avalon', 'make_id' => $Toyota->id ],
            [ 'name' => 'Accord', 'make_id' => $Honda->id ],
            [ 'name' => 'AMG GT', 'make_id' => $Mercedes->id ],
            [ 'name' => 'Brooklands', 'make_id' => $Bentley->id ],
            [ 'name' => 'CX-5', 'make_id' => $Mazda->id ],
            [ 'name' => 'Civic', 'make_id' => $Honda->id ],
            [ 'name' => '1000 CBR', 'make_id' => $Honda->id ],
            [ 'name' => 'Camry', 'make_id' => $Toyota->id ],
            [ 'name' => 'Camaro', 'make_id' => $Chevrolet->id ],
            [ 'name' => 'CR-V', 'make_id' => $Honda->id ],
            [ 'name' => 'Corvette', 'make_id' => $Chevrolet->id ],
            [ 'name' => 'Cruze', 'make_id' => $Chevrolet->id ],
            [ 'name' => 'ES 300h', 'make_id' => $Lexus->id ],
            [ 'name' => 'Explorer', 'make_id' => $Ford->id ],
            [ 'name' => 'Elantra', 'make_id' => $Hyundai->id ],
            [ 'name' => 'Enzo', 'make_id' => $Ferrari->id ],
            [ 'name' => 'Focus', 'make_id' => $Ford->id ],
            [ 'name' => 'GS 350', 'make_id' => $Lexus->id ],
            [ 'name' => 'GX 460', 'make_id' => $Lexus->id ],
            [ 'name' => 'G-Class', 'make_id' => $Mercedes->id ],
        ]);
    }
}

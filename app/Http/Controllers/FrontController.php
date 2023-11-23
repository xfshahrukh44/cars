<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\Location;
use App\Models\Make;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function search (Request $request)
    {
        $locations = Location::all();
        $makes = Make::all();
        $models = json_encode(CarModel::all()->toArray());
        $filters = [
            'title' => $request->has('title') ? $request->get('title') : null,
            'year_from' => $request->has('year_from') ? $request->get('year_from') : null,
            'year_to' => $request->has('year_to') ? $request->get('year_to') : null,
            'condition' => $request->has('condition') ? $request->get('condition') : null,
            'make_id' => $request->has('make_id') ? $request->get('make_id') : null,
            'model_id' => $request->has('model_id') ? $request->get('model_id') : null,
            'body_type' => $request->has('body_type') ? $request->get('body_type') : null,
            'transmission' => $request->has('transmission') ? $request->get('transmission') : null,
            'drive' => $request->has('drive') ? $request->get('drive') : null,
            'steering' => $request->has('steering') ? $request->get('steering') : null,
            'fuel_type' => $request->has('fuel_type') ? $request->get('fuel_type') : null,
            'location' => $request->has('location') ? $request->get('location') : null,
            'engine' => $request->has('engine') ? $request->get('engine') : null
        ];

        $cars = Car::query()
        ->when(!is_null($filters['title']), function ($q) use ($filters) { //title
            return $q->where('title', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('stock_id', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('location', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('condition', 'LIKE', '%'.$filters['title'].'%')
                ->orWhereHas('model', function ($q) use ($filters) {
                    return $q->where('name', 'LIKE', '%'.$filters['title'].'%')
                        ->orWhereHas('make', function ($q) use ($filters) {
                        return $q->where('name', 'LIKE', '%'.$filters['title'].'%');
                    });
                })
                ->orWhere('mileage', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('year', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('exterior_color', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('fuel_type', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('transmission', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('steering', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('drive', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('engine', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('body_type', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('stock_id', 'LIKE', '%'.$filters['title'].'%')
                ->orWhere('slug', 'LIKE', '%'.$filters['title'].'%');
        })
        ->when(!is_null($filters['year_from']), function ($q) use ($filters) { //year_from
            return $q->where('year', '>=', $filters['year_from']);
        })
        ->when(!is_null($filters['year_to']), function ($q) use ($filters) { //year_to
            return $q->where('year', '<=', $filters['year_to']);
        })
        ->when(!is_null($filters['condition']), function ($q) use ($filters) { //condition
            return $q->where('condition', $filters['condition']);
        })
        ->when(!is_null($filters['make_id']), function ($q) use ($filters) { //make_id
            return $q->whereHas('model', function ($q) use ($filters) {
                    return $q->where('make_id', $filters['make_id']);
                });
        })
        ->when(!is_null($filters['model_id']), function ($q) use ($filters) { //model_id
            return $q->where('model_id', $filters['model_id']);
        })
        ->when(!is_null($filters['body_type']), function ($q) use ($filters) { //body_type
            return $q->where('body_type', $filters['body_type']);
        })
        ->when(!is_null($filters['transmission']), function ($q) use ($filters) { //transmission
//            dd('here');
            return $q->where('transmission', $filters['transmission']);
        })
        ->when(!is_null($filters['drive']), function ($q) use ($filters) { //drive
            return $q->where('drive', $filters['drive']);
        })
        ->when(!is_null($filters['steering']), function ($q) use ($filters) { //steering
            return $q->where('steering', $filters['steering']);
        })
        ->when(!is_null($filters['fuel_type']), function ($q) use ($filters) { //fuel_type
            return $q->where('fuel_type', $filters['fuel_type']);
        })
        ->when(!is_null($filters['location']), function ($q) use ($filters) { //location
            return $q->where('location', $filters['location']);
        })
        ->when(!is_null($filters['engine']), function ($q) use ($filters) { //engine
            return $q->where('engine', $filters['engine']);
        })
        ->paginate(10)->withQueryString();

        return view('front.search', compact('filters', 'locations', 'makes', 'models', 'cars'));
    }

    public function carDetail (Request $request, $slug)
    {
        $car = Car::where('slug', $slug)->first();

        return view('front.car-detail', compact('car'));
    }

    public function iframeSearchForm (Request $request)
    {
        $locations = Location::all();
        $makes = Make::all();
        $models = json_encode(CarModel::all()->toArray());

        return view('front.iframes.search-form', compact('locations', 'makes', 'models'));
    }

}

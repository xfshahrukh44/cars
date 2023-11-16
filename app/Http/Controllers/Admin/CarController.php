<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarModel;
use App\Models\Location;
use App\Models\Make;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request){
        try {
            if (request()->ajax()) {
                return datatables()->of(Car::get())
                    ->editColumn('created_at', function($data){
                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m-d-Y');
                        return $formatedDate;
                    })
                    ->addColumn('image', function ($data) {
                        return '<img src="'.$data->feature_image().'" width="50" height="50">';
                    })
                    ->addColumn('stock_id', function ($data) {
                        return $data->stock_id ?? '';
                    })
                    ->addColumn('make', function ($data) {
                        return $data->make->name ?? '';
                    })
                    ->addColumn('model', function ($data) {
                        return $data->model->name ?? '';
                    })
                    ->addColumn('reference_link', function ($data) {
                        return ($data->reference_link) ? '<a href="'.$data->reference_link.'" target="_blank">'.$data->reference_link.'</a>' : '';
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="Edit" href="cars/edit/' . $data->id . '" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['action', 'image', 'reference_link'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.cars.index');

    }

    public function create(Request $request){
        $locations = Location::all();
        $makes = Make::all();
        $models = json_encode(CarModel::all()->toArray());
        return view('admin.cars.create', compact('locations', 'makes', 'models'));
    }

    public function store(Request $request){
        $car = Car::create([
            'title' => $request->title,
            'location' => $request->location,
            'condition' => $request->condition,
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'mileage' => $request->mileage,
            'year' => $request->year,
            'exterior_color' => $request->exterior_color,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
            'steering' => $request->steering,
            'drive' => $request->drive,
            'engine' => $request->engine,
            'sales_price' => $request->sales_price,
            'seller_notes' => $request->seller_notes,
            'reference_link' => $request->reference_link,
            'body_type' => $request->body_type,
            'stock_id' => $request->stock_id,
            'slug' => get_car_slug($request->title),
        ]);

        //media work
        if ($request->has('media') && count($request->media) > 0) {
            foreach ($request->media as $media) {
                $name = uniqid() . '.' . $media->getClientOriginalExtension();
                $media->storeAs('public/images/cars', $name);

                CarImage::create([ 'car_id' => $car->id, 'url' => $name ]);
            }
        }

        return redirect(route('admin.cars'));
    }

    public function edit($id){
        $locations = Location::all();
        $makes = Make::all();
        $models = json_encode(CarModel::all()->toArray());
        $car = Car::where('id',$id)->first();
        return view('admin.cars.edit',compact('car','id', 'locations', 'makes', 'models'));
    }

    public function update(Request $request, $id){
        $car = Car::where('id',$id)->update([
            'title' => $request->title,
            'location' => $request->location,
            'condition' => $request->condition,
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'mileage' => $request->mileage,
            'year' => $request->year,
            'exterior_color' => $request->exterior_color,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
            'steering' => $request->steering,
            'drive' => $request->drive,
            'engine' => $request->engine,
            'sales_price' => $request->sales_price,
            'seller_notes' => $request->seller_notes,
            'reference_link' => $request->reference_link,
            'body_type' => $request->body_type,
            'stock_id' => $request->stock_id,
        ]);

        //media work
        if ($request->has('media') && count($request->media) > 0) {
            foreach ($request->media as $media) {
                $name = uniqid() . '.' . $media->getClientOriginalExtension();
                $media->storeAs('public/images/cars', $name);

                CarImage::create([ 'car_id' => $id, 'url' => $name ]);
            }
        }

        return redirect(route('admin.cars'));
    }

    public function destroy($id){
        $content=Car::find($id);
        $content->delete();//
        echo 1;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
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
                    ->addColumn('action', function ($data) {
                        return '<a title="Edit" href="cars/edit/' . $data->id . '" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['action'])->make(true);
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
//        $models = str_replace('&quot;', '"', $models);
        return view('admin.cars.create', compact('locations', 'makes', 'models'));
    }

    public function store(Request $request){
        $car = Car::create([
            'title' => $request->title,
            'location' => $request->location,
            'condition' => $request->condition,
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
        ]);

        return redirect(route('admin.cars'));
    }

    public function edit($id){
        $car = Car::where('id',$id)->first();
        return view('admin.cars.edit',compact('car','id'));
    }

    public function update(Request $request, $id){
        $car = Car::where('id',$id)->update([
            'title' => $request->title,
            'location' => $request->location,
            'condition' => $request->condition,
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
        ]);
        return redirect(route('admin.cars'));
    }

    public function destroy($id){
        $content=Car::find($id);
        $content->delete();//
        echo 1;
    }
}

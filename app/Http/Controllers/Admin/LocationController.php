<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Location;
use App\Models\Make;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request){
        try {
            if (request()->ajax()) {
                return datatables()->of(Location::get())
//                    ->editColumn('created_at', function($data){
//                        if (is_null($data->created_at)) {
//                            return '';
//                        }
//
//                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m-d-Y');
//                        return $formatedDate;
//                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="Edit" href="locations/edit/' . $data->id . '" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.locations.index');

    }

    public function create(Request $request){
        return view('admin.locations.create');
    }

    public function store(Request $request){
        $location = Location::create([
            'name' => $request->name
        ]);

        return redirect(route('admin.locations'));
    }

    public function edit($id){
        $location = Location::where('id',$id)->first();
        return view('admin.locations.edit',compact('location','id'));
    }

    public function update(Request $request, $id){
        $location = Location::where('id',$id)->update([
            'name' => $request->name
        ]);
        return redirect(route('admin.locations'));
    }

    public function destroy($id){
        $content=Location::find($id);
        $content->delete();//
        echo 1;
    }
}

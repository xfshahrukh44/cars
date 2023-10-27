<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\Location;
use App\Models\Make;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index(Request $request){
        try {
            if (request()->ajax()) {
                return datatables()->of(CarModel::with('make')->get())
                    ->editColumn('created_at', function($data){
                        if (is_null($data->created_at)) {
                            return '';
                        }

                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m-d-Y');
                        return $formatedDate;
                    })
                    ->addColumn('make', function ($data) {
                        return $data->make->name ?? '';
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="Edit" href="models/edit/' . $data->id . '" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.models.index');

    }

    public function create(Request $request){
        $makes = Make::all();
        return view('admin.models.create', compact('makes'));
    }

    public function store(Request $request){
        $model = CarModel::create([
            'name' => $request->name,
            'make_id' => $request->make_id
        ]);

        return redirect(route('admin.models'));
    }

    public function edit($id){
        $model = CarModel::where('id',$id)->first();
        $makes = Make::all();
        return view('admin.models.edit',compact('model', 'makes','id'));
    }

    public function update(Request $request, $id){
        $model = CarModel::where('id',$id)->update([
            'name' => $request->name,
            'make_id' => $request->make_id
        ]);
        return redirect(route('admin.models'));
    }

    public function destroy($id){
        $content=CarModel::find($id);
        $content->delete();//
        echo 1;
    }
}

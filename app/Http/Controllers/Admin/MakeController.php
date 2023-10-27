<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Make;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MakeController extends Controller
{
    public function index(Request $request){
        try {
            if (request()->ajax()) {
                return datatables()->of(Make::get())
                    ->editColumn('created_at', function($data){
                        if (is_null($data->created_at)) {
                            return '';
                        }

                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m-d-Y');
                        return $formatedDate;
                    })
                    ->addColumn('action', function ($data) {
                        return '<a title="Edit" href="makes/edit/' . $data->id . '" class="btn btn-dark btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.makes.index');

    }

    public function create(Request $request){
        return view('admin.makes.create');
    }

    public function store(Request $request){
        $make = Make::create([
            'name' => $request->name
        ]);

        return redirect(route('admin.makes'));
    }

    public function edit($id){
        $make = Make::where('id',$id)->first();
        return view('admin.makes.edit',compact('make','id'));
    }

    public function update(Request $request, $id){
        $make = Make::where('id',$id)->update([
            'name' => $request->name
        ]);
        return redirect(route('admin.makes'));
    }

    public function destroy($id){
        $content=Make::find($id);
        $content->delete();//
        echo 1;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {
            if (request()->ajax()) {
                return datatables()->of(User::with('profile')->whereNull('suspended_on')->whereNull('closed_on')->where('role_id', 2)->get())
                    ->addIndexColumn()
                    ->editColumn('created_at', function($data){
                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m-d-Y');
                        return $formatedDate;
                    })
                    ->editColumn('first_name', function($data){
                        return $data->profile->first_name ?? '';
                    })
                    ->editColumn('last_name', function($data){
                        return $data->profile->last_name ?? '';
                    })
                    ->addColumn('profile_picture', function ($data) {
                        return '<img width="40" src="'.$data->get_profile_picture().'"></img>';
                    })
                    ->addColumn('action', function ($data) {
                        return '<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>&nbsp<button title="Suspend" type="button" name="suspend" id="' . $data->id . '" class="btn btn-warning suspend btn-sm"><i class="fa fa-ban"></i></button>&nbsp<a href="'.route('admin.user.userPosts', $data->id).'" title="User Post" type="button" id="' . $data->id . '" class="btn btn-primary btn-sm">User Posts</a>&nbsp<a target="_blank" href="'.route('userProfile', $data->id).'" title="User Post" type="button" id="' . $data->id . '" class="btn btn-primary btn-sm">Profile</a>';
                    })->rawColumns(['profile_picture', 'action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.user.list');
    }

    final public function show(int $id){
        $content= User::find($id);
        return view('admin.user.view',compact('content'));
    }

    final public function edit(Request $request, $id){
        if ($request->method() == 'POST') {
            $this->validate($request, array(
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required',
                'address' => 'required',
                'zipcode' => 'required',
                'password' => 'sometimes',
            ));

            $user = User::find($id);

            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->zipcode = $request->input('zipcode');
            if($request->has('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            if ($user->save()) {
                return redirect()->route('user')->with(['success' => 'Customer Edit Successfully']);
            }
        }else {
            $content=User::findOrFail($id);
            return view('admin.user.add-user', compact('content'));
        }
    }

    final public function destroy($id)
    {
        $content=User::find($id);
        $content->delete();
        echo 1;
    }

    final public function suspend($id)
    {
        $content=User::find($id);
        $content->suspended_on = Carbon::now();
        $content->save();
        echo 1;
    }

    public function userPosts($id)
    {
        try {
            if (request()->ajax()) {
                return datatables()->of(Post::where('user_id', $id)->orderBy('created_at', 'DESC')->get())
                    ->addIndexColumn()
                    ->editColumn('created_at', function($data){
                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('m-d-Y');
                        return $formatedDate;
                    })->addColumn('media', function ($data) {
                        $files = [];
                        foreach ($data->media as $media) {
                            $files[] = [
                                'mime_type' => $media->mime_type,
                                'url' => $media->original_url,
                            ];
                        }
                        return count($files) && isset($files[0]) && isset($files[0]['url']) ? '<img width="40" src="'.$files[0]['url'].'"></img>' : '';
                        return '<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })
                    ->addColumn('action', function ($data) {
                        return '<button title="Delete" type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                    })->rawColumns(['media', 'action'])->make(true);
            }
        } catch (\Exception $ex) {
            return redirect('/')->with('error', $ex->getMessage());
        }
        return view('admin.user.post-list');
    }

    final public function postDestroy($id)
    {
        $content=Post::find($id);
        $content->delete();
        echo 1;
    }
}

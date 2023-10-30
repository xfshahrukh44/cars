<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarImageController extends Controller
{
    public function destroy($id){
        $car_image = CarImage::find($id);
        $url = 'public/images/cars/' . $car_image->url;

        if (Storage::exists($url)) {
            Storage::delete($url);
        }

        $car_image->delete();

        return redirect()->back();
    }
}

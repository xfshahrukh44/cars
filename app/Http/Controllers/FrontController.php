<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function search (Request $request)
    {
        $filters = [
            'search' => $request->has('search') ? $request->get('search') : null,
        ];

        return view('front.search', compact('filters'));
    }
}

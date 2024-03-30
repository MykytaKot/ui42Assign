<?php

namespace App\Http\Controllers;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function show($id)
    {
        $product = Place::find($id);
        return response()->json($product);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

        $products = Place::orderBy('name', 'ASC')->get()->toArray();
        return $products;
    }
    public function show($name)
    {
        
        $places = Place::where('name', 'LIKE', '%' . $name . '%')->get()->toArray();
        return response()->json($places);
    }
}

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
    public function show($id)
    {
        var_dump($id);
        $product = Place::find($id);
        return response()->json($product);
    }
}

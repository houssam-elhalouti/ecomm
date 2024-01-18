<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $products=Product::query()->paginate();
        return view('layouts.app', compact('products'));
    }
}

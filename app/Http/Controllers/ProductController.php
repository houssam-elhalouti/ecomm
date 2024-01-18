<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products=Product::query()->paginate(3);
        return view('product.index', compact('products'));
    }

  
    public function create()
    {
        $isUpdate= false;
        $categories= Category::all();
        $product=new Product();
        return view('product.form', compact('product', 'isUpdate', 'categories'));
    }

    
    public function store(ProductRequest $request)
    {
        $formfields= $request->validated();
        if($request-> hasFile('image')){
            $formfields['image']=$request->file('image')->store('product', 'public');
        }

        Product::create($formfields);
        return to_route('products.index')->with('success', 'Product create successfuly');
    }

    
    public function show(Product $product)
    {
        //
    }

   
    public function edit(Product $product)
    {
        $isUpdate=true;
        $categories= Category::all();
        return view('product.form', compact('product', 'isUpdate','categories'));
    }

    
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->validated())->save();
        return to_route('products.index')->with('success', 'Product update successfuly');
    }




    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('success', 'Product delete successfuly');
      
    }
}

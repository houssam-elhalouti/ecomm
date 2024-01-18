<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
</head>
<body>
  @php
      $route=route('products.store');
      if($isUpdate) {
        $route=route('products.update', $product);
      }
  @endphp
      @extends('layouts.app')
      @section('title', ($isUpdate?'Update':'Create'). ' product')
      @section('content')
      <div class="container p-3">
        <a href="/" class="btn btn-primary">
          <i class="fa-solid fa-arrow-left"></i>
        </a>
          <h1>@yield('title'):</h1>
          
          <form method="POST" action="{{$route}}" enctype="multipart/form-data">
            @csrf
            @if ($isUpdate)
                @method('PUT')           
            @endif
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name"  value="{{old('name', $product->name)}}">
              </div>
              <div class="mb-3">
                <label  class="form-label">Descrption</label>
                <textarea class="form-control"  name="description">{{old('description', $product->description)}}</textarea>
            
              </div>
              <div class="mb-3">
                  <label  class="form-label">Qantity</label>
                  <input type="text" class="form-control" name="quantity" value="{{old('quantity', $product->quantity)}}">
                </div>
                <div class="mb-3">
                  <label  class="form-label">Image</label>
                  <input type="file" class="form-control" name="image">
                  @if ($product->image)
                  <img src="/storage/{{$product->image}}" alt="" width="100px">
                  @endif
                </div>
                <div class="mb-3">
                  <label  class="form-label">Price</label>
                  <input type="text" class="form-control" name="price" value="{{old('price', $product->price)}}">
                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                  <option>all categories</option>
                  @foreach ($categories as $category)
                    <option @selected(old('category_id', $product->category_id) == $category->id) value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                
                </select>
              <input type="submit" class="btn btn-primary w-100" value="{{$isUpdate? 'Update': 'Create'}}"/>
            </form>
          </div>
      @endsection
  
</body>
</html>
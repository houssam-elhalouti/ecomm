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
      $route=route('categories.store');
      if($isUpdate) {
        $route=route('categories.update', $category);
      }
  @endphp
      @extends('layout')
      @section('title', ($isUpdate?'Update':'Create'). ' category')
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
                <input type="text" class="form-control" name="name" >
              </div>
              <input type="submit" class="btn btn-primary w-100" value="{{$isUpdate? 'Update': 'Create'}}"/>
            </form>
          </div>
      @endsection
  
</body>
</html>
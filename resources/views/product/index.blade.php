@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <a href="{{'/'}}" class="btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i>
          </a>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Product List</h1>
            <a href="{{route('products.create')}}" class="btn btn-success">Add new product</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th>Category</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                        <span class="badge bg-success">
                            @if ($product->category)
                                {{$product->category->name}}
                            @else
                             ***
                            @endif
                        </span>
                        </td>
                        <td>
                            <img src="storage/{{$product->image}}" alt="" style="width: 100px">
                        </td>
                        <td>{{$product->price}} DH</td>
                        <td>
                            <div class="btn-group gap-2">
                                <a href="{{route('products.edit',$product)}}" class="btn btn-primary">Update</a>
                                <form action="{{route('products.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger"/> 
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><h5>No products.</h5></td>
                    </tr>
                @endforelse
            </tbody>
          </table>
          {{ $products->links('vendor\pagination\custom') }}
    </div>
@endsection

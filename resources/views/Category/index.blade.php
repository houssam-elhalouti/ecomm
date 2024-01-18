@extends('layout')

@section('content')
    <div class="container my-5">
        <a href="/" class="btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i>
          </a>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Categories List</h1>
            <a href="{{route('categories.create')}}" class="btn btn-success">Create</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        
                        <td>
                            <div class="btn-group gap-2">
                                <a href="{{route('categories.edit',$category)}}" class="btn btn-primary">Update</a>
                                <form action="{{route('categories.destroy', $category)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger"/> 
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><h5>No category.</h5></td>
                    </tr>
                @endforelse
            </tbody>
          </table>
    </div>
@endsection

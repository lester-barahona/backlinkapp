@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card rounded-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div>
                        Dashboard
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{route('home')}}">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    Add new SubCategory
                   <form method="POST" action="{{route('subcategory.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="category">Select category</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">SubCategory Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit SubCategory</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

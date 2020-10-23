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
                    Add new Category
                   <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="category">Category Name</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                            <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Category</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

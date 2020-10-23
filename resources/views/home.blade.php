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
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex align-items-between">
                        <a href="{{route('category.create')}}" class="btn btn-success w-50 m-1">Add new Category</a>
                        <a href="{{route('category.index')}}" class="btn btn-success w-50 m-1">Show Categories</a>
                    </div>

                    <div class="d-flex align-items-between">
                        <a href="{{route('subcategory.create')}}" class="btn btn-success w-50 m-1">Add new SubCategory</a>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

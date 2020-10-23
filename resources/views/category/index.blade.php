@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card rounded-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div>
                        All our Categories
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{route('home')}}">Back</a>
                    </div>
                </div>

                <div class="card-body">
                   
                  <show-category-component :categories="{{$categories}}"></-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
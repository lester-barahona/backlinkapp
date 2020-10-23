@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex flex-column justify-content-center">
                <div><h1 class="py-3">Link building is one of the most important thing in <span class="text-orange">SEO</span></h1></div>
                <div><h4>Every little helps. Submit your domain and get dofollow backlink for our website</h4></div>
                <div> <a class="btn btn-primary mt-5" href="{{route('domain.create')}}">Submit your Domain</a></div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end align-items-center">
                    <img class="w-100 py-4 pl-5" src="{{asset('img/banner.svg')}}" alt="main-img">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <h2 class="font-weight-bolder mt-5">Categories</h2>
        </div>

        <domain-display-component :categories="{{$categories}}" :subcategories="{{$subcategories}}" :domains="{{$domains}}"></domain-display-component>

        
    
    </div>
@endsection
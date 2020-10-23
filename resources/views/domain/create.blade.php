@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="w-100">
                <h3 class="text-center">Add your Domain to your website and get backlink</h3>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <domain-register-component :categories="{{$categories}}" :subcategories="{{$subcategories}}"></domain-register-component>
            </div>   
            <div class="col-sm-12 col-md-6"> 
                {{-- Para el paypal --}}
                <div class="w-100" style="margin-top: 30px">
                    <div><h4 class="text-center mb-3">You can make a donation:😁 <strong>3$</strong></h4></div>
                    <div class="mx-auto w-75" ref="paypal" id="paypal-button-container"></div>
                    
                   

                 </div>
            </div>   
    </div>
    </div>
@endsection


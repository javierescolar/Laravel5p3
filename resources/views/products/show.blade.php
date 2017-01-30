@extends('app')

@section('content')

<div class="col-md-12 productHead">
    <h3 class="col-md-offset-1">
        {{ $product->name }}
        <small class="col-md-offset-5">Technical specifications</small>
        <small class="col-md-offset-1"><a href="{{ route('brands.products.images.index', [$brand->slug, $product->slug]) }}">Gallery</a></small>
        <small class="col-md-offset-1"><a href="{{ URL::to('/')}}/addproductcart/{{$product->id}}" class="btn btn-info btn-xs">Add to cart</button></a>
    </h3>
</div>
<div class="productBody">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center">{{ mb_strtoupper($product->slogan,'utf-8')}}</h1>
        <p class="text-center textDescription">
            {{ $product->description }}
        </p>
    </div>
    <div class="col-md-12">
        @include('products/partials/carrusel')
    </div>
    <div class="col-md-10 col-md-offset-1 characteristic">
        <div class="col-md-2 boxCharacteristic col-md-offset-3">
            <h3 class="text-center">{{$product->characteristic_1}}</h3>
        </div>
        
        <div class="col-md-2 boxCharacteristic">
            <h3 class="text-center">{{$product->characteristic_2}}</h3>
        </div>
       
        <div class="col-md-2 boxCharacteristic">
            <h3 class="text-center">{{$product->characteristic_3}}</h3>
        </div>
    </div>
    
    
    @if ($product->discount > 0)
    <div class="col-md-12">
        @if(!Auth::guest() &&  Auth::user()->role == "user")
        <h1 class="text-center"> 
            <small><strike>{{$product->price}}</strike></small>
            {{number_format($product->price - ($product->price * (($product->discount + Auth::user()->discount_user)/100)),2)}}
            €
            <p class="text-center discount">Descuento del {{$product->discount+Auth::user()->discount_user}}%</p>
        </h1>
        
        @else

        <h1 class="text-center">
            <small><strike>{{$product->price}}</strike></small>
            {{number_format($product->price - ($product->price * (($product->discount)/100)),2)}}
            €
            <p class="text-center discount">Descuento del {{$product->discount}}%</p>
        </h1>
        
        @endif
        @else
        <h1 class="text-center">{{$product->price}} €</h1>
        </div>
        @endif
    
</div>

@endsection

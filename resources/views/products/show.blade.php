@extends('app')

@section('content')

<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">
        {{ $product->name }}
        <small class="col-md-offset-5">Technical specifications</small>
        <small class="col-md-offset-1"><a href="{{ route('brands.products.images.index', [$brand->slug, $product->slug]) }}">Gallery</a></small>
        <small class="col-md-offset-1"><button class="btn btn-info btn-xs">Buy</button></small>
    </h3>
</div>
<div class="productBody">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center">{{$product->slogan}}</h1>
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
</div>
<div style="margin-bottom:60em;"></div>
@endsection

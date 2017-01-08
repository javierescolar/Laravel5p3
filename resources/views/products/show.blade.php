@extends('app')

@section('content')

<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">
        {{ $product->name }}
        <small class="col-md-offset-6">Technical specifications</small>
        <small class="col-md-offset-1"><a href="{{ route('brands.products.images.store', [$brand->slug, $product->slug]) }}">Gallery</a></small>
        <small class="col-md-offset-1"><button class="btn btn-info btn-xs">Buy</button></small>
    </h3>
</div>
<div class="productBody">

    @if(!Auth::guest() && Auth::user()->role == "admin")
    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $product->brand->slug, $product->slug))) }}
    {{ link_to_route('brands.products.edit', 'Edit', array($product->brand->slug, $product->slug), array('class' => 'btn btn-warning')) }}
    {{ link_to_route('brands.products.images.create', 'Add Images', array($product->brand->slug, $product->slug), array('class' => 'btn btn-info')) }}
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
     
    @endif
    
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

@endsection

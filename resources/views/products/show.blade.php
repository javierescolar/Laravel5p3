@extends('app')

@section('content')

<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">
        {{ $product->name }}
        <small class="col-md-offset-6">Technical specifications</small>
        <small class="col-md-offset-1"><a href="{{ route('brands.products.images.store', [$brand->slug, $product->slug]) }}">Gallery</a></small>
    </h3>
</div>
<div class="productBody">
    
    @if(!Auth::guest() && Auth::user()->role == "admin")
    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $product->brand->slug, $product->slug))) }}
    {{ link_to_route('brands.products.edit', 'Edit', array($product->brand->slug, $product->slug), array('class' => 'btn btn-warning')) }}
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
    @endif
    
    <img src="{{URL::to('/')}}/img/{{$product->image}}">
    
    <p>
         {{ $product->description }}
    </p>
   
    
   {{ link_to_route('brands.products.images.create', 'Add Images', array($product->brand->slug, $product->slug), array('class' => 'btn btn-link')) }}
</div>

@endsection

@extends('app')

@section('content')

<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">{{ $product->name }}<small class="col-md-offset-8">Technical specifications</small></h3>
</div>
<div class="productBody">
    
    @if(!Auth::guest() && Auth::user()->role == "admin")
    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $product->brand->slug, $product->slug))) }}
    {{ link_to_route('brands.products.edit', 'Edit', array($product->brand->slug, $product->slug), array('class' => 'btn btn-warning')) }}
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
    @endif
    
    <img src="{{URL::to('/')}}/img/{{$product->image}}">
    
    {{ $product->description }}
</div>

@endsection

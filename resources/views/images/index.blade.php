@extends('app')

@section('content')

<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">{{ $product->name }}
        <small class="col-md-offset-6"><a href="{{ route('brands.products.show', [$product->brand->slug, $product->slug]) }}">Technical specifications</a></small>
        <small class="col-md-offset-1">Gallery</small>
    </h3>
</div>
<div class="productBody">

    @foreach($images as $image)
    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.images.destroy', $product->brand->slug,$product->slug,$image->slug))) }}
    
    <div class="col-md-3">
        <img class="img img-responsive" src="{{URL::to('/')}}/img/{{$image->location}}" alt="image">
    </div>
    <button class="btnRemoveImage glyphicon glyphicon-remove" type="submit"></button>
    {{ Form::close() }}
    @endforeach

</div>

@endsection

@extends('app')

@section('content')

<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">{{ $product->name }}
        <small class="col-md-offset-5"><a href="{{ route('brands.products.show', [$product->brand->slug, $product->slug]) }}">Technical specifications</a></small>
        <small class="col-md-offset-1">Gallery</small>
        <small class="col-md-offset-1"><button class="btn btn-info btn-xs">Buy</button></small>
    </h3>
</div>
<div class="productBody">

    @foreach($images as $image)
    <div class="col-md-3">

     <img class="img img-responsive" src="{{URL::to('/')}}/img/{{$image->location}}" alt="image">

    </div>
    @endforeach

</div>

@endsection

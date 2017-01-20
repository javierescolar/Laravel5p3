@extends('app')

@section('content')
<div class="cold-md-12 productHead">
    <h3 class="col-md-offset-1">
        <img class="logoBrands" src="{{URL::to('/')}}/img/{{ $brand->logo }}" alt="logo">{{ $brand->name }}
    </h3>
</div>
@if ( !$brand->products->count() )
Your brand has no products.
@else
<div class="paginate col-md-12">

    <div class="form col-md-4">
        <form class="form" method="GET" action="{{route('brands.show',$brand->slug)}}" id="formOrderBrands">
            <div class="form-group">
                <select class="form-control" name="order" id="selectOrderBrands">
                    <option value="nothing"></option>
                    <option value="ascPrice">Sort by ascending price</option>
                    <option value="descPrice">Sort by descending price</option>
                    <option value="ascAlpha">order alphabetically A-Z</option>
                    <option value="descAlpha">order alphabetically Z-A</option>
                </select>
            </div>
        </form>
    </div>
    <div class="form linksPagination col-md-8">
        {{ $products->links() }}
    </div>
</div>
<div class="container">
    @foreach( $products as $product )

    <div class="col-md-3">
        
        <h3>
            <a href="{{ route('brands.products.show', [$brand->slug, $product->slug]) }}">{{ $product->name }}</a>
           @if($product->images->where('offer',1)->count())
           <img class="img img-responsive imgOfferHome" src="{{URL::to('/')}}/img/{{$product->images->where('offer',1)->first()->location}}">
           @endif
            
         
        </h3>
        @if ($product->discount > 0)
            @if(!Auth::guest() &&  Auth::user()->role == "user")
            Descuento del {{$product->discount+Auth::user()->discount_user}}%
            <h4>Price: {{number_format($product->price - ($product->price * (($product->discount + Auth::user()->discount_user)/100)),2)}}</h4>
            @else
            Descuento del {{$product->discount}}%
            <h4>Price: {{number_format($product->price - ($product->price * (($product->discount)/100)),2)}}</h4>
            @endif
        @else
        <h4>Price: {{$product->price}}</h4>
        @endif
        <form class="form-inline">
            <div class="form-group">
                <select class="form-control" name="quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Add to Cart" class="btn buttons">
            </div>
        </form>
    </div>
    @endforeach
</div>
@endif
@endsection
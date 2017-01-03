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
        <form class="form">
            <div class="form-group">
                <select class="form-control">
                    <option>Order By Price Asc</option>
                    <option>Order By Price Desc</option>
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





    @if(!Auth::guest() &&  Auth::user()->role == "admin")
    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $brand->slug, $product->slug))) }}

    (
    {{ link_to_route('brands.products.edit', 'Edit', array($brand->slug, $product->slug), array('class' => 'btn btn-warning')) }},

    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    )
    {{ Form::close() }}
    @endif

    @endforeach

</div>

@endif
@if(!Auth::guest() &&  Auth::user()->role == "admin")
<p>
    {{ link_to_route('brands.index', 'Back to Brands') }} |
    {{ link_to_route('brands.products.create', 'Create Product', $brand->slug) }}
</p>
@endif
@endsection
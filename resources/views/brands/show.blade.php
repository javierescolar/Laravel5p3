@extends('app')
 
@section('content')
    <h2>{{ $brand->name }}</h2>
 
    @if ( !$brand->products->count() )
        Your project has no products.
    @else
        <ul>
            @foreach( $brand->products as $product )
                <li>
                    <a href="{{ route('brands.products.show', [$brand->slug, $product->slug]) }}">{{ $product->name }}</a>
                    @if(!Auth::guest() &&  Auth::user()->role == "admin")
                    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $brand->slug, $product->slug))) }}
                        
                        (
                            {{ link_to_route('brands.products.edit', 'Edit', array($brand->slug, $product->slug), array('class' => 'btn btn-warning')) }},
 
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        )
                    {{ Form::close() }}
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
    <p>
        {{ link_to_route('brands.index', 'Back to Brands') }} |
        {{ link_to_route('brands.products.create', 'Create Product', $brand->slug) }}
    </p>
@endsection
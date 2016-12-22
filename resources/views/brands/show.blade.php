@extends('app')
 
@section('content')
    <h2>{{ $brand->name }}</h2>
    <a href="{{ route('brands.index') }}">Brands</a>
 
    @if ( !$brand->products->count() )
        Your project has no products.
    @else
        <ul>
            @foreach( $brand->products as $product )
                <li>
                    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $brand->slug, $product->slug))) }}
                        <a href="{{ route('brands.products.show', [$brand->slug, $product->slug]) }}">{{ $product->name }}</a>
                        (
                            {{ link_to_route('brands.products.edit', 'Edit', array($brand->slug, $product->slug), array('class' => 'btn btn-info')) }},
 
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        )
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>
    @endif
    <p>
        {{ link_to_route('brands.index', 'Back to Brands') }} |
        {{ link_to_route('brands.products.create', 'Create Product', $brand->slug) }}
    </p>
@endsection
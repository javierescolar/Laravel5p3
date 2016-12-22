@extends('app')
 
@section('content')
    <h2>
        <a href="{{ route('brands.show', $brand->slug) }}">{{ $brand->name }}</a>
        <br>
        {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $product->brand->slug, $product->slug))) }}
            {{ link_to_route('brands.products.show', 'Show', array($product->brand->slug, $product->slug), array('class' => 'btn buttons')) }}
            {{ link_to_route('brands.products.edit', 'Edit', array($product->brand->slug, $product->slug), array('class' => 'btn btn-warning')) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        <br>
        {{ $product->name }}
    </h2>
    {{ $product->description }}
@endsection

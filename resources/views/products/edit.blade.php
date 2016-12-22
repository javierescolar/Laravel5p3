<!-- /resources/views/tasks/edit.blade.php -->
@extends('app')
 
@section('content')
    <h2>Edit Product "{{ $product->name }}"</h2>
 
    {{ Form::model($product, ['method' => 'PATCH', 'route' => ['brands.products.update', $brand->slug, $product->slug]]) }}
        @include('products/partials/_form', ['submit_text' => 'Edit Product'])
    {{ Form::close() }}
@endsection
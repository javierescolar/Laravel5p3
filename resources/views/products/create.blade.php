<!-- /resources/views/tasks/create.blade.php -->
@extends('app')
 
@section('content')
    <h2>Create Product for Brand "{{ $brand->name }}"</h2>
 
    {{ Form::model(new App\Product, ['route' => ['brands.products.store', $brand->slug], 'class'=>'form','files' => 'true']) }}
        @include('products/partials/_form', ['submit_text' => 'Create Product'])
    {{ Form::close() }}
@endsection
 

<!-- /resources/views/tasks/create.blade.php -->
@extends('app')
 
@section('content')
    <h2>Create Image for Product "{{ $product->name }}"</h2>
 
    {{ Form::model(new App\Image, ['route' => ['brands.products.images.store', $product->brand->slug,$product->slug], 'class'=>'form form-inline','files' => 'true']) }}
        @include('images/partials/_form', ['submit_text' => 'Create Image'])
    {{ Form::close() }}
    
@endsection


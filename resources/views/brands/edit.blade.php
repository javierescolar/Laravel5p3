<!-- /resources/views/projects/edit.blade.php -->
@extends('app')
 
@section('content')
    <h2>Edit Brand</h2>
 
    {{ Form::model($brand, ['method' => 'PATCH', 'route' => ['brands.update', $brand->slug]]) }}
        @include('brands/partials/_form', ['submit_text' => 'Edit Brand'])
    {{ Form::close() }}
@endsection
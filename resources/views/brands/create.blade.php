<!-- /resources/views/projects/create.blade.php -->
@extends('app')
 
@section('content')
    <h2>Create Brand</h2>
 
    {{ Form::model(new App\Brand, ['route' => ['brands.store'],'class'=>'form','files' => 'true']) }}
        @include('brands/partials/_form', ['submit_text' => 'Create Brand'])
    {{ Form::close() }}
@endsection
 

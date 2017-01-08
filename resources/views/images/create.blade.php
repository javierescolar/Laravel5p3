<!-- /resources/views/tasks/create.blade.php -->
@extends('app')

@section('content')
<div class="container">
    <h1 class="positionBrand">

        <img class="brandFormProduct" src="{{URL::to('/')}}/img/{{ $product->brand->logo }}" alt="logo">
        {{ $product->brand->name }}
    </h1>

    <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center headerCreateProduct">Upload Images for {{$product->name}}</h2>
        {{ Form::model(new App\Image, ['route' => ['brands.products.images.store', $product->brand->slug,$product->slug], 'class'=>'form form-inline','files' => 'true']) }}
        @include('images/partials/_form', ['submit_text' => 'Create Image'])
        {{ Form::close() }}
    </div>

</div>




@endsection


@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
         @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        <h1 class="positionBrand">
        <img class="brandFormProduct" src="{{URL::to('/')}}/img/{{ $product->brand->logo }}" alt="logo">
        {{ $product->brand->name }}
    </h1>

    <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center headerCreateProduct">Upload Images for {{$product->name}}</h2>
        {{ Form::model(new App\Image, ['route' => ['adminbrands.adminproducts.adminimages.store', $product->brand->slug,$product->slug], 'class'=>'form form-inline','files' => 'true']) }}
        @include('admin/images/partials/_form', ['submit_text' => 'Create Image'])
        {{ Form::close() }}
    </div>
    </div>
    <div class="col-md-12"></div>
</div>

@endsection



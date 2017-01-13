<!-- /resources/views/tasks/create.blade.php -->
@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
         @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        <h1 class="positionBrand">

            <img class="brandFormProduct" src="{{URL::to('/')}}/img/{{ $brand->logo }}" alt="logo">
            {{ $brand->name }}
        </h1>
        <h2 class="text-center headerCreateProduct">Create Product</h2>
        {{ Form::model(new App\Product, ['route' => ['adminbrands.adminproducts.store', $brand->slug], 'class'=>'form','files' => 'true']) }}
        @include('products/partials/_form', ['submit_text' => 'Create Product'])
        {{ Form::close() }}
    </div>
    <div class="col-md-12"></div>
</div>


@endsection




@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
         @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        <h2>Edit Product "{{ $product->name }}"</h2>
        <div style="margin: 1em;">
                {{ link_to_route('adminbrands.adminproducts.adminimages.create', 'Add images to the product',array($product->brand->slug,$product->slug)) }}
            </div>
        {{ Form::model($product, ['method' => 'PATCH', 'route' => ['adminbrands.adminproducts.update', $brand->slug, $product->slug]]) }}
        @include('admin/products/partials/_form', ['submit_text' => 'Edit Product'])
        {{ Form::close() }}
    </div>
    <div class="col-md-12"></div>
</div>

@endsection


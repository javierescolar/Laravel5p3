<!-- /resources/views/projects/edit.blade.php -->
@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
        @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        <h2 class="text-center headerCreateProduct">Edit Brand {{$brand->name}}</h2>

        {{ Form::model($brand, ['method' => 'PATCH', 'route' => ['adminbrands.update', $brand->id]]) }}
        <input type="hidden" name="brand_id" value="{{$brand->id}}">
        @include('admin/brands/partials/_form', ['submit_text' => 'Edit Brand'])
        {{ Form::close() }}
        <div class="col-md-12"></div>
    </div>

    @endsection


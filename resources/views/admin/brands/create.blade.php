
@extends('app')



@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
        @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        
            <h2 class="text-center headerCreateProduct">Create Brand</h2>
            {{ Form::model(new App\Brand, ['route' => ['adminbrands.store'],'class'=>'form','files' => 'true']) }}
            @include('brands/partials/_form', ['submit_text' => 'Create Brand'])
            {{ Form::close() }}
       
        <div class="col-md-12"></div>
    </div>




 @endsection


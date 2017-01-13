@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
         @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        @include('admin.brands.partials.tableBrands')
    </div>
    <div class="col-md-12"></div>
</div>

@endsection
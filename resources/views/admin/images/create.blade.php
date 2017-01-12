@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Hamburger -->
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav">

                    <li>
                        <a href="{{route('adminusers')}}" id="botonUsers">User <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a href="{{route('adminbrands.index')}}" id="botonBrands">Brand <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a href="{{route('products')}}" id="botonProducts">Product <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a id="botonUploadXML">Upload XML <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <div class="side-menu-container">
                <table class="table table-responsive table-condensed">
                    <thead>
                    <th>Connect</th>
                    <th>Disonnect</th>
                    </thead>
                    <tbody>
                        @foreach($access as $acc)
                        <tr>
                            @if($acc->connect == $acc->disconnect)
                            <td class="small">{{$acc->connect}}</td>
                            <td class="small">Open session <span class="iconGreen glyphicon glyphicon-globe"></span></td>
                            @else
                            <td class="small">{{$acc->connect}}</td>
                            <td class="small">{{$acc->disconnect}}</td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </ul>
            </div>
        </nav>
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
        @include('images/partials/_form', ['submit_text' => 'Create Image'])
        {{ Form::close() }}
    </div>

        
    </div>
    <div class="col-md-12"></div>
</div>

@endsection



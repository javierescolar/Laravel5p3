@extends('app')

@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
        @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        <div class="productBody">
            <div style="margin: 1em;">
                {{ link_to_route('adminbrands.adminproducts.adminimages.create', 'Add more images',array($product->brand->slug,$product->slug)) }}
            </div>

            @foreach($images as $image)
            <div class="col-md-3">
                {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('adminbrands.adminproducts.adminimages.destroy', $product->brand->slug,$product->slug,$image->slug))) }}
                <img class="img img-responsive" src="{{URL::to('/')}}/img/{{$image->location}}" alt="image">
                @if(!Auth::guest() && Auth::user()->role == "admin")
                <button class="btnRemoveImage glyphicon glyphicon-remove" type="submit"></button>
                @endif
                {{ Form::close() }}
            </div>
            @endforeach

        </div>
    </div>
    <div class="col-md-12"></div>
</div>

@endsection

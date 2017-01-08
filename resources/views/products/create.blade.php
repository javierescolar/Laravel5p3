<!-- /resources/views/tasks/create.blade.php -->
@extends('app')

@section('content')
<div class="container">
    <h1 class="positionBrand">
         
          <img class="brandFormProduct" src="{{URL::to('/')}}/img/{{ $brand->logo }}" alt="logo">
           {{ $brand->name }}
    </h1>
    
    
      
    
    <div class="col-md-10 col-lg-offset-1">
        <h2 class="text-center headerCreateProduct">Create Product</h2>
        {{ Form::model(new App\Product, ['route' => ['brands.products.store', $brand->slug], 'class'=>'form','files' => 'true']) }}
        @include('products/partials/_form', ['submit_text' => 'Create Product'])
        {{ Form::close() }}
    </div>

</div>

@endsection


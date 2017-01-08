<!-- /resources/views/projects/create.blade.php -->
@extends('app')

@section('content')
<div class="container">
    <div class="col-md-10 col-lg-offset-1">
        <h2 class="text-center headerCreateProduct">Create Brand</h2>
        {{ Form::model(new App\Brand, ['route' => ['brands.store'],'class'=>'form','files' => 'true']) }}
        @include('brands/partials/_form', ['submit_text' => 'Create Brand'])
        {{ Form::close() }}
    </div>

</div>




@endsection


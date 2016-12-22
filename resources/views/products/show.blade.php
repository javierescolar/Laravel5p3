@extends('app')
 
@section('content')
    <h2>
        <a href="{{ route('brands.show', $brand->slug) }}">{{ $brand->name }}</a>
        <br>
        {{ $product->name }}
    </h2>
    {{ $product->description }}
@endsection

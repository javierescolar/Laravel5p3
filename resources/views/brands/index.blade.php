@extends('app')

@section('content')

 
    <h2>Brands</h2>
 
    @if ( !$brands->count() )
        You have no projects
    @else
        <ul>
            @foreach( $brands as $brand )
                <li><a href="{{ route('brands.show', $brand->slug) }}">{{ $brand->name }}</a></li>
                {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.destroy', $brand->slug))) }}
                (
                            {{ link_to_route('brands.edit', 'Edit', array($brand->slug), array('class' => 'btn btn-info')) }},
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                )
                {{ Form::close() }}
            @endforeach
        </ul>
    @endif
    <p>
        {{ link_to_route('brands.create', 'Create Brand') }}
    </p>

@endsection
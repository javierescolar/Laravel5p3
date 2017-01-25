@extends('app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="col-md-12" style="margin-bottom: 1em;">
         <a class="col-md-offset-8 btn btn-danger" href="{{URL::to('/')}}/emptyCart">Empty Cart of Products</a>
         <a class="btn buttons" href="">Buy Products</a>
    </div>
   <div class="col-md-12">
    @include('cart.partials.tableCart')
    </div>

</div>



@endsection
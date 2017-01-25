<table class="table table-responsive">
    <thead>
        <tr class="tableHeader">
            <td>Brand</td>
            <td>Name</td>
            <td>Price</td>
        </tr>
    </thead>
    <tbody>
        @if($cart->count() == 0)
        <tr>
            <td colspan="3">This cart haven´t any product</td>  
        </tr>

        @else
        @foreach($cart as $productCart)
        <tr class="text-center">
           <!--  <td>
               <form class ='form-inline' method="POST" action="{{URL::to('/')}}/removeproductcart">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <button data-toggle ="tooltip" title="Delete Product Cart" class="glyphicon glyphicon-trash btnRemoveCart" type="submit"></button>
                     <input type="hidden" value="{{$productCart->model->id}}" name="id_product">
                </form>
               
            </td>
           -->
            <td>{{$productCart->model->brand->name}}</td>
            <td>{{$productCart->model->name}}</td>
            <td>{{$productCart->model->price}}</td>
        </tr>   
        @endforeach
        <tr class="text-right subtotal">
            <td colspan="3">Total: {{Cart::subtotal()}} € </td>
        </tr>
        @endif    
    </tbody>

</table>
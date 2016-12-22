<table id="tableProducts" class="table table-condensed table-responsive table-hover">
    <tr class="tableHeader">
        <td>Id</td>
        <td>Brand</td>
        <td>Name</td>
        <td>Price</td>
        <td>Created</td>
        <td>Updated</td>
        <td></td>
    </tr>
    @foreach($products as $product)
        <tr class="text-center">
            <td>{{$product->id}}</td>
            <td>{{$product->brand->name}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td><a class="btn buttons" href="{{URL::to('/')}}/brands/{{$product->brand->slug}}/products/{{$product->slug}}">Show</a></td>
        </tr>        
     @endforeach
</table>
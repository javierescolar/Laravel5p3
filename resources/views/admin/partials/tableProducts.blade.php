<div id="contentTableProducts">
    <br>
    <input class="form-control" type="text" id="buscadorAdminProducts">
    <br>
<table id="tableProducts" class="table table-condensed table-responsive table-hover">
    <tr class="tableHeader">
        <td>Id</td>
        <td>Brand</td>
        <td>Name</td>
        <td>Price</td>
        <td>Created</td>
        <td>Updated</td>
        <td>Options</td>
    </tr>
    @foreach($products as $product)
    <tr class="text-center">
        <td>{{$product->id}}</td>
        <td>{{$product->brand->name}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->created_at}}</td>
        <td>{{$product->updated_at}}</td>
        <td>
            {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.products.destroy', $product->brand->slug, $product->slug))) }}
            {{ link_to_route('brands.products.show', 'Show', array($product->brand->slug, $product->slug), array('class' => 'btn buttons')) }}
            {{ link_to_route('brands.products.edit', 'Edit', array($product->brand->slug, $product->slug), array('class' => 'btn btn-warning')) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        </td>
    </tr>        
    @endforeach
</table>
</div>
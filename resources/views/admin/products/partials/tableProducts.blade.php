<div id="contentTableProducts">
    <br>
    <input class="form-control" type="text" id="buscadorAdminProducts" placeholder="Name search">
    <br>
    <table id="tableProducts" class="table table-condensed table-responsive table-hover">
        <thead>
            <tr class="tableHeader">
                <td>Id</td>
                <td>Brand</td>
                <td>Name</td>
                <td>Offer/Discount</td>
                <td>Appears on offer</td>
                <td>Created</td>
                <td>Updated</td>
                <td>Options</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="text-center">
                <td>{{$product->id}}</td>
                <td>{{$product->brand->name}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->discount}}</td>
                <td>{{$product->appears_on_offer}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>
                <td> 
                    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('adminbrands.adminproducts.destroy', $product->brand->slug, $product->slug))) }}
                    {{ link_to_route('adminbrands.adminproducts.edit', '', array($product->brand->slug, $product->slug), array('class' => 'btn btn-warning glyphicon glyphicon-edit','data-toggle' => "tooltip",'title'=>"Edit Product")) }}
                    {{ link_to_route('adminbrands.adminproducts.adminimages.index', '', array($product->brand->slug, $product->slug,), array('class' => 'btn btn-info glyphicon glyphicon-picture','data-toggle' => "tooltip",'title'=>"Show Images")) }}
                    <button data-toggle ="tooltip" title="Delete Product" class="btn btn-danger glyphicon glyphicon-trash" type="submit"></button>
                    {{ Form::close() }}
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>
</div>
<div id="contentTableBrands">
    <br>
    <input class="form-control" type="text" id="buscadorAdminBrands">
    <br>
    <table id="tableBrands" class="table table-condensed table-responsive table-hover">
        <thead>
            <tr class="tableHeader">
                <td>Id</td>
                <td>Name</td>
                <td>Created</td>
                <td>Updated</td>
                <td>Options</td>

            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr class="text-center">
                <td>{{$brand->id}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->created_at}}</td>
                <td>{{$brand->updated_at}}</td>
                <td>

                    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('brands.destroy', $brand->slug))) }}
                    {{ link_to_route('brands.show', 'Show', array($brand->slug), array('class' => 'btn buttons'))}}
                    {{ link_to_route('brands.edit', 'Edit', array($brand->slug), array('class' => 'btn btn-warning'))}}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>        
            @endforeach
            <tr>
                <td colspan="5"> {{ link_to_route('brands.create', 'Add Brand') }}</td>
            </tr>
        </tbody>
    </table>
</div>
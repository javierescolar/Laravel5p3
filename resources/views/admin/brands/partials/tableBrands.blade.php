<div id="contentTableBrands">
    <br>
    <input class="form-control" type="text" id="buscadorAdminBrands" placeholder="Name search">
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

                    {{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('adminbrands.destroy', $brand->slug))) }}
                  
                    {{ link_to_route('adminbrands.show', '', array($brand->slug), array('class' => 'btn btn-primary glyphicon glyphicon-eye-open','data-toggle' => "tooltip",'title'=>"Show Products Brand"))}}
                    {{ link_to_route('adminbrands.edit', '', array($brand->slug), array('class' => 'btn btn-warning glyphicon glyphicon-edit','data-toggle' => "tooltip",'title'=>"Edit Brand"))}}
                    <button data-toggle ="tooltip" title="Delete Brand" class="btn btn-danger glyphicon glyphicon-trash" type="submit"></button>
                    {{ Form::close() }}
                </td>
            </tr>        
            @endforeach
        </tbody>
    </table>
    {{ link_to_route('adminbrands.create', 'New Brand') }}
</div>
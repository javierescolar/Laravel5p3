
<div class="container-fluid">

    
    <div class="col-md-2">
        <ul>
            <li>
                <a id="botonUsers" class=" btn-link col-md-12">User</a>
            </li>
            <li>
                <a id="botonBrands" class=" btn-link col-md-12">Brand</a>
            </li>
            <li>
                <a id="botonProducts" class="btn-link col-md-12">Product</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        @include('admin.partials.tableUsers')
        @include('admin.partials.tableBrands')
        @include('admin.partials.tableProducts')

    </div>
    <div class="col-md-12"></div>

</div>
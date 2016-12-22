
<div class="container">
    
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>
        <div class="col-md-12">
                
                <a id="botonUsers" class="btn btn-primary col-md-3">User</a>
                <a id="botonBrands" class="btn btn-primary col-md-3 col-md-offset-1">Brand</a>
                <a id="botonProducts" class="btn btn-primary col-md-3 col-md-offset-1">Product</a>
                
        </div>
        </br></br>
        <div class="col-md-10 col-md-offset-1">
            @include('admin.partials.tableUsers')
            @include('admin.partials.tableBrands')
            @include('admin.partials.tableProducts')
            
        </div>
        <div class="col-md-12"></div>
   
</div>
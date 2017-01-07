
<div class="container-fluid">
    <div class="col-md-2 menu-left">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Hamburger -->
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>

            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav">

                    <li>
                        <a id="botonUsers">User <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a id="botonBrands">Brand <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a id="botonProducts">Product <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <div class="side-menu-container">
                <table class="table table-responsive table-condensed">
                    <thead>
                    <th>Connect</th>
                    <th>Disonnect</th>
                    </thead>
                    <tbody>
                        @foreach($access as $acc)
                        <tr>
                            @if($acc->connect == $acc->disconnect)
                            <td class="small">{{$acc->connect}}</td>
                            <td class="small">Open session <span class="iconGreen glyphicon glyphicon-globe"></span></td>
                            @else
                            <td class="small">{{$acc->connect}}</td>
                            <td class="small">{{$acc->disconnect}}</td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>

                </table>

                </ul>
            </div>
        </nav>










        <!--
        <ul>
            <li>
                <a id="botonUsers" class="btn-link col-md-12">User</a>
            </li>
            <li>
                <a id="botonBrands" class="btn-link col-md-12">Brand</a>
            </li>
            <li>
                <a id="botonProducts" class=btn-link col-md-12">Product</a>
            </li>
        </ul>
        -->
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>

        @include('admin.partials.tableUsers')
        @include('admin.partials.tableBrands')
        @include('admin.partials.tableProducts')
    </div>
    <div class="col-md-12"></div>
</div>
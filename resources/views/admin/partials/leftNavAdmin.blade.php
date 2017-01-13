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
                        <a href="{{route('adminusers')}}"id="botonUsers">User <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a href="{{route('adminbrands.index')}}" id="botonBrands">Brand <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a href="{{route('products')}}" id="botonProducts">Product <span class="glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <li>
                        <a href="{{route('amdinUploadXML')}}" id="botonUploadXML">Upload XML <span class="glyphicon glyphicon-menu-right"></span></a>
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

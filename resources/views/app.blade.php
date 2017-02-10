<html>
    <head>
        <title>Mobile Shopping</title>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles.css" type="text/css" />
        <meta name="google-signin-client_id" content="6077178310-2fsuup66mj74g0kahe19hem5jm7gbr2h.apps.googleusercontent.com">
    </head>
    <body>
        @if (!Auth::guest())
        @if(Auth::user()->role == "admin")
        @include('admin.partials.navAdmin')
        @else
        @include('partials.nav')
        @endif
        @else
        @include('partials.nav')
        @endif

        <div class="fluit-container">
            <div class="row">
                @if (Session::has('message'))
                <div class="col-md-12">
                    <div class="flash alert-info col-md-6 col-md-offset-3">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                </div>

                @endif
                @if ($errors->any())
                <div class="col-md-12">
                    <div class='flash alert-danger col-md-6 col-md-offset-3'>
                        @foreach ( $errors->all() as $error )
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            @yield('content')
            @include('partials.footer')
        </div>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="{{ URL::to('/') }}/js/singInGoogle.js" type="text/javascript" async defer></script>

        <script type="text/javascript" src="{{ URL::to('/') }}/js/jquery-1.12.1.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ URL::to('/') }}/js/main.js"></script>
    </body>
</html>
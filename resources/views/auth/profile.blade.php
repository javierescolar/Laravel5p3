@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Profile
                    <form class="form-horizontal" role="form" method="POST" action="{{route('delete')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-10">
                                <button type="submit" class="btn btn-danger">
                                    Delete Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body">


                    <form class="form-horizontal" role="form" method="POST" action="{{route('profile')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <img src="img/{{$user->image}}" class="img img-responsive col-md-offset-5 col-xs-offset-3" id="imgProfile" alt="user_image"/>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name*</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address*</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone 1</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="phone1" value="{{ $user->phone1 }}">
                            </div>
                            <label class="col-md-2 control-label">Phone 2</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="phone2" value="{{ $user->phone2 }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Profession</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="profession" value="{{ $user->profession }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birthdate</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="birthdate" value="{{ $user->birthdate }}">
                            </div>


                            <label class="col-md-1 control-label">Gener</label>
                            <div class="col-md-2">
                                <select name="gener" class="form-control">
                                    @if( $user->gener == "male")
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                    @else
                                    <option value="male">Male</option>
                                    <option value="female" selected="">Female</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">About me</label>
                            <div class="col-md-6">
                                <textarea name="about" rows="5" class="form-control">{{$user->aboutme}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                
                                <p id="authorize-button" class="btn btn-danger col-md-offset-5">
                                    Google +
                                </p>
                                <button type="submit" class="btn btn-primary col-md-offset-1">
                                    Save Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var clientId = '489138468595-rclkke5etctb7ldja7g7a7ujs7q9c51e.apps.googleusercontent.com';
    var apiKey = 'd1G77y7pVo8YRup9aeO9bqSC';
    // To enter one or more authentication scopes, refer to the documentation for the API.
   
    var scopes = 'https://www.googleapis.com/auth/userinfo.profile';
    // Use a button to handle authentication the first time.
    function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth, 1);
    }
    function checkAuth() {
        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
    }
    function handleAuthResult(authResult) {
        var authorizeButton = document.getElementById('authorize-button');
        if (authResult && !authResult.error) {

            makeApiCall();
        } else {

            authorizeButton.onclick = handleAuthClick;
        }
    }
    function handleAuthClick(event) {
        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
        return false;
    }
    // Load the API and make an API call.  Display the results on the screen.
    function makeApiCall() {
        gapi.client.load('plus', 'v1', function () {
            var request = gapi.client.plus.people.get({
                'userId': 'me'
            });
            request.execute(function (resp) {
               
                document.getElementById('name').value = resp.displayName;
                //document.getElementById('email').value = resp.emails[0].value;
                //options[0].selected = (resp.gender === 'male') ? true : false;

            });
        });
    }
</script>
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
@endsection
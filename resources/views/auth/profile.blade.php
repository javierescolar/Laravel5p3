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
                        @if(Session()->has('imageGoogle'))
                            <img src="{{Session()->get('imageGoogle')}}" class="img img-responsive col-md-offset-5 col-xs-offset-3" id="imgProfile" alt="user_image"/>
                        @else
                            <img src="{{URL::to('/')}}/img/{{$user->image}}" class="img img-responsive col-md-offset-5 col-xs-offset-3" id="imgProfile" alt="user_image"/>
                        @endif
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone 1</label>
                            <div class="col-md-2">
                                <input id="phone1" type="text" class="form-control" name="phone1" value="{{ $user->phone1 }}">
                            </div>
                            <label class="col-md-2 control-label">Phone 2</label>
                            <div class="col-md-2">
                                <input id="phone2" type="text" class="form-control" name="phone2" value="{{ $user->phone2 }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Profession</label>
                            <div class="col-md-6">
                                <input id="profession" type="text" class="form-control" name="profession" value="{{ $user->profession }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birthdate</label>
                            <div class="col-md-3">
                                <input id="birthdate" title="format date (yyyy-mm-dd)" type="date" pattern="\d{4}-\d{1,2}-\d{1,2}" class="form-control" name="birthdate" value="{{ $user->birthdate }}">
                            </div>


                            <label class="col-md-1 control-label">Gener</label>
                            <div class="col-md-2">
                                <select name="gener" class="form-control" id="gener">
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
                                <textarea id="about" name="about" rows="5" class="form-control">{{$user->aboutme}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-7">
                                @if(Auth::user()->role != "admin")
                                    @if(Session()->has('access_token'))
                                    <a id="signinButton" class="btn btn-danger" href="{{URL::to('/')}}/profile/googlesingout">Google Sing Out</a>
                                    @else
                                    <a id="signinButton" class="btn btn-danger" href="{{URL::to('/')}}/profile/googlesingin">Google Sing In </a>
                                    @endif
                                @endif
                                <button type="submit" class="btn btn-primary" >
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


@endsection
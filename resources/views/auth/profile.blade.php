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
                                @if(Auth::user()->role != "admin")
                                <a href="{{url('profile/google/google')}}" id="authorize-button" class="btn btn-danger col-md-offset-6">
                                    Google +
                                </a>
                                @endif
                                <button type="submit" class="btn btn-primary">
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
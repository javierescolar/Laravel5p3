@extends('app')



@section('content')

<div class="container-fluid">
    <div class="col-md-2 menu-left">
        @include('admin.partials.leftNavAdmin')
    </div>
    <div class="col-md-10">
        <h5><strong><i class="glyphicon glyphicon-dashboard"></i> Admin Dashboard</strong></h5>

        <div id="contentFormUploadXML">
            <h3 class="tableHeader">Load XML</h3>
            {{Form::open(array('action' => 'AdminController@uploadXML', 'files' => true))}}
            <div class="form-group">
                <div class="col-md-10">
                    <input type="file" name="xmlFile" class="form-control" required>
                </div>
                <div class="col-md-1 col-md-offset-1">
                    <input type="submit" value="Upload" class="btn buttons">
                </div>
            </div>
            {{Form::close()}}
        </div>

        <div class="col-md-12"></div>
    </div>




    @endsection






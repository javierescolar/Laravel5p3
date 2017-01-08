<!-- /resources/views/brands/partials/_form.blade.php -->
<div class="form-group">
    <div class="col-md-4">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-5">
        {{ Form::label('logo', 'Logo:') }}
        {{ Form::file('logo',null,['class'=>'form-control']) }}
    </div>   
</div>
<div class="form-group">
    <div class="col-md-12"></div>
</div>
<div class="form-group">
    <div class="col-md-1">
        {{ Form::submit($submit_text, ['class'=>'btn buttons']) }}
    </div>

</div>
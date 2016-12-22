<!-- /resources/views/brands/partials/_form.blade.php -->
<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug:') }}
    {{ Form::text('slug',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('logo', 'Logo:') }}
    {{ Form::file('logo',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit($submit_text, ['class'=>'btn botones']) }}
</div>
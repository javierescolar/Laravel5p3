<!-- /resources/views/tasks/partials/_form.blade.php -->
<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}
</div>
 
<div class="form-group">
    {{ Form::label('slug', 'Slug:') }}
    {{ Form::text('slug',null,['class'=>'form-control']) }}
</div>
 

<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description',null,['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('price', 'Price:') }}
    {{ Form::number('price',null,['class'=>'form-control','step'=>'any']) }}
</div>

<div class="form-group">
    {{ Form::submit($submit_text,['class'=>'btn botones']) }}
</div>
<!-- /resources/views/tasks/partials/_form.blade.php -->
<div class="form-group">
    <div class="col-md-5">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-3">
        {{ Form::label('slug', 'Slug:') }}
        {{ Form::text('slug',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('price', 'Price:') }}
        {{ Form::number('price',null,['class'=>'form-control','step'=>'any']) }}
    </div>
    <div class="col-md-2">
        {{ Form::label('stock', 'Stock:') }}
        {{ Form::number('stock',null,['class'=>'form-control']) }}
    </div>

</div>


<div class="form-group">
    <div class="col-md-12">
        {{ Form::label('slogan', 'Slogan:') }}
        {{ Form::text('slogan',null,['class'=>'form-control']) }}
    </div>

</div>
<div class="form-group">
    <div class="col-md-4">
        {{ Form::label('characteristic_1', 'Characteristic 1:') }}
        {{ Form::text('characteristic_1',null,['class'=>'form-control']) }}

        {{ Form::label('characteristic_2', 'Characteristic 2:') }}
        {{ Form::text('characteristic_2',null,['class'=>'form-control']) }}

        {{ Form::label('characteristic_3', 'Characteristic 3:') }}
        {{ Form::text('characteristic_3',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-8">
        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',null,['class'=>'form-control','size' => '30x7']) }}
    </div>
</div>

<div class="form-group">
    <div class="col-md-1">
         {{ Form::submit($submit_text,['class'=>'btn buttons']) }}
    </div>
   
</div>
@for ($i = 0; $i < 5; $i++)
<div class="form-group">
    <label for="image[{{$i}}]">Image-{{($i+1)}}</label>
    <input type='file' name="image[{{$i}}]" class="form-control">
    <input type="checkbox" name="offer[{{$i}}]" value="Offer" class='form-control'>
    <input type="checkbox" name="carrusel[{{$i}}]" value="Carrusel" class='form-control'>
    <input type="checkbox" name="gallery[{{$i}}]" value="Gallery" class='form-control'>
</div>
@endfor

<div class="form-group">
    {{ Form::submit($submit_text,['class'=>'btn botones']) }}
</div>

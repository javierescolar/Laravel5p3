<div id='formImages'>
    @for ($i = 0; $i < 5; $i++)
    <div class="form-group col-md-12">
        <div class="col-md-6">
            <label for="image[{{$i}}]">Image-{{($i+1)}}</label>
            <input type='file' name="image[{{$i}}]" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label for="offer[{{$i}}]">Offer?</label>
            <input type="checkbox" name="offer[{{$i}}]" value="Offer" class='form-control'>
        </div>
        <div class="col-md-2">
            <label for="carrusel[{{$i}}]">Carrusel?</label>
            <input type="checkbox" name="carrusel[{{$i}}]" value="Carrusel" class='form-control'>
        </div>
        <div class="col-md-2">
            <label for="gallery[{{$i}}]">Gallery?</label>
            <input type="checkbox" name="gallery[{{$i}}]" value="Gallery" class='form-control'>
        </div>
    </div>
    @endfor
</div>

<div class="form-group">
    <div class="col-md-12"><p id="addImageForm" class="btn-link">new image</p></div>
    <div class="col-md-1">
        {{ Form::submit($submit_text,['class'=>'btn buttons']) }}
    </div>
</div>

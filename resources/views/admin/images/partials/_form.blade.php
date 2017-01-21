<div id='formImages'>
    <div class="form-group col-md-12">
        <div class="col-md-6">
            <label for="image[0]">Image-1</label>
            <input type='file' name="image[0]" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label for="offer[0]">Offer?</label>
            <input type="checkbox" name="offer[0]" value="Offer" class='form-control'>
        </div>
        <div class="col-md-2">
            <label for="carrusel[0]">Carrusel?</label>
            <input type="checkbox" name="carrusel[0]" value="Carrusel" class='form-control'>
        </div>
        <div class="col-md-2">
            <label for="gallery[0]">Gallery?</label>
            <input type="checkbox" name="gallery[0]" value="Gallery" class='form-control'>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12"><p id="addImageForm" class="btn-link">new image</p></div>
    <div class="col-md-1">
        {{ Form::submit($submit_text,['class'=>'btn buttons']) }}
    </div>
</div>

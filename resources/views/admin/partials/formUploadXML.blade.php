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




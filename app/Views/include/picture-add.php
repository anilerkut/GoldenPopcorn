<!-- PICTURE ADD -->
<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5"  action="PictureController/addPicture" method="post">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputPictureLink">Picture Link</label>
                <input type="text" class="form-control" id="inputPictureLink" name="picture_link">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputMovie">Related Movie</label>
                <select id="inputMovie" class="form-control" name='movie_id'>
                    <option selected>Choose A Movie</option>
                    <option>Movie - Name</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
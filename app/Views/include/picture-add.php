<!-- PICTURE ADD -->

<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <form class="mt-5"  action="PictureController/addPicture" method="post">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputPictureLink">Picture Link</label>
                <input type="text" class="form-control" id="inputPictureLink" name="picture_link">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputMovie">Movie</label>
                <select id="inputMovie" class="form-control" name="movie_id">
                    <option selected>Choose Movie</option>
                    <?php foreach ($movie as $key=> $mov): ?>
                        <option value="<?=$mov['id'] ?>"><?php echo $mov["movie_name"];?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>
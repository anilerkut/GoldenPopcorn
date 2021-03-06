<!-- PICTURE ADD -->

<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
        <h4>Update Picture Link</h4>
        <form action="<?= base_url('PictureController/update/'.$picture['id']) ?>" method="POST" class="mt-5">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFullName">Picture Link</label>
                    <input type="text" class="form-control" id="inputFullName" name="picture_link" value="<?= $picture['picture_link'] ?>">
                </div>
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
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>


<?= $this->include('data/admin-operation-bottom.php') ?>
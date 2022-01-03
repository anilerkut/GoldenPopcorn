<!-- Movie Category Update -->

<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
        <h4>Update Movie Director</h4>
        <form action="<?= base_url('MovieDirectorController/update/'.$movieDirectorModel['id']) ?>" method="POST" class="mt-5">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="inputMovie">Movie</label>
                    <select id="inputMovie" class="form-control" name="movie_id">
                        <option selected>Choose Movie</option>
                        <?php foreach ($movie as $key=> $lan): ?>
                            <option value="<?=$lan['id'] ?>"><?php echo $lan["movie_name"];?></option>
                        <?php endforeach ?>
                    </select>
            </div>
            <div class="form-group col-md-6">
                    <label for="inputCategory">Director</label>
                    <select id="inputCatefory" class="form-control" name="director_id">
                        <option selected>Choose Director</option>
                        <?php foreach ($director as $key=> $dir): ?>
                            <option value="<?=$dir['id'] ?>"><?php echo $dir["director_name"];?></option>
                        <?php endforeach ?>
                    </select>
            </div>
        </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>


<?= $this->include('data/admin-operation-bottom.php') ?>
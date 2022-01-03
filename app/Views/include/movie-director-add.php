<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <form class="mt-5" action="/MovieDirectorController/addMovieDirectors" method="post">
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
            <div class="form-group col-md-6">
                <label for="inputDirector">Director</label>
                <select id="inputDirector" class="form-control" name="director_id">
                    <option selected>Choose Director</option>
                    <?php foreach ($director as $key=> $dir): ?>
                        <option value="<?=$dir['id'] ?>"><?php echo $dir["director_name"];?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>

<?= $this->include('data/admin-operation-bottom.php') ?>
<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <form class="mt-5" action="/MovieWarningController/addMovieWarnings" method="post">
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
                <label for="inputWarning">Warnings</label>
                <select id="inputWarning" class="form-control" name="warning_id">
                    <option selected>Choose Warnings</option>
                    <?php foreach ($warnings as $key=> $cat): ?>
                        <option value="<?=$cat['id'] ?>"><?php echo $cat["warning_name"];?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>

<?= $this->include('data/admin-operation-bottom.php') ?>
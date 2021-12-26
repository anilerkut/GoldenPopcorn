<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5" action="/MovieCategoryController/addMovieCategories" method="post">
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
                <label for="inputCategory">Category</label>
                <select id="inputCategory" class="form-control" name="category_id">
                    <option selected>Choose Category</option>
                    <?php foreach ($category as $key=> $cat): ?>
                        <option value="<?=$cat['id'] ?>"><?php echo $cat["category_name"];?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>

<?= $this->include('data/admin-operation-bottom.php') ?>
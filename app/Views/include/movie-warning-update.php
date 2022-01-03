<!-- Movie Warning Update -->

<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
        <h4>Update Movie Warning</h4>
        <form action="<?= base_url('MovieWarningController/update/'.$movieWarningModel['id']) ?>" method="POST" class="mt-5">
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
                    <label for="inputCategory">Warning</label>
                    <select id="inputCatefory" class="form-control" name="warning_id">
                        <option selected>Choose Warning</option>
                        <?php foreach ($warning as $key=> $war): ?>
                            <option value="<?=$war['id'] ?>"><?php echo $war["warning_name"];?></option>
                        <?php endforeach ?>
                    </select>
            </div>
        </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>


<?= $this->include('data/admin-operation-bottom.php') ?>
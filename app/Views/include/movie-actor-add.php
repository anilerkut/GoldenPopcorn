<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5" action="/MovieActorController/addRole" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputRole">Role</label>
                <input type="text" class="form-control" id="inputRole" name="role_name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputActor">Actor</label>
                <select id="inputActor" class="form-control" name="actor_id">
                    <option selected>Choose Actor</option>
                    <?php foreach ($actor as $key=> $act): ?>
                        <option value="<?=$act['id'] ?>"><?php echo $act["actor_firstname"]." ".$act["actor_lastname"];?></option>
                    <?php endforeach ?>
                </select>
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
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>

<?= $this->include('data/admin-operation-bottom.php') ?>
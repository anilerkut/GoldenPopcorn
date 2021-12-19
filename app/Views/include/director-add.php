<!-- DIRECTOR ADD -->

<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px);">
    <form action="/DirectorController/addDirector" method="POST" class="mt-5">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputFullName">Full Name</label>
                <input type="text" class="form-control" id="inputFullName" name="director_name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputGender">Gender</label>
                <select id="inputGender" class="form-control" name="director_gender">
                    <option selected>Choose Gender</option>
                    <?php foreach ($gender as $key=> $gen): ?>
                        <option value="<?=$gen['id'] ?>"><?php echo $gen["gender_name"];?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="inputdirectorPicture">Director Picture</label>
                    <input type="text" class="form-control" id="inputFullName" name="director_picture">
                </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
    <br><hr>
    <?php if(isset($validation)):?>
                    <div class="col-12"> 
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
    <?php endif;?>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>
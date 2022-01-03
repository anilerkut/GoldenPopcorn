<!-- ACTOR ADD-->
<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <form class="mt-5" action="/ActorController/addActor" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputFirstName">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="actor_firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="actor_lastname">
            </div>
            <div class="form-group col-md-6">
                <label for="inputActorPic">Actor Picture Link</label>
                <input type="text" class="form-control" id="inputLastName" name="actor_picture">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputBirthdate">Birthdate</label>
                <input type="date" class="form-control" id="inputBirthdate" name="actor_birthdate">
            </div>
            <div class="form-group col-md-6">
                <label for="inputGender">Gender</label>
                <select id="inputGender" class="form-control" name="actor_gender">
                    <option selected>Choose Gender</option>
                    <?php foreach ($gender as $key=> $gen): ?>
                        <option value="<?=$gen['id'] ?>"><?php echo $gen["gender_name"];?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>

<?= $this->include('data/admin-operation-bottom.php') ?>
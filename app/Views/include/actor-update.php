<!-- ACTOR ADD-->
<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputFirstName">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="actor_firstName">
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="actor_lastName">
            </div>
            <div class="form-group col-md-6">
                <label for="inputActorPic">Last Name</label>
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
                <select id="inputGender" class="form-control">
                    <option selected>Choose Gender</option>
                    <option>Male</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>

<?= $this->include('data/admin-operation-bottom.php') ?>
<!-- DIRECTOR Update -->

<?= $this->include('data/admin-operation-top.php') ?>

    <div class="container" style="min-height : calc(100vh - 200px);">
        <h4>Update Director</h4>
        <form action="<?= base_url('DirectorController/update/'.$director['id']) ?>" method="POST" class="mt-5">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFullName">Full Name</label>
                    <input type="text" class="form-control" id="inputFullName" name="director_name" value="<?= $director['director_name'] ?>">
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
<!-- GENDER ADD -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
        <h4>Update Gender</h4>
        <form action="<?= base_url('GenderController/update/'.$gender['id']) ?>" method="POST" class="mt-5">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFullName">Gender Name</label>
                    <input type="text" class="form-control" id="inputFullName" name="gender_name" value="<?= $gender['gender_name'] ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>

<?= $this->include('data/admin-operation-bottom.php') ?>
<!-- WARNING ADD -->

<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
        <h4>Update Warning</h4>
        <form action="<?= base_url('WarningController/update/'.$warning['id']) ?>" method="POST" class="mt-5">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFullName">Warning Name</label>
                    <input type="text" class="form-control" id="inputFullName" name="warning_name" value="<?= $warning['warning_name'] ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>


<?= $this->include('data/admin-operation-bottom.php') ?>
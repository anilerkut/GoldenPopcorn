<!-- CATEGORY ADD -->

<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
        <h4>Update Category</h4>
        <form action="<?= base_url('CategoryController/update/'.$category['id']) ?>" method="POST" class="mt-5">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFullName">Category Name</label>
                    <input type="text" class="form-control" id="inputFullName" name="category_name" value="<?= $category['category_name'] ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>

<?= $this->include('data/admin-operation-bottom.php') ?>
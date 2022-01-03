<!-- CATEGORY ADD -->

<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <form class="mt-5"  action="/CategoryController/addCategory" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCategoryName">Category Name</label>
                <input type="text" class="form-control" id="inputCategoryName" name="category_name"> 
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
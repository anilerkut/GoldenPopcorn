<!-- CATEGORY ADD -->
<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5"  action="CategoryController/addCategory">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCategoryName">Category Name</label>
                <input type="text" class="form-control" id="inputCategoryName" name="category_name">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
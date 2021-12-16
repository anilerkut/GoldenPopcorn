<!-- NEWS ADD -->

<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5" method="post">
        <div class="form-row">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">News Content</span>
                </div>
                <textarea class="form-control" id="newsContent" aria-label="News Content" name= "news_content"></textarea>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputActor">Related Actor</label>
                <select id="inputActor" class="form-control">
                    <option selected>Choose An Actor</option>
                    <option>Actor - FirstName LastName</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDirector">Related Director</label>
                <select id="inputDirector" class="form-control">
                    <option selected>Choose An Director</option>
                    <option>Director - FullName</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>
<!-- NEWS ADD -->

<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
    <form class="mt-5"  action="NewsController/addNews" method="post">
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
                <div class="input-group-prepend">
                    <label for="inputNewsDate">News Date</label>
                </div>
                <input type="date" class="form-control" id="newsDate"  name="news_date">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                        <label for="inputRelatedActor">Related Actor</label>
                        <select id="inputRelatedActor" class="form-control" name="actor_id">
                            <option selected>Choose Actor</option>
                            <?php foreach ($actor as $key=> $act): ?>
                                <option value="<?=$act['id'] ?>"><?php echo $act["actor_firstname"]." ".$act["actor_lastname"]  ;?></option>
                            <?php endforeach ?>
                        </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>


<?= $this->include('data/admin-operation-bottom.php') ?>
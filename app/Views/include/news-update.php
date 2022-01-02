<!-- Movie ADD -->
<?= $this->include('data/admin-operation-top.php') ?>

<div class="container" style="min-height : calc(100vh - 200px);">
<h4>Update News </h4>
    <form action="<?= base_url('NewsController/update/'.$news['id']) ?>">
        <div class="form-row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">News Content</span>
                </div>
                <textarea class="form-control" id="newsContent" aria-label="News Content" name= "news_content" value="<?= $news['news_content'] ?>"></textarea>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="input-group-prepend">
                    <label for="inputNewsDate">News Date</label>
                </div>
                <input type="date" class="form-control" id="newsDate"  name="news_date" value="<?= $news['news_date'] ?>">
            </div>
            <div class="form-group col-md-6">
                <div class="input-group-prepend">
                    <label for="inputNewsDate">News Title</label>
                </div>
                <input type="text" class="form-control" id="newsDate"  name="news_title" value="<?= $news['news_title'] ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                        <label for="inputRelatedActor">Related Actor</label>
                        <select id="inputRelatedActor" class="form-control" name="actor_id" value="">
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
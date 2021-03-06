<!-- Movie ADD -->
<?= $this->include('data/admin-operation-top.php') ?>


<div class="container" style="min-height : calc(100vh - 200px); margin-left:300px">
    <form class="mt-5" action="MovieController/addMovie" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputMovieName">Movie Name</label>
                <input type="text" class="form-control" id="inputMovieName" name="movie_name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputMovieReleaseDate">Release Date</label>
                <input type="date" class="form-control" id="inputMovieReleaseDate"  name="movie_releasedate">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputMovieDuration">Movie Duration</label>
                <input type="number" class="form-control" id="inputMovieDuration" min="1"  name="movie_duration">
            </div>
            <div class="form-group col-md-6">
                <label for="inputMovieGross">Movie Gross</label>
                <input type="number" class="form-control" id="inputMovieGross" min="1"  name="movie_gross">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="inputMovieLanguage">Related Language</label>
                    <select id="inputMovieLangauge" class="form-control" name="language_id">
                        <option selected>Choose Langauage</option>
                        <?php foreach ($language as $key=> $lan): ?>
                            <option value="<?=$lan['id'] ?>"><?php echo $lan["language_name"];?></option>
                        <?php endforeach ?>
                    </select>
            </div>
            <div class="form-group col-md-6">
                    <label for="inputMovieCountry">Related Country</label>
                    <select id="inputMovieCountry" class="form-control" name="country_id">
                        <option selected>Choose Country</option>
                        <?php foreach ($country as $key=> $count): ?>
                            <option value="<?=$count['id'] ?>"><?php echo $count["country_name"];?></option>
                        <?php endforeach ?>
                    </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputMovieIMDBRating">IMDB Rating</label>
                <input type="number" step="0.01" min="0" max="10" class="form-control" id="inputMovieIMDBRating" name="imdb_rating">
            </div>
            <div class="form-group col-md-4">
                <label for="inputMovieRottentomatoesRating">Rottentomatoes Rating</label>
                <input type="number" class="form-control" id="inputMovieRottentomatoesRating" min="0"  name="rottentomatoes_rating">
            </div>
            <div class="form-group col-md-4">
                <label for="inputMovieMetacriticRating">Metacritic Rating</label>
                <input type="number" class="form-control" id="inputMovieMetacriticRating" min="0"  name="metacritic_rating">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputMovieTrailerLink">Trailer Link</label>
                <input type="text" class="form-control" id="inputMovieTrailerLink"  name="movie_trailer">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputMoviePosterLink">Poster Link</label>
                <input type="text" class="form-control" id="inputMoviePosterLink"  name="movie_poster">
            </div>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Movie Summary</span>
            </div>
            <textarea class="form-control" id="movieSummary" aria-label="Movie Summary" name= "movie_summary"></textarea>
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
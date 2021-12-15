<!-- Movie ADD -->
<?php
@session_start(); // oturum islemleri de yapacagımız icin
@ob_start(); // yonlendırme ve bazı headaer islemlerini kullanabilmek icin
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="../admin.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?= $this->include('data/admin-top-menu.php') ?>
    <?= $this->include('data/admin-menu.php') ?>


<div class="container" style="min-height : calc(100vh - 200px);">
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
                <label for="inputMovieCountry">Related Country</label>
                <select id="inputMovieCountry" class="form-control">
                    <option selected>Choose Movie Country</option>
                    <option>Movie - Country</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMovieLanguage">Related Language</label>
                <select id="inputMovieLanguage" class="form-control">
                    <option selected>Choose Movie Language</option>
                    <option>Movie - Language</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputMovieIMDBRating">IMDB Rating</label>
                <input type="number" class="form-control" id="inputMovieIMDBRating" min="0"  name="imdb_rating">
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
</div>

<?= $this->include('data/admin-footer.php') ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
</body>
</html>
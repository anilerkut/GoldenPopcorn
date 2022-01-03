<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/pagination.css">
    <link rel="stylesheet" href="/css/main-page-header.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Orbitron:wght@500&family=Oswald:wght@300&display=swap" rel="stylesheet">

    <title> GoldenPopcorn</title>
</head>
<body>

<?= $this->include('site/mainpage-header.php') ?>

<div class="container my-5 container-color p-5">

    <h2 class="text-center" style="font-family: 'Amaranth', sans-serif;">RECOMMENDED MOVIE</h2>
    <div class="row mb-4 d-flex justify-content-center">
        <?php foreach ($movie as $row) : ?>
            <div class="col-md-3 my-4">
                <div class="card border-rounded p-2 mx-auto">

                    <a href="<?= base_url('movie/'.$row['id'] ) ?>" class="btn bg-black-main">
                        <img src="<?=$row['movie_poster']?>" class="card-img-top rounded-top img-height"alt="...">
                    </a>

                    <div class="card-body card-body-height" >

                        <h5 class="card-title card-text-white"><?= $row['movie_name'] ?></h5>
                        <span class="movie_info card-text-white"><?= $row['movie_releasedate'] ?></span>
                        <span class="movie_info float-right card-text-white"><i class="fas fa-star card-star-color"></i> <?= $row['imdb_rating'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->include('site/mainpage-footer.php') ?>


<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

</body>

</html>

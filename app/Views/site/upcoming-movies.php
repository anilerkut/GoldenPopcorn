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

    <title> GoldenPopcorn | Upcoming Movies </title>
</head>
<body>

    <?= $this->include('site/mainpage-header.php') ?>

    <a href="top"></a>

    <div class="container my-5">

        <h2 class="text-center">UPCOMING MOVIES</h2>
        <div class="row mb-4">           
        <?php foreach ($movie as $row) : ?>
            <div class="col-md-3 my-4" >
                <div class="card border-rounded p-2"> 
                        <a href="<?= base_url('movie/'.$row['id'] ) ?>" class="btn btn-warning">
                            <img src=<?=$row['movie_poster']?> class="card-img-top rounded-top img-height"alt="...">  
                        </a>

                    <div class="card-body card-body-height" >
                        <h5 class="card-title"><?= $row['movie_name'] ?></h5>
                        <span class="movie_info"><?= $row['movie_releasedate'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>

        <nav>
            <?= $pager->links() ?>
        </nav>

    </div>

    <div class="my-5 mr-5">
        <a class="btn btn-lg btn-primary float-right" href="#top"><i class="fas fa-arrow-up"></i></a>
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

        let btnSearch = document.querySelector('#btnSearch');
        btnSearch.addEventListener("click", searchMovie);

        function searchMovie() {
            let inputTxt = document.querySelector('#searchTxt');
            console.log('ARANAN FİLM ADI: ' + inputTxt.value);
            window.location.href = "MovieController/searchByName/" + inputTxt.value;
        }

    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>
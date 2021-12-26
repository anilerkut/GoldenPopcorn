<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/news.css">
    <title>Document</title>
</head>

<body>

<?= $this->include('site/mainpage-header.php') ?>

<div class="container my-5">

    <div class="dropdown">
        <button class="btn btn-lg btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sort By Date
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/NewsController/listByNewDate">New To Old</a>
            <a class="dropdown-item" href="/NewsController/listByOldDate">Old To New</a>
        </div>
    </div>

    <h2 class="text-center">ALL NEWS</h2>
    <div class="row my-4">
        <?php foreach ($news as $row) : ?>
        <div class="col-sm-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $row['news_title'] ?></h5>
                    <p class="card-text display-4"><?= $row['actor_firstname']." ".$row['actor_lastname'] ?></p>
                    <a href="<?= base_url('/news-details/'.$row['id']) ?>" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
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

</body>

</html>

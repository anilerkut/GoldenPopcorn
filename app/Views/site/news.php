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
    <div class="row">
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

</body>

</html>

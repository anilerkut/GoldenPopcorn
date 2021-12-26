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
    <link rel="stylesheet" href="/css/news-details.css">
    <title>Document</title>
</head>

<body>

<?= $this->include('site/mainpage-header.php') ?>

<div class="container my-5">
    <div class="card">
        <div>
            <img src="<?= $news->actor_picture ?>"
                 class="card-img-top img-height d-block mx-auto my-2" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $news->news_title ?></h5>
            <p class="card-text"><?= $news->news_content ?></p>
        </div>
        <div class="card-footer">
            <p class="text-muted mt-2">Related Actor: <?= $news->actor_firstname." ".$news->actor_lastname ?></p>
            <small class="text-muted float-right"><?= $news->news_date ?></small>
        </div>
    </div>
</div>

<?= $this->include('site/mainpage-footer.php') ?>

</body>

</html>

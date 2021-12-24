<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
            integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

      <link href="/css/actor.css" type="text/css" rel="stylesheet"/>

    <title>Hello, world!</title>
  </head>
  <body>

  <?= $this->include('site/mainpage-header.php') ?>

  <div class="container">
      <div class="row">
          <?php foreach ($actor as $row) : ?>
          <div class="col-md-4 my-4">
              <div class="card text-center">
                  <img src="<?= $row['actor_picture'] ?>" class="card-img-top img-height" alt="...">
                  <div class="card-body bg-black">
                      <p class="card-text font-weight-bold text-white"><?= $row['actor_firstname']." ".$row['actor_lastname'] ?></p>
                  </div>
              </div>
          </div>
          <?php endforeach; ?>
      </div>
  </div>

  <?= $this->include('site/mainpage-footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
            integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
            integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

      <link href="/css/actor.css" type="text/css" rel="stylesheet"/>
      <link rel="stylesheet" href="/css/main-page-header.css">
      <link rel="stylesheet" href="/css/pagination.css">
      <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Orbitron:wght@500&family=Oswald:wght@300&display=swap" rel="stylesheet">


    <title>GoldenPopcorn | Actors </title>
  </head>
  <body>

  <?= $this->include('site/mainpage-header.php') ?>

  <div class="container my-5">

      <div class="dropdown  ml-5 mt-4 mb-3">
          <button class="btn cat-dropdown btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort By Name
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/ActorController/listByAtoZ">A to Z</a>
              <a class="dropdown-item" href="/ActorController/listByZtoA">Z to A</a>
          </div>
      </div>

      <h2 class="text-center" style="font-family: 'Amaranth', sans-serif;">ACTORS</h2>
      <div class="row ml-4 mb-4">
          <?php foreach ($actor as $row) : ?>
            <div class="col-md-4 my-4">
              <div class="card">            
                <div class="card__image-container">
                  <a href="<?= base_url('ActorController/actorDetails/'.$row['id'] ) ?>">
                      <img class="card__image" src="<?=$row['actor_picture']?>" alt="">
                  </a>
                </div>
                <svg class="card__svg" viewBox="0 0 800 500">
                    <path d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400 L 800 500 L 0 500" stroke="transparent" fill="#e7662a"/>
                    <path class="card__line" d="M 0 100 Q 50 200 100 250 Q 250 400 350 300 C 400 250 550 150 650 300 Q 750 450 800 400" stroke="orange" stroke-width="8" fill="transparent"/>
                </svg>
      
                <div class="card__content">
                    <h1 class="card__title"><?= $row['actor_firstname']." ".$row['actor_lastname'] ?></h1>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
      </div>

      <nav>
          <?= $pager->links() ?>
      </nav>

  </div>

  <?= $this->include('site/mainpage-footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  </body>
</html>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/movie-detail.css">
    <link rel="stylesheet" href="/css/director.css">
    <link rel="stylesheet" href="/css/main-page-header.css">
    <title>GoldenPopcorn | <?= $movie["movie_name"]?></title>
</head>
<body>

<?= $this->include('site/mainpage-header.php') ?>

<section class="my-5">

        <!-- row start -->
        <div class="row">
          <!-- left start -->
          <div class="col-md-6">
              <img src="<?= $movie["movie_poster"]?>" class="d-block w-50 mx-auto" style="" alt="...">
              <div class="text-center">
                  <p class="my-4 mx-3"><?= $movie["movie_summary"]?></p>
                  <button class="btn btn-outline-danger btn-lg mx-auto" id="addToWatchlist">
                      <i class="fas fa-heart fa-lg"></i>
                      Add to Watchlist
                  </button>
              </div>
          </div>
          <!-- left end -->
          <!-- right start -->
          <div class="col-md-4">
              <h3><?= $movie["movie_name"] ?></h3>
                <div>
                    <span class="font-weight-bold">Category: </span>
                    <?php foreach ($categories as $row) : ?>
                            <span><?=$row['category_name']?></span>
                    <?php endforeach; ?>
                    <span class="font-weight-bold">Warning: </span>
                    <?php foreach ($warnings as $row) : ?>
                            <span><?=$row['warning_name']?></span>
                    <?php endforeach; ?>
               </div>
              <hr>
              <h4>Rate Movie</h4>
                <div class="stars" data-rating="3">
                    <?php if($user_rating == null) :?>
                    <a href="/movie/<?= $movie["id"]?>/rating/1" class="rating">
                        <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    </a>
                    <a href="/movie/<?= $movie["id"]?>/rating/2" class="rating">
                        <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    </a>
                    <a href="/movie/<?= $movie["id"]?>/rating/3" class="rating">
                        <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    </a>
                    <a href="/movie/<?= $movie["id"]?>/rating/4" class="rating">
                        <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    </a>
                    <a href="/movie/<?= $movie["id"]?>/rating/5" class="rating">
                        <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                    </a>
                    <?php else :?>
                        <?php
                        $i = 1;
                        for (; $i <= (int)$user_rating->rating; $i++) : ?>
                        <a href="/movie/<?= $movie["id"]?>/rating/<?= $i ?>" class="rating">
                            <img src="<?= base_url('org.png')?>" style="width: 80px; height: 80px" alt="">
                        </a>
                        <?php endfor; ?>
                        <?php for ($j = $i; $j <= 5; $j++) : ?>
                            <a href="/movie/<?= $movie["id"]?>/rating/<?= $j ?>" class="rating">
                                <img src="<?= base_url('blackwhite.png')?>" style="width: 80px; height: 80px" alt="">
                            </a>
                        <?php endfor; ?>
                    <?php endif; ?>
                    <h4 class="text-center mt-4 display-4"><?php if($user_rating == null) {echo "0";}
                        else {echo (int)$user_rating->rating;}?>/5</h4>
                </div>
              <table class="table table-hover mt-5">
                  <thead>
                      <tr>
                          <th scope="col">Website</th>
                          <th scope="col">Score</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                            <?php if($movie["rottentomatoes_rating"]!=0){}?>
                          <td> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Rotten_Tomatoes.svg/1009px-Rotten_Tomatoes.svg.png" alt="tomato_logo" style="width:50px;height:50px"><span class="rating-font"> Rotten Tomatoes</span></td>
                          <td> <?php if($movie["rottentomatoes_rating"]!=0){echo $movie["rottentomatoes_rating"];}
                                else{echo "?";}?></td>
                      </tr>
                      <tr>
                          <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/IMDb_Logo_Square.svg/2048px-IMDb_Logo_Square.svg.png" alt="imdb_logo" style="width:50px;height:50px"><span class="rating-font"> Imdb</span></td>
                          <td> <?php if($movie["imdb_rating"]!=0){echo $movie["imdb_rating"];}
                                else{echo "?";}?></td>
                      </tr>
                      <tr>
                          <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Metacritic.svg/1024px-Metacritic.svg.png" alt="meta_logo" style="width:50px;height:50px"><span class="rating-font"> Meta Critic</span></td>
                          <td> <?php if($movie["metacritic_rating"]!=0){echo $movie["metacritic_rating"];}
                                else{echo "?";}?></td></td>
                      </tr>
                      <tr>
                          <td><img src="<?= base_url('org.png')?>" alt="imdb_logo" style="width:50px;height:60px"><span class="rating-font">Golden Popcorn</span></td>
                          <td><?php if ($rating === null) {echo "?"; }
                                    else {echo number_format($rating->rating, 1);}?>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          <!-- right end -->
        </div>
        <!-- row end -->

        <!-- row start -->
        <div class="row mt-4 container">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="movie-actors-tab" data-toggle="tab" href="#movie-actors" role="tab" aria-controls="movie-actors" aria-selected="true">Actors</a>
              <a class="nav-item nav-link" id="movie-directors-tab" data-toggle="tab" href="#movie-directors" role="tab" aria-controls="movie-directors" aria-selected="false">Directors</a>
              <a class="nav-item nav-link" id="movie-informations-tab" data-toggle="tab" href="#movie-informations" role="tab" aria-controls="movie-informations" aria-selected="false">Movie Details</a>
              <a class="nav-item nav-link" id="movie-pictures-tab" data-toggle="tab" href="#movie-pictures" role="tab" aria-controls="movie-pictures" aria-selected="false">Movie Pictures</a>
              <a class="nav-item nav-link" id="movie-trailer-tab" data-toggle="tab" href="#movie-trailer" role="tab" aria-controls="movie-trailer" aria-selected="false">Trailer</a>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <!-- actors tab -->
            <div class="tab-pane fade show active" id="movie-actors" role="tabpanel" aria-labelledby="movie-actors-tab">
                <table class="table table-hover">
                      <thead>
                          <tr>
                              <th class="px-5" scope="col">Picture</th>
                              <th class="px-5" scope="col">Actor/Actress</th>
                              <th class="px-5" scope="col">Role</th>
                          </tr>
                      </thead>
                      <?php foreach ($role as $row) : ?>
                              <tbody class="text-center">
                                  <td>
                                      <img src="<?=$row['actor_picture']?>" width="80px" height="100px" alt="">
                                  </td>
                                  <td style="vertical-align:middle">
                                        <a href="<?= base_url('ActorController/actorDetails/'.$row['actor_id'] ) ?>"><?=$row['actor_firstname']." ".$row['actor_lastname']?></a>
                                  </td>
                                  <td style="vertical-align:middle">
                                      <?=$row['role_name']?>
                                  </td>
                              </tbody>
                      <?php endforeach; ?>
                </table>
            </div>

            <!-- directors tab -->
            <div class="tab-pane fade" id="movie-directors" role="tabpanel" aria-labelledby="movie-directors-tab">
                <?php foreach ($director as $row) : ?>
                        <div class="col-md-4">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front director-img-height">
                                        <img src="<?=$row['director_picture']?>" alt="Avatar"
                                             class="director-img-height">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1><?=$row['director_name']?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>

            <!-- movie details tab -->
            <div class="tab-pane fade" id="movie-informations" role="tabpanel" aria-labelledby="movie-informations-tab">
                  <p> <b> Duration </b>:<?= $movie["movie_duration"]?> Minutes </p>
                  <p> <b> Release Date </b>: <?= $movie["movie_releasedate"]?></p>
                  <p> <b> Country </b>: <?= $country["country_name"]?></p>
                  <p> <b> Language </b>: <?= $language["language_name"]?></p>
                  <p> <b> Movie Gross </b>: $<?php if($movie["movie_gross"]!=100){echo $movie["movie_gross"];}
                                else{echo "?";}?></p>
            </div>

            <!-- movie pictures tab -->
            <div class="tab-pane fade" id="movie-pictures" role="tabpanel" aria-labelledby="movie-pictures-tab">
              
              <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                
                    <div class="carousel-inner carousel-height">
                   
                        <?php  $i=0; foreach ($picture as $row) : ?>
                        { 
                            <?php if($i==0){ ?><div class="carousel-item active carousel-height" >
                                                <img src=" <?= $row['picture_link']?>" class="d-block w-100 carousel-height"  alt="...">
                                                </div>
                            <?php  }?>
                            <?php if($i!=0){ ?><div class="carousel-item carousel-height">
                                                <img src=" <?= $row['picture_link']?>" class="d-block w-100 carousel-height" alt="...">
                                                </div>
                            <?php }$i++?>
                        } <?php endforeach; ?>
                    
                    </div>
                
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
               </div>

            </div>
            <!-- rating tab -->
            <div class="tab-pane fade" id="movie-rating" role="tabpanel" aria-labelledby="movie-rating-tab">

            </div>
            <!-- trailer tab -->
              <div class="tab-pane fade" id="movie-trailer" style="width:100vw " role="tabpanel" aria-labelledby="movie-trailer-tab" >
                  <div class="trailer-tab-center " style="display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100vW;">
                      <iframe width="1000" height="600" class=""
                              src="<?php echo $movie["movie_trailer"]?>" type="video/mp4">
                      </iframe>
                  </div>
              </div>
          </div>
        </div>
        <!-- row end -->
        <form action="<?= base_url('CommentController/addComment/'.session()->get('user')['id'].'/'.$movie['id']) ?>" method="post">
                    <section style="background-color: #d94125;">
                        <div class="row d-flex justify-content-center py-3">
                            <div class="col-md-10 col-lg-8 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start w-100">
                                            <div class="w-100">
                                                <h5>Add Comment</h5>
                                                <div class="form-outline">
                                                    <textarea class="form-control" id="commentArea" rows="4" name="comment_content"
                                                        placeholder="What is your view?"></textarea>
                                                </div>
                                                <div class="d-flex justify-content-end mt-2">
                                                    <button type="submit" class="btn btn-success" id="comment">
                                                        Send <i class="fas fa-long-arrow-alt-right ms-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($validation)):?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-warning">
                                    <?= $validation->listErrors() ?>
                                </div>
                            </div>
                        <?php endif;?>
                    </section>
        </form>
                
                <section class=>
                    <div class="my-3 py-3">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-10">
                                <div class="card text-dark">
                                    <div class="card-body p-4">
                                        <h4 class="mb-0">Recent comments</h4>
                                        <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>
                                            <?php foreach ($comment as $row) : ?>
                                                <div class="d-flex flex-start mt-3">
                                                            <img
                                                                class="rounded-circle shadow-1-strong me-3"
                                                                src="<?="/uploads/".$row["user_image"]?>"
                                                                alt="avatar"
                                                                width="60"
                                                                height="60"
                                                            />
                                                            <div class="ml-3">
                                                                <h6 class="fw-bold mb-1"><?= $row["user_firstname"]." ". $row["user_lastname"]?></h6>
                                                                <div class="d-flex align-items-center mb-3">
                                                                <p class="mb-0">
                                                                    <?= $row["comment_date"]?>                       
                                                                </p>
                                                                </div>
                                                                <p class="mb-0">
                                                                    <?= $row["comment_content"]?>
                                                                </p>
                                                            </div>                                                           
                                                </div>
                                                <hr class="my-2" />
                                            <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

</section>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>

        $('#addToWatchlist').on("click",function () {
            $.ajax({
                url:'<?= base_url('WatchlistController/addUserMovie/'.session()->get('user')['id'].'/'.$movie['id']) ?>',
                success:function (data) {
                    let obj = JSON.parse(data);
                    Swal.fire({
                        position: 'center',
                        icon: obj.status,
                        title: obj.message,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            });
        });

        $(document).ready(function () {
            <?php if(session()->getFlashdata('status')){ ?>
                Swal.fire({
                    icon: '<?= session()->getFlashdata('status_icon') ?>',
                    title: '<?= session()->getFlashdata('status') ?>',
                    showConfirmButton: false,
                    timer: 1000
                });
            <?php } ?>
        });

</script>


</body>
</html>
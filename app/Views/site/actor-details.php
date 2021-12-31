<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="/css/actor-profile.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<?= $this->include('site/mainpage-header.php') ?>

<div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src=<?php echo $actor["actor_picture"]?> alt=""/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-head">
                    <h5>
                        <?php echo $actor["actor_firstname"]." ".$actor["actor_lastname"]?>
                    </h5>
                    <h6>
                        Actor
                    </h6>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Movies</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Birthdate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $actor["actor_birthdate"]?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $gender["gender_name"]?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                <table class="table table-hover">
                                    <thead  class="text-blue ">
                                        <th>
                                            Movie Poster
                                        </th>
                                        <th>
                                            Movie Name
                                        </th>
                                        <th >
                                            Role
                                        </th>                                      
                                    </thead>
                                    <?php foreach ($actorMovieRoles as $row) : ?>
                                    <tbody>
                                        <td>
                                            <img src=<?php echo $row["movie_poster"]?>  width="80px" height="120px" alt=""/>
                                        </td>                                      
                                        <td style="vertical-align:middle">
                                            <a href="<?= base_url('MovieController/movieDetails/'.$row['movie_id'] ) ?>" class=""><?=$row['movie_name']?></a>
                                        </td>
                                        <td style="vertical-align:middle">
                                            <?=$row['role_name']?>
                                        </td>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</div>

<?= $this->include('site/mainpage-footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>

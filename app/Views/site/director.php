<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="css/director.css">
</head>

<body>

<?= $this->include('site/mainpage-header.php') ?>

    <div class="container">

        <div class="row mt-5">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/id/1027/600/600" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Derviş Çömlek</h5>
                        <a href="#" class="btn btn-primary">Go Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
        <?php foreach ($director as $row) : ?>
            <div class="col-md-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://picsum.photos/id/1027/600/600" alt="Avatar"
                                style="width:300px; height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <h1><?= $row['director_name'] ?></h1>
                            <p>3D Artist & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
            <div class="col-md-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://www.careersinfilm.com/wp-content/uploads/2019/06/director-of-photography.jpg"
                                alt="Avatar" style="width:300px; height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <h1>Derviş Çömlekçi</h1>
                            <p>3D Artist & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <img src="https://assets.videomaker.com/2012/12/directing.jpg" alt="Avatar"
                                style="width:300px; height:300px;">
                        </div>
                        <div class="flip-card-back">
                            <h1>Derviş Çömlekçi</h1>
                            <p>3D Artist & Engineer</p>
                            <p>We love that guy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>
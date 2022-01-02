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

    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/main-page-header.css">

    <title>My Profile</title>
</head>

<body>

    <?= $this->include('site/mainpage-header.php') ?>


    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="200px" height="200px" src="<?= "/uploads/".$user['user_image']; ?>">
                    <span class="font-weight-bold"><?= $user['user_firstname']." ".$user['user_lastname'] ?></span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="<?= base_url('User/update/'.$user['id']) ?>" method="POST" class="mt-5">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-fn">First Name</label>
                                <input class="form-control" type="text" id="account-fn" placeholder="<?= $user['user_firstname'] ?>" name="user_firstname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-ln">Last Name</label>
                                <input class="form-control" type="text" id="account-ln" placeholder="<?= $user['user_lastname']  ?>" name="user_lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="account-email">E-mail Address</label>
                                <input class="form-control" type="email" id="account-email"
                                    value="<?= $user['user_email']  ?>" disabled="">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="account-pass">New Password</label>
                                <input class="form-control" type="password" id="account-pass" name="user_password">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="account-confirm-pass">Confirm Password</label>
                                <input class="form-control" type="password" id="account-confirm-pass" name="user_password_again">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                </div>
                </form>
                <hr>
                <?php if(isset($validation)):?>
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>


    <div class="container mb-5">
        <div class="row">
            <?php foreach ($movies as $row) : ?>
            <div class="col-md-12">
                <div class="list-group">
                    <div class="list-group-item d-flex align-items-center">
                        <img src="<?= $row['movie_poster']  ?>" alt="" width="100px" class="rounded-sm ml-n2"/>
                        <div class="flex-fill pl-3 pr-3">
                            <a href="<?= base_url('MovieController/movieDetails/'.$row['id']) ?>" class="font-weight-bold" id="movieName"><?= $row['movie_name']?></a>
                        </div>
                        <button type="button" value="<?= $row['id'] ?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <nav>
                <?= $pager->links() ?>
            </nav>
        </div>
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script>

        $(document).ready(function() {
           $('.delete').click(function (e) {
               e.preventDefault();
               let movieId = $(this).val();
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You won't be able to revert this!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       $.ajax({
                           url:'<?= base_url('WatchlistController/deleteUserMovie/'.session()->get('user')['id'])?>' + '/' + movieId,
                           success:function (response) {
                               Swal.fire({
                                   position: 'center',
                                   icon: response.status,
                                   title: response.message,
                                   showConfirmButton: false,
                                   timer: 1500
                               }).then((confirmed) => {
                                   window.location.reload();
                               });
                           }
                       })
                   }
               })
           })
        });

    </script>

</body>

</html>
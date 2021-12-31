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

    <title>My Profile</title>
</head>

<body>

    <?= $this->include('site/mainpage-header.php') ?>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://picsum.photos/id/1005/200/300">
                    <span class="font-weight-bold"><?= $user['user_firstname']." ".$user['user_lastname'] ?></span></div>
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
                        <a href="<?= base_url('WatchlistController/deleteUserMovie/'.$user['id'].'/'.$row['id']) ?>" class="btn btn-outline-danger card-link"><i class="fas fa-trash"></i></a>
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
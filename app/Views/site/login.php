<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GoldenPopcorn | Login</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Orbitron:wght@500&display=swap" rel="stylesheet">   
</head>
<body>
    <div class="title">
        <h1>GoldenPopcorn</h1>
    </div>

    <div class="container">
            <div class="header">
                <h2>Login</h2>
            </div>
            <?php if(session()->get('success')):?>
                <div class="alert alert-success alert" role="alert">
                   <?= session()->get('success') ?>
                </div>
            <?php endif;?>
            <div class="main">
                <form action="/User/login" method="post">
                    <!--Take username and password from user !-->
                    <span>
                        <i class="fas fa-user"></i>  <!--icon from fontawesome !-->
                        <input type="text" name="user_email" placeholder="Enter Your Email">
                    </span><br>
                    <span>
                        <i class="fas fa-lock"></i> <!--icon from fontawesome !-->
                        <input type="password" name="user_password" placeholder="Enter Your Password">
                    </span><br>
                    <?php if(isset($validation)):?>
                    <div class=>        
                        <div class="alert"> 
                         <?= $validation->listErrors() ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <button>Login</button><br>
                     <!--Links to other pages !-->
                    <p>Don't have an account?<a href="/register">Sign Up</a> </p>
                </form>  
            </div>
    </div>
</body>
</html>
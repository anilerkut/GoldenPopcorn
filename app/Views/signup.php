<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GoldenPopcorn | Signup</title>
  
    <link rel="stylesheet" href=" <?php echo base_url('signup.css');?>">
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
                <h2>Sign Up</h2>
            </div>
            <div class="main">
                 <!--Take user information for recording!-->
                <form action="User/register" method="post">
                    <span>
                        <i class="fas fa-user"></i>   <!--icon from fontawesome !-->
                        <input type="text" id="firstname" name="user_firstname" placeholder="First Name">
                    </span>
                    <span>
                        <i class="fas fa-user"></i>   <!--icon from fontawesome !-->
                        <input type="text" id="lastname" name="user_lastname" placeholder="Last Name">
                    </span><br>
                    <span>
                        <i class="fas fa-lock"></i>  <!--icon from fontawesome !-->
                        <input type="password" name="user_password" placeholder="Password">
                    </span><br>
                    <span>
                        <i class="fas fa-lock"></i>  <!--icon from fontawesome !-->
                        <input type="password" name="confirmpassword" placeholder="Password Again">
                    </span><br>
                    <span>
                        <i class="fas fa-envelope"></i>  <!--icon from fontawesome !-->
                        <input type="email" name="user_email" placeholder="Mail" value="<?= set_value('email') ?>">
                    </span><br>
                    <span>
                        <input id=birthdateInput type="date" name="user_birthdate" placeholder="Date of Birth" max="2015-12-31" min="1950-01-01">
                    </span>
                    <span>
                        <select name="user_gender" id="gender">
                            <optgroup label="Gender"> 
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Non-Binary</option>
                            </optgroup>
                        </select>
                    </span><br>
                    <?php if(isset($validation)):?>
                     <div class="alert alert-warning">
                         <?= $validation->listErrors() ?>
                     </div>
                     <?php endif;?>
                    <button type="submit">Sign Up</button><br>
                    <a href="/login">Already have an account?</a><br>
                </form>  
            </div>     
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Film Sitesi Adı | Signup</title>
    <link rel="stylesheet" href="signup.css">
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
                <form>
                    <span>
                        <i class="fas fa-user"></i>   <!--icon from fontawesome !-->
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </span><br>
                    <span>
                        <i class="fas fa-lock"></i>  <!--icon from fontawesome !-->
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </span><br>
                    <span>
                        <i class="fas fa-lock"></i>  <!--icon from fontawesome !-->
                        <input type="password" name="password" placeholder="Password Again">
                    </span><br>
                    <span>
                        <i class="fas fa-envelope"></i>  <!--icon from fontawesome !-->
                        <input type="email" name="mail" placeholder="Enter Your Mail">
                    </span><br>
                    <span>
                        <input id=birthdateInput type="date" name="birthdate" placeholder="Date of Birth" max="2015-12-31" min="1950-01-01">
                    </span>
                    <span>
                        <select name="gender" id="gender">
                            <optgroup label="Gender"> 
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="gay">Non-Binary</option>
                            </optgroup>
                        </select>
                    </span><br>
                    <button>Sign Up</button><br>
                    <a href="login.php">Already have an account?</a><br>
                </form>  
            </div>
    </div>
</body>
</html>
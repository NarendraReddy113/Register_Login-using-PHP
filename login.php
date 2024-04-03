<?php
    session_start();
    if(isset($_SESSION["user"])){
        header( "Location: index.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_POST["login"])){
                $email =  $_POST["email"];
                $password = $_POST["password"];
                require_once "database.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                //checking the user is exist or not
                $res = mysqli_query($conn,$sql);
                $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
                if($user){
                    //verifying password
                    if(password_verify($password, $user["password"]) ){
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: index.php");
                        die();
                    }else{
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>Email does not match</div>";
                }
            
            }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control"  placeholder="Password:">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div><p>Not registered yet <a href="./register.php" class="style">Register Here</a></p></div>
    </div>
</body>
</html>
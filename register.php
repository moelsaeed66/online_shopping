<?php
include ('admin/db.php');
global $conn;
$message=[];
if (isset($_POST['submit'])){
    $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $query="SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $message[]="email already exist";

    }else{

        mysqli_query($conn,"INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$password')");
        $message[]="register successful";
//        header('location:login.php');
        header("Refresh:20; login.php");

    }


}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>register page</title>
</head>
<body>
<center>
    <?php
    if (isset($message)){
        foreach ($message as $mes){
            echo $mes;
        }
    }

    ?>
</center>

<div class="form-container">

    <form action="" method="post">
        <h3>register page</h3>
        <input type="text" name="name" required placeholder="enter your name" class="box">
        <input type="email" name="email" required placeholder="enter your email" class="box">
        <input type="password" name="password" required placeholder="enter your password" class="box">
        <input type="submit" name="submit" class="btn" value="register">
        <p>have any account? <a href="login.php">login</a></p>
    </form>

</div>


</body>
</html>

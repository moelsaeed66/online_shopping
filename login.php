<?php
session_start();
include "admin/db.php";
global $conn;
$message=[];

if(isset($_POST['submit'])){
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $query=mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$email' AND password = '$password'");
    $result=mysqli_num_rows($query);
    if($result>0){
        $row=mysqli_fetch_assoc($query);
        $_SESSION['user_id']=$row['id'];
        header('location:index.php');
    }else{
        $message[]="email or password is incorrect";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
    <title>login page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        input{
            text-align: center;
        }
    </style>
</head>
<body>

<?php
if(isset($message)){
    foreach($message as $mess){
        echo $mess;
    }
}
?>

<div class="form-container">

    <form action="" method="post">
        <h3>login</h3>
        <input type="email" name="email" required placeholder="enter your email" class="box">
        <input type="password" name="password" required placeholder="enter your passsword" class="box">
        <input type="submit" name="submit" class="btn" value="login">
        <p>have any account?<a href="register.php"> register</a></p>
    </form>

</div>

</body>
</html>

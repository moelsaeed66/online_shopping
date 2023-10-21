<?php

include ('db.php');
global $conn;

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $price=$_POST['price'];

    $query="INSERT INTO `cards`( `name`, `price`) VALUES ('$name','$price')";
    mysqli_query($conn,$query);

    header('location:card.php');
}

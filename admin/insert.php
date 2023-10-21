<?php

global $conn;
include('db.php');
$name='';
$price='';
$image='';
if(isset($_POST['upload'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_FILES['image'];
    $image_location=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $image_up='images/'.$image_name;
    $query="INSERT INTO `products`( `name`, `price`, `image`) VALUES ('$name','$price','$image_up')";
    mysqli_query($conn,$query);
    if(move_uploaded_file($image_location,$image_up)){
        echo"insert done";
    }else{
        echo "error done";
    }
    header('location:index.php');
}





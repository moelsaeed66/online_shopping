<?php
global $conn;
include ('db.php');
$id='';
$name='';
$price='';
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_FILES['image'];
    $image_location=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $image_up='images/'.$image_name;
}
$query="UPDATE `products` SET `name`='$name',`price`='$price',`image`='$image_up' WHERE id= '$id'";
$res=mysqli_query($conn,$query);
if($res){
    header('location:products.php');
}



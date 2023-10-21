<?php

global $conn;
include ('db.php');
$id=$_GET['id'];

$query="DELETE FROM `products` WHERE id=$id";
mysqli_query($conn,$query);

header('location:products.php');


<?php

include ('db.php');
global $conn;
$id=$_GET['id'];
$query="DELETE FROM `cards` WHERE id= '$id' ";
mysqli_query($conn,$query);

header('location:card.php');

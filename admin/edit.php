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
    <link rel="stylesheet" href="style.css">
    <title>updata page</title>
</head>
<body>
<?php
global $conn;
include ('db.php');
$id=$_GET['id'];
$query="SELECT * FROM products where id=$id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);


?>
<center>
    <div class="main">
        <form action="update.php" method="post" enctype="multipart/form-data">
            <h2>update product</h2>
            <img src="https://cdn.pixabay.com/photo/2015/12/08/10/39/online-shopping-1082728_1280.jpg" alt="logo" width="400px">
            <br><br>
            <input type="hidden" name="id" value="<?=$row['id'];?>">
            <input type="text" name="name" value="<?=$row['name'];?>"><br><br>
            <input type="text" name="price" value="<?=$row['price'];?>"><br><br>
            <label  for="file">choose image</label><br><br>
            <input type="file" name="image" id="file" style="display: none">
            <button name="update" type="submit">update file</button><br>
            <a href="products.php">all products</a>


        </form>
    </div>
</center>


</body>
</html>

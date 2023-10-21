<?php
include ('db.php');
global$conn;
$id=$_GET['id'];
$query="SELECT * FROM products where id= $id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>confirm page</title>
    <style>
        input{
            display: none;
        }
        .main{
            box-shadow: 1px 1px 10px silver;
            width: 30%;
            padding: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a href="card.php" id="aa" i class="navbar-brand">MyCard</a>
</nav>

    <center>
        <h2>Sure!</h2>
        <div class="main">
            <form action="insert_card.php" method="post">
                <input type="text" name="name" value="<?=$row['name'];?>"><br>
                <input type="text" name="price" value="<?=$row['price'];?>"><br>
                <button name="add" type="submit" class="btn btn-warning">confirm</button><br>
                <a href="products.php">return to products page</a>

            </form>
        </div>
    </center>


</body>
</html>
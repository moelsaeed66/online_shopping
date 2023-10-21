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

    <title>products page</title>
    <style>
        h2{
            font-family: 'Rubik', sans-serif;
        }
        .card{
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        .card img{
            width: 100%;
            height: 200px;
        }
        main{
            width: 60%;
        }
        #aa{
            margin-left: 7%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a href="card.php" id="aa" i class="navbar-brand">MyCard</a>
</nav>
<center>
    <h2>available products</h2>
</center>
<?php
include ('admin/db.php');
global $conn;

$query="SELECT * FROM products";
$result=mysqli_query($conn,$query);
while ($row=mysqli_fetch_assoc($result)){
    echo "
        <center>
            <main>
                <div class='card' style='width: 18rem;'>
                    <img src='$row[image]' class='card-img-top' >
                    <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='val_card.php? id=$row[id]' class='btn btn-success'>Buy</a>
                    </div>
                </div>

            </main>
        </center>
        ";
}


?>


</body>
</html>


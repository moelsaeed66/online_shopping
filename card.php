
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
    <title>card page</title>
    <style>
        h3{
            font-family: 'Rubik', sans-serif;
        }
        main{
            margin-top: 20px;
        }
        .table {
            font-family: 'Rubik', sans-serif;
            width: 50%;
            box-shadow: 1px 1px 10px silver;
            margin-top: 20px;
            padding: 20px;
        }
        thead{
            background-color: cornflowerblue;
        }
        tbody{
            margin: 10px;
        }
    </style>
</head>
<body>
<h3>My Products</h3>
<?php
include ('db.php');
global $conn;
$reslt=mysqli_query($conn,"SELECT * FROM `cards`");
while ($row=mysqli_fetch_assoc($reslt)){
    echo"
        <center>
        <main>
            <table class='table table-striped table-hover'>
              <thead>
                <tr>
                    <th scope='col'>id</th>
                    <th scope='col'>name</th>
                    <th scope='col'>price</th>
                    <th scope='col'>delete</th>
                </tr>
                </thead>

                <tr>
                    <th scope='row'>$row[id]</th>
                    <td>$row[name]</td>
                    <td>$row[price]</td>
                    <td><a href='del_card.php? id=$row[id]' class='btn btn-danger'>delete</a></td>
                </tr>
            ";
}
        ?>

    </table>
    </main>
    </center>
<center>
    <a href="shop.php">return to sopping page</a>
</center>


</body>
</html>

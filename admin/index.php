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
    <title>Document</title>
</head>
<body>
<center>
    <div class="main">
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <h2>online shopping</h2>
            <img src="https://cdn.pixabay.com/photo/2015/12/08/10/39/online-shopping-1082728_1280.jpg" alt="logo" width="400px">
            <br><br>
            <input type="text" name="name" placeholder="enter name"><br><br>
            <input type="text" name="price" placeholder="enter price"><br><br>
            <label  for="file">choose image</label><br><br>
            <input type="file" name="image" id="file" style="display: none">
            <button name="upload">upload file</button><br><br>
            <a href="products.php">all products</a>


        </form>
    </div>
</center>


</body>
</html>

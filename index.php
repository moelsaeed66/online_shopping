<?php

include 'admin/db.php';
global $conn;
$message=[];
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
};

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cards` WHERE name = '$product_name' AND user_id = '$user_id'") ;

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already in your cart';
    }else{
        mysqli_query($conn, "INSERT INTO `cards`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'product added successfully';
    }

};

if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cards` SET quantity = '$update_quantity' WHERE id = '$update_id'") ;
    $message[] = 'quantity updated successfully';
}

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cards` WHERE id = '$remove_id'");
    header('location:index.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cards` WHERE user_id = '$user_id'");
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my cart</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
    foreach($message as $mess){
        echo '<div class="message" onclick="this.remove();">'.$mess.'</div>';
    }
}
?>

<div class="container">

    <div class="user-profile">

        <?php
        $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'");
        if(mysqli_num_rows($select_user) > 0){
            $fetch_user = mysqli_fetch_assoc($select_user);
        };
        ?>

        <p>currant user : <span><?php echo $fetch_user['name']; ?></span> </p>
        <div class="flex">
            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are sure from logout ?');" class="delete-btn">logout</a>
        </div>

    </div>

    <div class="products">

        <h1 class="heading">latest products</h1>

        <div class="box-container">

            <?php
            include('admin/db.php');
            $result = mysqli_query($conn, "SELECT * FROM products");
            while($row = mysqli_fetch_array($result)){
                ?>
                <form method="post" class="box" action="">
                    <img src="admin/<?php echo $row['image']; ?>"  width="200">
                    <div class="name"><?php echo $row['name']; ?></div>
                    <div class="price"><?php echo $row['price']; ?></div>
                    <input type="number" min="1" name="product_quantity" value="1">
                    <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                </form>
                <?php
            };
            ?>

        </div>

    </div>

    <div class="shopping-cart">

        <h1 class="heading"> shopping cart</h1>

        <table>
            <thead>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>total price</th>
            <th>work</th>
            </thead>
            <tbody>
            <?php
            $cart_query = mysqli_query($conn, "SELECT * FROM `cards` WHERE user_id = '$user_id'");
            $grand_total = 0;
            if(mysqli_num_rows($cart_query) > 0){
                while($fetch_cart = mysqli_fetch_assoc($cart_query)){
                    ?>
                    <tr>
                        <td><img src="admin/<?php echo $fetch_cart['image']; ?>" height="75" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td><?php echo $fetch_cart['price']; ?>$ </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_cart" value="update" class="option-btn">
                            </form>
                        </td>
                        <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
                        <td><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('delete from shopping cart?');">delete</a></td>
                    </tr>
                    <?php
                    $grand_total += $sub_total;
                }
            }else{
                echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">empty cart</td></tr>';
            }
            ?>
            <tr class="table-bottom">
                <td colspan="4">total price :</td>
                <td><?php echo $grand_total; ?>$</td>
                <td><a href="index.php?delete_all" onclick="return confirm('delete all products from cart');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">delete all</a></td>
            </tr>
            </tbody>
        </table>



    </div>

</div>

</body>
</html>
<?php

@include 'config.php';
session_start();

if(isset($_POST['add_to_wishlist'])){

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

  
    $product_id = $_POST['product_id'];
   
   
    $check_wishlist_numbers = mysqli_query($connect, "SELECT * FROM `wishlist` WHERE Product_ID = '$product_id' AND User_ID = '$user_id'") or die('query failed');

    $check_cart_numbers = mysqli_query($connect, "SELECT * FROM `cart` WHERE Product_ID = '$product_id' AND User_ID = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($connect, "INSERT INTO `wishlist`(user_id, Product_ID) VALUES('$user_id', '$product_id')") or die('query failed');
        $message[] = 'product added to wishlist';
    }

}

if(isset($_POST['add_to_cart'])){

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
       header('location:login.php');
    };
   

    $product_id = $_POST['product_id'];
    $product_quote = $_POST['product_quote'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $Quantity = $_POST['quantity'];
    $Weight = $_POST['weight'];
    $Flavour = $_POST['flavour'];
    $Shape = $_POST['Shape'];
    $Age = $_POST['age'];
    $Color = $_POST['color'];

    $check_cart_numbers = mysqli_query($connect, "SELECT * FROM `cart` WHERE Product_ID = '$product_id' AND User_ID = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{

        $check_wishlist_numbers = mysqli_query($connect, "SELECT * FROM `wishlist` WHERE Product_ID = '$product_id' AND User_ID = '$user_id'") or die('query failed');

        if(mysqli_num_rows($check_wishlist_numbers) > 0){
            mysqli_query($connect, "DELETE FROM `wishlist` WHERE product_ID = '$product_id' AND user_id = '$user_id'") or die('query failed');
        }

        mysqli_query($connect, "INSERT INTO `cart`(User_ID, Product_ID, Product_Price, Quantity, Weight,flavour,Shape,Age,Color) VALUES('$user_id', '$product_id', '$product_price', '$Quantity','$Weight','$Flavour','$Shape','$Age','$Color')") or die('query failed');
        
        $message[] = 'product added to cart';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
   <title>quick view</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="CSS/category.css?v=<?php echo time(); ?>">
   <link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
 <?php include("Header.php"); ?> <br>

</head>
<body>
   

<section class="quick-view">  <br>

    <h1 class="Heading">product details</h1> <br>

    <?php  
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $select_products = mysqli_query($connect, "SELECT * FROM `products` WHERE Product_ID = '$pid'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
    ?>
    <form action="" method="POST" class="form">
         <img src="uploaded_img/<?php echo $fetch_products['Product_Image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['Product_Name']; ?></div> 
         <div class="price">$<?php echo $fetch_products['Product_Price']; ?>/-</div>
         <div class="details"><?php echo $fetch_products['Product_Details']; ?></div>

 <label for="quantity" class="label"> Quantity:<input type="number" name="quantity" value="1" min="0" class="qty"> <br>


 <label for="weight" class="label"> weight :
          <select name="weight" id="weight" class="weight">
          <option value="1kg"> 1kg </option>
          <option value="2kg"> 2kg </option>
          <option value="3kg"> 3kg </option>
          <option value="4kg"> 4kg </option>
          <option value="5kg"> 5kg </option>
         </label>
         </select>
<br>
 <label for="flavour" class="label"> Flavour :
          <select name="flavour" id="flavour" class="flavour">
          <option value="vanila"> Vanila chiffon </option>
          <option value="chocolate"> Dark Chocolate </option>
          <option value="lemon"> Lemon  </option>
          <option value="Marble"> Marble</option>
          <option value="Pumkin"> Pumpkin </option>
         </label>
         </select>
 <br>
  <label for="shape" class="label"> Shape :
          <select name="Shape" id="shape" class="shape">
          <option value="Round"> Round </option>
          <option value="Box"> Box </option>
          <option value="Heart"> Heart </option>
         </label>
         </select>
<br>

<label for="age" class="label"> Age: 
<input type ="number"  id="age" name="age" value=""> 
<br>

<label for="color" class="label"> Cake Color: 
<input type ="text" placeholder="Optional"  id="color" name="color" value="same"> 
<br>


         <input type="hidden" name="product_id" value="<?php echo $fetch_products['Product_ID']; ?>">
         <input type="hidden" name="product_quote" value="<?php echo $fetch_products['Product_Quote']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['Product_Price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['Product_Image']; ?>">
      
         <i class="fa fa-heart"> </i> <input type="submit" value ="Add To Favourite" name="add_to_wishlist" class="btnvp"> <br> 
         <i class="fa fa-shopping-cart"> </i> <input type="submit" value ="Add To Cart" name="add_to_cart" class="btnvp"> 

      </form>
    <?php
            }
        }else{
        echo '<p class="empty">no products details available!</p>';
        }
    }
    ?>

    <div class="more-btn">
        <a href="category.php" class="vpbb"> Continue Shopping </a>
    </div>

</section>

<br>





   <!-- jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <!-- Bootstrap js
   <script src="library/BootstrapJS/bootstrap.min.js"></script> -->
   <!-- Extrnal jS -->

   <?php include("footer.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/Header.js"></script>

</body>
</html>
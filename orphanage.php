<?php

@include 'config.php';
session_start();

if(isset($_POST['add_to_wishlist'])){

    $user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


    $product_id = $_POST['product_id'];

    
    $check_wishlist_numbers = mysqli_query($connect, "SELECT * FROM `wishlist` WHERE Product_ID = '$product_id' AND user_id = '$user_id'") or die('query failed');

    $check_cart_numbers = mysqli_query($connect, "SELECT * FROM `cart` WHERE Product_ID = '$product_id' AND user_id = '$user_id'") or die('query failed');

    if(mysqli_num_rows($check_wishlist_numbers) > 0){
        $message[] = 'already added to wishlist';
    }elseif(mysqli_num_rows($check_cart_numbers) > 0){
        $message[] = 'already added to cart';
    }else{
        mysqli_query($connect, "INSERT INTO `wishlist`(user_id, Product_ID) VALUES('$user_id', '$product_id')") or die('query failed');
        $message[] = 'product added to wishlist';
    }

}
?>

<?php

require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
    <title> Orphanage </title>
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="CSS/orphan.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
 <?php include("Header.php"); ?> 
</head>

<style>
    
 i.fa-heart,
 i.fa-shopping-cart{
    color:black;
    
 }
 </style>

<body>
<br>
<h2> We make Your Day more special and Virtue!!! </h2>
<h3>  Be happy by little hearts' prayers </h3>
    <div class="container">
        <div class="slider">


        <input type="radio" class="radio" name="images" id="radio-1" checked>
        <input type="radio" class="radio" name="images" id="radio-2">
        <input type="radio" class="radio" name="images" id="radio-3">

            <div class="slide" id="slide-1">
                <img src="images/candy1.jpg" alt="">
                <div class="caption"> <span> Gokulam </span> Children's Home  <br> <br> <p>
                Gokulam children's home <br> situated in <br> 607A,Negombo Road,<br>  Colombo. <br>
                There are 55 children now. <br>
                call: 0112433325 </p>
                </div>
            </div>
            <div class="slide" id="slide-2">
                <img src="images/candy2.jpg" alt="">
                <div class="caption"> <span> Lawris </span> children's Home  <br> <br> <p>
                Lawris children's home <br> situated in <br> 97/5, Sri Dhamma Mawatha,<br> colombo 10<br>
                There are 20 children now. <br> 
                call: 0112670699 </p>
            </div>
            </div>
            <div class="slide" id="slide-3">
                <img src="images/candy3.jpg" alt="">
                <div class="caption"> <span> Balika </span>  children's Home <br> <br> <p>
                Balika children's home <br> situated in <br> 95, W.A.De silva Mawatha,<br> colombo 6 <br>
                There are 30 children now. <br>
                call:0112588838 </p>
            </div>
            </div>

            <div class="dots">
                <label for="radio-1" id="label-1"> </label>
                <label for="radio-2" id="label-2"> </label>
                <label for="radio-3" id="label-3"> </label>
            </div>

</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2> Donate their Favourite candies From Our Shop !!!</h2> <br> <br> <br>




<section class="products">

<div class="box-container">

  <?php
     $select_products = mysqli_query($connect, "SELECT 
                                p.Product_Name,
                                p.Product_Price,
                                p.Product_Quote,
                                p.Product_Details,
                                p.Product_Image,
                                p.Product_ID,
                                s.Subcategory,
                                m.MC_Name
                                FROM products p INNER JOIN subcategory AS s ON p.SC_ID = s.SC_ID INNER JOIN maincategory AS m ON s.MC_ID = m.MC_ID where m.MC_ID= '10'") or die('query failed');
     if(mysqli_num_rows($select_products) > 0){
        while($fetch_products = mysqli_fetch_assoc($select_products)){
  ?>
  <form action="" method="POST" class="box">
     
     <div class="price">LKR <?php echo $fetch_products['Product_Price']; ?></div>
     <img src="uploaded_img/<?php echo $fetch_products['Product_Image']; ?>" alt="" class="image">
     <div class="pquote"><?php echo $fetch_products['Product_Quote']; ?></div>
  <br>
     <input type="hidden" name="product_id" value="<?php echo $fetch_products['Product_ID']; ?>">
     <input type="hidden" name="product_quote" value="<?php echo $fetch_products['Product_Quote']; ?>">
     <input type="hidden" name="product_price" value="<?php echo $fetch_products['Product_Price']; ?>">
     <input type="hidden" name="product_image" value="<?php echo $fetch_products['Product_Image']; ?>">

     
     <i class="fa fa-heart"> </i> <input type="submit" value ="Add To Favourite" name="add_to_wishlist" class="btns"> <br> 
     <!--<i class="fa fa-shopping-cart"> </i> <input type="submit" value ="Add To Cart" name="add_to_cart" class="btn"> -->
    <i class="fa fa-shopping-cart"> </i> <a href="Oview_page.php?pid=<?php echo $fetch_products['Product_ID']; ?>"value ="Add To Cart" name="add_to_cart" class="btns"> Add to Cart
     

  </form>
  <?php
     }
  }else{
     echo '<p class="empty">no products added yet!</p>';
  }
  ?>

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
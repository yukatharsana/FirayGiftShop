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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
<title>shop</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="CSS/category.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
 <?php include("Header.php"); ?> 
<style>
 body{
   background-image: linear-gradient(to bottom right, white, rgb(211, 189, 211));
}


</style>
</head>
<body>
<section class="products">
<div class="catp"> <h1 class="cathead">Our Gift Items</h1></div>
<?php
     $select_products = "SELECT 
     p.Product_Name,
     p.Product_Price,
     p.Product_Quote,
     p.Product_Details,
     p.Product_Image,
     p.Product_ID,
     p.SC_ID,
     s.Subcategory,
     m.MC_Name,
     m.MC_ID
     FROM products p INNER JOIN subcategory AS s ON p.SC_ID = s.SC_ID INNER JOIN maincategory AS m ON s.MC_ID = m.MC_ID  ORDER BY s.SC_ID ASC,m.MC_ID ASC ";
    
    $result = $connect->query($select_products);
   
    if (@$result->num_rows > 0) 
    {
        $previous_mcategory = "" ;  
        $previous_scategory = "" ; 
        ?>
            <div class="box-container">
            <?php
        while($fetch_products = $result->fetch_assoc())
        {
           
            $mcategory = $fetch_products['MC_ID'];
            $scategory = $fetch_products['SC_ID'];

            if ($previous_mcategory !== $mcategory) { ?>
               <div class="catm">  <h1 class="cathead2">
                <?php
               echo "<hr><br>". $fetch_products['MC_Name']."<br>";?>
              </div> </h1> <?php 
               $previous_mcategory = $mcategory;
           }
    
            if ($previous_scategory !== $scategory) {  ?>
               <div class="cats"> <h1 class="cathead2">
                <?php
                echo $fetch_products['Subcategory'];?>
                </div> </h1> <?php
                $previous_scategory = $scategory;

             } ?>
            
  
   <div class="box-containerCart">
  
<form action="" method="POST" class="box">
  
   <div class="price">LKR <?php echo $fetch_products['Product_Price']; ?></div>
   <img src="uploaded_img/<?php echo $fetch_products['Product_Image']; ?>" alt="" class="image">
   <div class="quote"><?php echo $fetch_products['Product_Quote']; ?></div>
<br>
   <input type="hidden" name="product_id" value="<?php echo $fetch_products['Product_ID']; ?>">
   <input type="hidden" name="product_quote" value="<?php echo $fetch_products['Product_Quote']; ?>">
   <input type="hidden" name="product_price" value="<?php echo $fetch_products['Product_Price']; ?>">
   <input type="hidden" name="product_image" value="<?php echo $fetch_products['Product_Image']; ?>">

   
   <i class="fa fa-heart"> </i> <input type="submit" value ="Add To Favourite" name="add_to_wishlist" class="btn"> <br> 
   <!--<i class="fa fa-shopping-cart"> </i> <input type="submit" value ="Add To Cart" name="add_to_cart" class="btn"> -->
  <i class="fa fa-shopping-cart"> </i> <a href="view_page.php?pid=<?php echo $fetch_products['Product_ID']; ?>"value ="Add To Cart" name="add_to_cart" class="btn"> Add to Cart </a>
   

</form>
</div>

           
        <?php } ?>
        </div>
        <?php } ?>
    
 





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





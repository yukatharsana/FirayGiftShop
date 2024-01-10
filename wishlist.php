<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
 };
 

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM `wishlist` WHERE W_ID = '$delete_id'") or die('query failed');
    header('location:wishlist.php');
}

if(isset($_GET['delete_all'])){
    mysqli_query($connect, "DELETE FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
    header('location:wishlist.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
   <title>wishlist</title>

  <!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="CSS/wishlist.css?v=<?php echo time(); ?>">
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
   <br>

<section class="wishlist">


    <div class="box-container">

    <?php
    
        $select_wishlist = mysqli_query($connect, "SELECT * FROM products  INNER JOIN wishlist ON products.Product_ID = wishlist.Product_ID  INNER JOIN  Users ON Users.id = wishlist.User_ID WHERE wishlist.User_ID=$user_id") or die('query failed');
        if(mysqli_num_rows($select_wishlist) > 0){
            while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){           
    ?>

    <form action="" method="POST" class="box">

    
   <!-- <a href="view_page.php?pid=<?php echo $fetch_wishlist['Product_ID']; ?>" class="fas fa-eye"></a>  -->
  
  

        <img src="uploaded_img/<?php echo $fetch_wishlist['Product_Image']; ?>" alt="" class="image">
        <div class="quote"><?php echo $fetch_wishlist['Product_Quote']; ?></div> 
        <div class="price"> LKR <?php echo $fetch_wishlist['Product_Price']; ?> </div>

       <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['Product_ID']; ?>"> 
       <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['Product_Price']; ?>"> 
       <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['Product_Image']; ?>"> 
      
        
 <i class="fa fa-shopping-cart"> </i> <a href="Wview_page.php?pid=<?php echo $fetch_wishlist['Product_ID']; ?>"value ="Add To Cart" name="add_to_cart" class="btn"> Add to Cart </a> 
 <br>
 <br>
 <i class="fas fa-trash"> </i> <a href="wishlist.php?delete=<?php echo $fetch_wishlist['W_ID']; ?>" onclick="return confirm('delete this from wishlist?');" class="btn"> Remove </a>
         
    
    </form>
    <?php
    
        }
    }else{
        echo '<p class="empty">your wishlist is empty</p>';
    }
    ?>
    </div>

    
<div class="end">
        
        <a href="category.php" class="option-btn">continue shopping</a>
        <a href="wishlist.php?delete_all" class="delete-btn" onclick="return confirm('delete all from wishlist?');">delete all</a>
    </div>

</section>




<!-- Footer -->

<?php include("footer.php"); ?>
   <!-- jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <!-- Bootstrap js
   <script src="library/BootstrapJS/bootstrap.min.js"></script> -->
   <!-- Extrnal jS -->
    <script src="JS/script.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/Header.js"></script>
</body>
</html>


  



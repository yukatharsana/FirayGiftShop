<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM `cart` WHERE Cart_ID = '$delete_id'") or die('query failed');
    header('location:cart.php');
};

if(isset($_GET['delete_all'])){
    mysqli_query($connect, "DELETE FROM `cart` WHERE User_ID = '$user_id'") or die('query failed');
    header('location:cart.php');
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="CSS/cart1.css?v=<?php echo time(); ?>">
   <!-- custom admin css file link  -->

<link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
 <?php include("Header.php"); ?> 

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
   




<h3 class="cheading"> Your Cart</h3>


<?php

$select_cart = "select * from cart where User_ID='$user_id'";

$run_cart = mysqli_query($connect,$select_cart);

$count = mysqli_num_rows($run_cart);

?>

<p class="pcart"> You currently have <?php echo $count; ?> item(s) in your cart. </p>

<section>
<div class="product-display">
  <table class="cart-display-table">
    <thead class="thead">
      <tr class="tr">
      <td> Product </td>
      <td> Detail </td>
      <td> Price </td>
      <td> Sub Total </td>
      <td> Action </td>
       
</tr>
</thead>


<?php
   
   $grand_total = 0;
   $select_cart = mysqli_query($connect, "SELECT * FROM products  INNER JOIN cart ON products.Product_ID = cart.Product_ID  INNER JOIN  Users ON Users.id = cart.User_ID WHERE cart.User_ID=$user_id");
 
   if(mysqli_num_rows($select_cart) > 0){
       while($fetch_cart = mysqli_fetch_assoc($select_cart)){
?>
<div  class="box">
 <tr>
        <td> <img src="uploaded_img/<?php echo $fetch_cart['Product_Image'];?>"  alt="" class="cimg"> </td>
        <td> <?php echo $fetch_cart['Product_Quote']; ?> <br>
        Quantity: <?php echo $fetch_cart['Quantity'];?> <br>
        <!-- Weight: <?php echo $fetch_cart['Weight'];?> <br>
        Flavour: <?php echo $fetch_cart['Flavour'];?> <br>
        Shape: <?php echo $fetch_cart['Shape'];?> <br>
        Age: <?php echo $fetch_cart['Age'];?> <br>
        Color: <?php echo $fetch_cart['Color'];?> <br>
        Orphanage: <?php echo $fetch_cart['orphanage'];?>   </td> -->
  
        <td> LKR <?php echo $fetch_cart['Product_Price'];?>/-</td>


<td>
<div class="sub-total"> <span>LKR <?php echo $sub_total = ($fetch_cart['Product_Price'] * $fetch_cart['Quantity']); ?>/-</span> </div>
</td>
<td>
<a href="cart.php?delete=<?php echo $fetch_cart['Cart_ID']; ?>" class="cdltbutton" onclick="return confirm('delete this product?');"> <i class="fa fa-trash"></i> </a>      
</td>
</tr>
         
</div>    
<?php
    $grand_total += $sub_total;
        }
    }else{
        echo '<p class="empty">your cart is empty</p>';
    }
?>
</table>
</div>
</section>   

<br>



    <div class="cart-total">
        <p>Grand Total : <span>LKR<?php echo $grand_total; ?>/-</span></p>
        <a href="category.php" class="ccons">continue shopping</a>
        <a href="checkout.php" class="cdlt  <?php echo ($grand_total > 1)?'':'disabled' ?>">proceed to checkout</a>
        <a href="cart.php?delete_all" class="deletecbtn <?php echo ($grand_total > 1)?'':'disabled' ?>" onclick="return confirm('delete all from cart?');">delete all</a>
    
    </div>

    <br>
    <br>

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
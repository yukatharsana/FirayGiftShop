<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Dashboard</title>
<?php @include 'AdminHeader.php'; 
@include 'config.php';
?>
<script src="https://kit.fontawesome.com/9678f15201.js" crossorigin="anonymous"></script>
</head>
<body>
<br>
<div class="dbh">

<p> welcome Admin!!! 
<img src="images/fairy.png" height="150" width="150"> </p>
</div>


<div class="grid-container">
  <div> 
         <p>Total Users <i class="fa-solid fa-user"> </i> </p>
         <?php
            $select_account = mysqli_query($connect, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <div class="nobox">
         <h3><?php echo $number_of_account; ?></h3>
         </div>
         
  </div>
 
  <div>
    <p>Products in Shop <i class="fa-solid fa-shop"></i> </p>
    <?php
            
             $select_products = mysqli_query($connect, "SELECT * FROM `products`") or die('query failed');
             $number_of_products = mysqli_num_rows($select_products);
          ?>
            <div class="nobox">
          <h3><?php echo $number_of_products; ?></h3>
           </div>
         
  </div>  
  <div>
    <p>Total Orders Placed <i class="fa-solid fa-basket-shopping"></i> </P>
    <?php
   
          $select_orders = mysqli_query($connect, "SELECT * FROM `orders`") or die('query failed');
          $number_of_products = mysqli_num_rows($select_orders);
       ?>
        <div class="nobox">
       <h3><?php echo $number_of_products; ?></h3>  
       </div> 
  </div>
  <div>
    <p> Lucky Gift winners <i class="fa-solid fa-gift"></i> </p>
    <?php
            $select_gifts = mysqli_query($connect, "SELECT * FROM `gifts`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_gifts);
         ?>
          <div class="nobox">
         <h3><?php echo $number_of_products; ?></h3>
         </div>
  </div>
  <div>
    <p>completed Payments <i class="fa-solid fa-credit-card"></i> </p>
    <?php
            $total_pendings = 0;
         ?>
          <div class="nobox">
         <h3><?php echo $total_pendings; ?></h3>
         </div>
  </div>
  <div>
    <p>No Of Reviews <i class="fa-solid fa-pen-to-square"> </i> </p>
    <?php
          
            $select_reviews = mysqli_query($connect, "SELECT * FROM `reviews`") or die('query failed');
            $number_of_reviews = mysqli_num_rows($select_reviews);
         ?>
          <div class="nobox">
         <h3><?php echo $number_of_reviews; ?></h3>
         </div>
  </div>
</div>


</body>
</html>


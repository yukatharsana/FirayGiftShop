<?php

@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['psubmit'])){

    $order_id = $_POST['order_id'];
   
    $sql=  "SELECT G_Total FROM `orders` WHERE Order_ID = '$order_id' AND user_id = '$user_id'" or die('query failed');
    $result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
   
    if($row['G_Total'] > 10000){
        header('location:Giftwheel.php');
    }else{
        header('location:home.php'); 
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
 
  <!--custom css file link -->
    <link rel="stylesheet" href="CSS/confirm.css?v=<?php echo time(); ?>">

</head>
<body>


<div class="heading">
    <div class="mycontent">
        <div>
			
   <h3> Payment success</h3>
 
   <p>  A BIG THANK YOU for shopping with us </p>
    <h2> - Fairy Gift Shop - </h2>	 <br>
   <form action="" method="POST">
   <input type="submit" name="psubmit" value="End shopping" class="back">
   <?php
     $select_orders = mysqli_query($connect, "SELECT Order_ID from orders where User_ID='$user_id'") or die('query failed');
     if(mysqli_num_rows($select_orders) > 0){
        while($fetch_orders = mysqli_fetch_assoc($select_orders)){
  ?> 
  
   <input type="hidden" name="order_id" value="<?php echo $fetch_orders['Order_ID']; ?>">
   
   <?php
     }
  }else{
     echo '<p class="empty">no products added yet!</p>';
  }
  ?>
</form>
</body>
</html>







<?php

@include 'config.php';

session_start();
// if($_SESSION['wheelcomplete']!='yes'){
// header('location:home.php');
// }else{
//    header('location:gift1.php'); 
// };

$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
};

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
<title>Gift</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="CSS/Giftwheel.css?v=<?php echo time(); ?>">
<!-- <link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>"> -->
<script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
 <!-- <?php include("Header.php"); ?>  -->
</head>


<body>
    <br>
    
  
  
<h1>
<div class="waviy">
We make You More Happy!!!
   <span style="--i:1">B</span>
   <span style="--i:2">e</span>
   <span style="--i:3"></span>
   <span style="--i:4">R</span>
   <span style="--i:5">e</span>
   <span style="--i:6">a</span>
   <span style="--i:7">d</span>
   <span style="--i:8">y</span>
   <span style="--i:8">.</span>
   <span style="--i:8">.</span> 
  </div>
</h1>
<h3> Claim your  Lucky gift now!!! </h3>
<h4> You can click only once! </h4> 



<div class="wheeler">
<div class="slider"> 

<?php
     $select_orders = mysqli_query($connect, "SELECT Order_ID from orders where User_ID='$user_id'") or die('query failed');
     if(mysqli_num_rows($select_orders) > 0){
        while($fetch_orders = mysqli_fetch_assoc($select_orders)){
  ?>

    <span style="--i:1;"> <img src="images/gift1.jpg" alt="gift1"> <a href='gift1.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton1"> select </button> </a>
    </span>     
    <span style="--i:2;">   <img src="images/gift1.jpg" alt="gift2"> <a href='gift2.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton2"> select </button> </a>
    </span>
    <span style="--i:3;">   <img src="images/gift1.jpg" alt="gift1"> <a href='gift1.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton1"> select </button> </a>
     </span>
    <span style="--i:4;">   <img src="images/gift1.jpg" alt="gift2"> <a href='gift2.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton2"> select </button> </a>
    </span>
    <span style="--i:5;">   <img src="images/gift1.jpg" alt="gift3"> <a href='gift3.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton3"> select </button> </a>
    </span>
    <span style="--i:6;">   <img src="images/gift1.jpg" alt="gift4"> <a href='gift4.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton4"> select </button> </a>
    </span>
    <span style="--i:7;">   <img src="images/gift1.jpg" alt="gift3"> <a href='gift3.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton3"> select </button> </a>
    </span>
    <span style="--i:8;">   <img src="images/gift1.jpg" alt="gift4"> <a href='gift4.php?oid=<?php echo $fetch_orders['Order_ID']; ?>'> <button class="imgbtn"  id="myButton4"> select </button> </a>
    </span>
    <?php
     }
  }else{
     echo '<p class="empty">no products added yet!</p>';
  }
  ?>
    </div>
    
</div>

<br>





   <!-- jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <!-- Bootstrap js
   <script src="library/BootstrapJS/bootstrap.min.js"></script> -->
   <!-- Extrnal jS -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- <script src="JS/Header.js"></script> -->

</body>
</html>
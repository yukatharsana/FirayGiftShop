<?php

@include 'config.php';

session_start();



$user_id = $_SESSION['user_id'];
$oid = $_GET['oid'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['lucky'])){
 
      
$connect=mysqli_connect("localhost","root","","fairygift_shop");

$sql="INSERT INTO gifts
(User_ID,Order_ID,G_name)
VALUES ('$user_id','$oid','Sponch Cakes')";

$result=mysqli_query($connect,$sql);

if($result)
{
  header('location:home.php');
  die();
}

else

 {
  header('location:page2.php');
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
<title>GiftView</title>

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom admin css file link  -->
<link rel="stylesheet" href="CSS/Giftwheel.css?v=<?php echo time(); ?>">
<!-- <link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>"> -->
<script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
 <!-- <?php include("Header.php"); ?>  -->
</head>
</head>
<body>
    <br>
    <br>
    <br>
    <h1> Our Gift to you... </h1>
    <h1>
<div class="waviy">

   <span style="--i:1">C</span>
   <span style="--i:2">o</span>
   <span style="--i:3">n</span>
   <span style="--i:4">g</span>
   <span style="--i:5">r</span>
   <span style="--i:6">a</span>
   <span style="--i:7">t</span>
   <span style="--i:8">u</span>
   <span style="--i:9">l</span>
   <span style="--i:10">a</span> 
   <span style="--i:11">t</span> 
   <span style="--i:12">i</span> 
   <span style="--i:13">o</span> 
   <span style="--i:14">n</span> 
   <span style="--i:15">s</span> 
   <span style="--i:16">.</span> 
   <span style="--i:17">.</span> 
   <span style="--i:18">.</span> 
  </div>
</h1>

   
   
   
        <h2> <i> You have won 10 Sponch Cakes from fairy Gift Shop !!!!! </i> </h2>     
 

    <div class=gif>
    <img src="images/fairy.png" alt="gift2" height="200" width="200">
   </div>
    <h2>  A BIG THANK YOU for shopping with us </h2>
    <h3> - Fairy Gift Shop - </h3>
    <p> We hope you love your purchase! Come back soon for our newest arrivals and offers </p>
    <br>
    <br>
    <form action="" method="POST" class="form">
    <input type="submit" value ="End shopping" name="lucky" class="back"> 
    </form>

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



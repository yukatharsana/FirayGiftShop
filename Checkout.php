<?php
  include("config.php");
  $FairyJsonFile=file_get_contents('JS/Fairy.json');
  $FairyGiftShop=json_decode($FairyJsonFile,true);


  
session_start();
  $user_id = $_SESSION['user_id'];
?>



<!DOCTYPE html>
<html>

<head>
  <title>Checkout</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="about.css">

  <!--FOR FONT LINKS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
    integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


  <!--CSS GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">


  <!--BOOTSTRAP-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

   <!--instance, to load jQuery libraires For MY IMAGE SLIDER-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 


  <!--For icons in service side -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://fontawesome.com/v4/icons/">
	<link rel="stylesheet" href="https://fontawesome.com/v4/icon/credit-card-alt">
  
 
   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/checkout.css?v=<?php echo time(); ?>">
 <link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>">
</head>

<body>


 <?php include("Header.php"); ?>  
  <!-- Header -->
    
  <br><br><br><br>
    
 
  <!--*************************************Checkout*****************************************************-->
  <section class="first">
   
<form action="">
<h1>Check-Out Form</h1><br><br>


<h3> ORDER SUMMARY</h3>


<?php

$select_cart = "select * from cart where User_ID='$user_id'";

$run_cart = mysqli_query($connect,$select_cart);

$count = mysqli_num_rows($run_cart);

?>

<h5 class="pcart"> You currently have <?php echo $count; ?> item(s) in your cart. </h5>

<section>
<div class="product-display">
  <table class="cart-display-table">
    <thead class="thead">
      <tr class="tro">
      <td> Name</td>
      <td> Quantity </td>
      <td> Price </td>
      <td> Sub Total </td>
       
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
        <td> <?php echo $fetch_cart['Product_Quote'];?> </td>
        <td> <?php echo $fetch_cart['Quantity'];?> </td>
        <td> <?php echo $fetch_cart['Product_Price'];?></td>
        


<td>
<div class="sub-total"> <span>LKR <?php echo $sub_total = ($fetch_cart['Product_Price'] * $fetch_cart['Quantity']); ?>/-</span> </div>
       </td>
<td>
<div class="oproducts"> <span> <?php echo $oproducts= ($fetch_cart['Product_Quote'].'<br>Quantity:'.$fetch_cart['Quantity'].'<br>weight:'.$fetch_cart['Weight'].' <br>Flavour:'.$fetch_cart['Flavour'].'<br>Shape:'.$fetch_cart['Shape'].'<br>Age:'.$fetch_cart['Age'].'<br>Color:'.$fetch_cart['Color'].'<br> '.$fetch_cart['orphanage']); ?></div>
       </td>

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
    </div>
    
    </form>

<br><br><br>

<div class="order">
  <form name="orders" method="POST" action="action.php">
  <input type="hidden" name="G_Total" value="<?php echo $grand_total; ?>"> 
  <input type="hidden" name="oproducts" value="<?php echo $oproducts?>">
  <h2>PURCHASE TYPE</h2>

     <label for="ptype"></label><br>
        <select id="purchase_type" name="purchase_type">
               <option value="Send as a Gift">Send as a Gift</option>
               <option value="Buy for Myself">Buy for Myself</option>
        </select>

        <br><br><br><br><br><br>


        
<h2>SENDER INFORMATION</h2>


    <label for="sname"><i class="fa fa-user"></i>&nbsp;&nbsp; Full Name</label>
    <input type="text" id="sender_name" name="sender_name" placeholder="Your name.." required><br><br>

    <label for="snumber"><i class="fa fa-phone"></i>&nbsp;&nbsp; Phone Number </label><br>
    <input type="tel" id="sender_number" name="sender_number"  pattern="[07][0-9]{9}" maxlength="10"  placeholder="07XXXXXXXX" required><br><br>

    <label for="semail"><i class="fa fa-envelope"></i>&nbsp;&nbsp; Email</label><br>
    <input type="email" id="sender_email" name="sender_email" placeholder="abcd@gmail.com.."  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>

    <label for="scity"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; City</label><br>
    <input type="text" id="sender_city" name="sender_city" placeholder="Your city .." required><br><br><br><br><br>



    <h2>RECEIVER INFORMATION</h2>

    <label for="rname"><i class="fa fa-user"></i>&nbsp;&nbsp; Full Name</label><br>
    <input type="text" id="receiver_name" name="receiver_name" placeholder="Full Name.." required><br><br>

    <label for="rnumber"><i class="fa fa-phone"></i>&nbsp;&nbsp; Phone Number</label><br>
    <input type="tel" id="receiver_number" name="receiver_number" pattern="[07][0-9]{9}" maxlength="10"  placeholder="07XXXXXXXX" required><br><br>

    <label for="remail"><i class=" fa fa-envelope"></i>&nbsp;&nbsp; Email</label><br>
    <input type="email" id="receiver_email" name="receiver_email" placeholder="abcd@gmail.com.."  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>

    <label for="raddress1"><i class="fa fa-address-card"></i>&nbsp;&nbsp; Address</label><br>
    <input type="text" id="receiver_address" name="receiver_address" placeholder="Address .." ><br><br>

    <label for="rcity"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; City</label><br>
    <input type="text" id="receiver_city" name="receiver_city" placeholder=" City .." required><br><br><br><br><br><br>





    <h2>DELIVERY INFORMATION</h2>

    <label for="date"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Delivery Date </label><br>
    <input type="date" id="delivery_date" name="delivery_date" required><br><br>

    <label for="rcity"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp; Delivery Time</label><br>
    <input type="time" id="delivery_time" name="delivery_time" required><br><br><br><br><br><br>
    



<h4><b>Same-Day Delivery: <br>
If the gift item(s) selected are all from the same-day delivery category, and the order is placed before 2pm , 
the gift(s) will be delivered within the day. If the order is placed after 2pm , the gift(s) will be delivered the following day.</b></h4>


<br><br>

<h4><b>Other: 
<br>For all other gift item(s), kindly note that the earliest delivery date possible will be 02 days from when the order was placed.</b></h4>

<br><br><br><br><br>




    
    <h2>ADDTIONAL INFORMATION</h2>

    <label for="special"><i class="fa fa-pencil"></i>&nbsp;&nbsp; Special Instruction to Shop</label><br>
    <textarea id="special_note" rows="5" cols="150"  name="special_note" placeholder="( Optional ) Are there any landmarks or delivery instructions you feel
    would help us deliver your gifts ? Please note them down here . ( max . 300 characters )"></textarea><br><br><br>

    <label for="image"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp; Image for Personalized Gift</label><br>
    <input type="file" id="image" name="image"><br><br><br>

    <label for="personal"><i class="fa fa-pencil"></i>&nbsp;&nbsp; Personal Note</label><br>
    <textarea  id="personal_note" rows="5" cols="150" name="personal_note" placeholder="( Optional ) Would you like to personal se your gift further This special message will 
     be hard written on a complimentary Silver Asle card ! ( max 300 characters )"></textarea><br><br><br><br><br><br>


     <a href="payment.php"><input type="submit" value="Continue Checkout"></a>

  </form>
</div>

<br><br><br>
</section>






  <!--*************************************Review Section*****************************************************-->
<div>
  <br>
  <br>
  <br>
</div>


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
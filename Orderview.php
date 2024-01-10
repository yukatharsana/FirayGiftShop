
<?php include('config.php');
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
$id=$_SESSION['user_id'];
$sql="SELECT * FROM `orders` WHERE `User_ID` =$id";
$res=$connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="CSS/HeaderFooterStyle.css">
    <link rel="stylesheet" href="CSS/Orderview.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
    <title>Orderview</title>       
</head>
    
<body>
    <?php  include("Header.php")?>
    
 <div class="Order-view">
        <h2>My Order details</h3>
        <?php while($orderrow=mysqli_fetch_assoc($res)){ ?>
      <div class="view">
         <img src="https://cdn.shopify.com/s/files/1/1060/3816/products/lucious-butter-scotch-cake_large.jpg?v=1643338807" alt="">

              <table>
                <tr>
                  <td> your order:<?php echo $orderrow['products']?></td>
               </tr>
                <tr>
                    <td>SenderName:<?php echo $orderrow['sender_name']?></td>
                    <td>SenderEmail:<?php echo $orderrow['sender_email']?></td>
                </tr>
                <tr>
                    <td>SenderCity:<?php echo $orderrow['sender_city']?></td>
                    <td>ReciverName:<?php echo $orderrow['receiver_name']?></td>
                </tr>
                <tr>
                    <td>ReciverNumber:<?php echo $orderrow['receiver_number']?></td>
                    <td>ReciverEmail:<?php echo $orderrow['receiver_email']?></td>
                </tr>
                <tr>
                    <td style="display:flex;flex-wrap:wrap;flex-direction:column">ReciverAddress:<?php echo $orderrow['receiver_address']?></td>
                    <td>Delivery date:<?php echo $orderrow['delivery_date']?></td>
                </tr>
              </table>   
      </div>
           <div class="viwe-details1">
                <p><b>Special Note:</b><?php echo $orderrow['special_note']?></p>
                <p><b>Personal Notes:</b><?php echo $orderrow['personal_note']?></p>
           </div>
           <hr  style="border: 3px solid purple;border-radius: 3px;">
           <?php }?>
             <a href="Myorder.php">
                 <button type="button2">Go Back</button>
            </a>
        
    </div>
 <!-----------------------------------------------customer feed back------------------>
 <?php 
    if(isset($_POST['feedbacksebt'])){
        $firstname=$_POST['firstname'];
        $subject=$_POST['subject'];
        $id=$_SESSION['user_id'];
        $feedbackinsert="INSERT into `reviews` (`User_ID`,`review`) value ('$id','$subject')";
        $connect->query($feedbackinsert);
    }
    else{
        echo "";
    }

?>

  <div class="feedback">
      <h2>Have a few minuts? submit your feedback.</h2>
        <form action="" method="POST">
            <div class="lable1">
                <label for="fname">Your Name:</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
            </div>
            <div class="label2">
                <label for="subject">Write your Feedback here..</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
        <div class="feeadback_submit">
            <input type="submit" name="feedbacksebt" value="Submit">
        </div>
          
       </form>
  </div>

  <?php include("footer.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/header.js"></script>
  <script src="JS/Mainjs.js"></script>
</body>
</html>

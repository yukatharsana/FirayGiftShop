<?php include('config.php');
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
$id=$_SESSION['user_id'];
$sql="SELECT * FROM `orders` WHERE `User_ID` =$id";
$res=$connect->query($sql);
$usersql="SELECT * FROM `users` WHERE `id` =$id";
$userres=$connect->query($usersql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="CSS/Myorder.css">
    <link rel="stylesheet" href="CSS/HeaderFooterStyle.css">
    <script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
    <title>Myorderpage</title>
</head>

<body>
  <?php  include("Header.php")?>
 <main>

  <div class="User_details">
     <h3> User-details</h3>
       <ul>
        <?php $user=mysqli_fetch_assoc($userres); ?>
            <li>User name:<?php echo $user['name']; ?></li>
            <li>Email-Id:<?php echo $user['email']; ?></li>
       </ul>  
       
  </div>
  
  <div class="Myorder">
    <h3>My orders</h3>
        <?php while($orderrow=mysqli_fetch_assoc($res)){ ?>
        <div class="order">
            <ul>
               <li><?php echo $orderrow['Order_status']?></li>
                <li>Order-date:<?php echo $orderrow['order_datetime']?><span>Order-id:<?php echo $orderrow['Order_ID']?></span></li>
             </ul>
            <div class="order-details">
               <img src="personalize_img/<?php echo $orderrow['image']?>" alt="">
                <ul>
                 <li>User-ID:<?php echo $orderrow['User_ID']?></li>
                 <li>Total amount:<?php echo $orderrow['G_Total']?></li>
                 <li>Purchase_type:<?php echo $orderrow['purchase_type']?></li>
                 <li>Receiver address:<?php echo $orderrow['receiver_address']?></li>
               </ul>
               <div class="order-btn">
                 <button type="button" class="cancelbtn" id="<?php echo $orderrow['Order_ID']?>">Cancel</button>
                 <a href="Orderview.php">
                 <button type="button">more</button>
                 </a>
               </div> 
             </div>
        </div>
        <?php }?>
          
    </div>
</main>
 <?php include("footer.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/header.js"></script>
  <script src="JS/Mainjs.js"></script>
      <script>
        $(document).on('click',".cancelbtn",function(){
          let orid=$(this).attr('id');
          $.ajax({
            type: "POST",
            url: "orderdelete.php",
            data: {id:orid},
            success: function (response) {
              alert(response);
              if(response=="Are you sure want to delete?"){
                $(orid).remove();
              }
              else{

              }
            }
          });
        });
      </script>
</body>
</html>
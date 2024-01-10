
<?php
  include("config.php");
  session_start();
  $FairyJsonFile=file_get_contents('JS/Fairy.json');
  $FairyGiftShop=json_decode($FairyJsonFile,true);
  
$user_id = $_SESSION['user_id'];

if(isset($_POST['Csubmit']))
  {
    
  $message = $_POST['message'];
  $message_image=$_FILES['image']['name'];
  $message_image_tmp_name=$_FILES['image']['tmp_name'];
  $message_image_folder='message_img/'.$message_image;
  


    //query to insert the variable data into the database
  $sql="INSERT INTO message (User_ID,message,image) VALUES ('$user_id', '$message', '$message_image')";

  $result=mysqli_query($connect,$sql);
  if($result){
  move_uploaded_file($message_image_tmp_name,$message_image_folder);
  echo'<script> alert ("Thank you! We will get in touch with you soon")</script>';
}

else{
  echo "Something went wrong!!!";
 }


}
?>
   
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" > <!-- need for category list responsive-->
    
    <title>Contact Us</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!--custom css file link-->
    <link rel="stylesheet" href="CSS/HeaderFooterStyle.css">

     <!--custom css file link-->
     <link rel="stylesheet" href="CSS/contact.css">

    <!--fontawseom icon link-->
    <link rel="stylesheet" href="https://fontawesome.com/v4/icons/">
	
	

</head>
<body>
<?php include 'Header.php'; ?>



<section class="my-contact-us-form-section">
<div class="my-contact-form">
<h1 class="my-contact-form-h1">Say Hello</h1>
<h2 class="my-contact-form-h2">We are always ready to answer you!</h2>
</div>

<div class="contact-us"> 
<form id="contact-us" method="post" action="" class="my-form" enctype="multipart/form-data">

<textarea name="message" id="form-control-textarea" class="my-form-control" cols="" rows="3" placeholder="Enter your message" required></textarea>
<br>
<input type="file" name="image" accept="image/jpg, image/jpeg, image/png ,image/web" class="my-form-control">
<br>
<input type="submit"  name="Csubmit"  class="form-control-submit" value="SEND MASSEGE">
</form>
</div>
  
</section>
<br>
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
  <script src="JS/Home.js"></script>
</body>
</html>

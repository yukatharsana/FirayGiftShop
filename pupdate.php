<?php

include"config.php";
	session_start();
	
// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');

// }


if(isset($_POST['update'])){

  $update_p_id = $_SESSION["user_id"];

  $password = mysqli_real_escape_string($connect, md5($_POST['password']));
  $cpassword = mysqli_real_escape_string($connect, md5($_POST['cpassword']));



  $otpassword = mysqli_real_escape_string($conn, md5($_POST['opassword']));
  
  if( $otpassword==$_SESSION['password'] ){
	
		if($password != $cpassword){
			echo'<script> alert("confirm password not matched!")</script>';
		  }else{
			mysqli_query($connect, "UPDATE `users` SET  Password='$password' WHERE ID= '$update_p_id'") or die('query failed');
		  } 
	}
	
  }else{

  }
 
?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>update</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>
<style>
.form-group{
    width:60%;
    text-align:justify;
    margin-left:150px;

}
.aph{
    text-align:justify;
    margin-left:150px;
}
.update{
   
    border-radius: .5rem;
    font-size: 1.0rem;
    padding: 0.5rem 2rem;
    background-color:#83028f;
    color: white; 
    border: 2px solid gray;

}
</style>
	
		
	
	<?php include"AdminHeader.php";?>
		
   		
	<div class="containerbd"> <br> 
	<div class="fdsection">	
    <h3 class="aph"> Update Password </h3> <br>


<section class="update-profile">



<div class="pContainer">
    <div class="pucontainer">
    <form action="" method="post">
 
									
									
									
									
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="New Password">
									</div> <br>
									<div class="form-group">
										<input type="password" name="cpassword" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm New Password">
									</div>  <br>
									<div class="form-group">
										<input type="password" name="opassword" id="opassword" tabindex="2" class="form-control" placeholder="Old Password" required>
									</div>  <br> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="update" id="register-submit" tabindex="4" class="update" value="Update Now"> <br> <br>
											</div>
										</div>
									</div>
								</form>
		
</div>
</div>



</section>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
	</body>
</html>
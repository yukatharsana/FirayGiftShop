<?php
@include 'config.php';
session_start();
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Products</title>

</head>
<body>

<?php
 @include 'AdminHeader.php';

if(isset($message)){
  foreach ($message as $message){
echo'<span class="message">'.$message.'</span>';
  }
}

?>

<?php
					if(isset($_POST["add_maincategory"]))
					{
						$sql="select * from maincategory where MC_Name='{$_POST["Mcategory"]}'";
						$res=$connect->query($sql);
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["MC_ID"]=$ro["MC_ID"];
							$_SESSION["MC_Name"]=$ro["MC_Name"];
							echo "<script>window.open('AdminProducts.php','_self');</script>";
						}
						else
						{
              echo'<script> alert ("select a main category!")</script>';
						}
					}
				
				
				
				?>


<div class="product-Container">
    <div class="admin-product-form-container">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>Add Product</h3>

      <select  name="Mcategory" id="C1" class="box">
				
                <?php 
                     $sl="SELECT DISTINCT(MC_Name) FROM maincategory";
                    $r=$connect->query($sl);
                        if($r->num_rows>0)
                            {
                                echo"<option value=''>Select</option>";
                                while($ro=$r->fetch_assoc())
                                {
                                    echo "<option value='{$ro["MC_Name"]}'>{$ro["MC_Name"]}</option>";
                                }
                            }
                ?>
            
            </select>

     
      <input type="submit" value="Next" name="add_maincategory" class="btn">
   </form>


</div>
</div>



</body>
</html>

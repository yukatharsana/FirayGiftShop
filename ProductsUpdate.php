<?php

@include 'config.php';



if(isset($_POST['update_product'])){

  $update_p_id = $_POST['update_p_id'];

  $Product_name=mysqli_real_escape_string($connect, $_POST['name']);
  $Product_price=mysqli_real_escape_string($connect, $_POST['price']);
  $Product_Quote=mysqli_real_escape_string($connect, $_POST['quote']);
  $Product_details=mysqli_real_escape_string($connect, $_POST['details']);
  

   mysqli_query($connect, "UPDATE `products` SET  Product_Name = '$Product_name',Product_Price='$Product_price',Product_Quote='$Product_Quote',Product_Details='$Product_details' WHERE Product_ID= '$update_p_id'") or die('query failed');

   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploaded_img/'.$image;
   $old_image = $_POST['update_p_image'];
   
   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'image file size is too large!';
      }else{
         mysqli_query($connect, "UPDATE `products` SET Product_Image = '$image' WHERE Product_ID= '$update_p_id'") or die('query failed');
         move_uploaded_file($image_tmp_name, $image_folter);
         unlink('uploaded_img/'.$old_image);
         $message[] = 'image updated successfully!';
      }
   }

   $message[] = 'product updated successfully!';

}

  
?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>update product</title>

</head>
<body>
   
<?php @include 'AdminHeader.php'; 

if(isset($message)){
  foreach ($message as $message){
echo'<span class="message">'.$message.'</span>';
  }
}
?>

<section class="update-product">

<?php

   $update_id = $_GET['update'];
   $select_products = mysqli_query($connect, "SELECT 
                                            p.Product_Name,
                                            p.Product_Price,
                                            p.Product_Quote,
                                            p.Product_Details,
                                            p.Product_Image,
                                            p.Product_ID,
                                            s.Subcategory,
                                            m.MC_Name
                                            FROM products p INNER JOIN subcategory AS s ON p.SC_ID = s.SC_ID INNER JOIN maincategory AS m ON s.MC_ID = m.MC_ID WHERE Product_ID = '$update_id' ") or die('query failed');
   if(mysqli_num_rows($select_products) > 0){
      while($fetch_products = mysqli_fetch_assoc($select_products)){
?>

<div class="product-Container">
    <div class="admin-product-form-container">

<form action="" method="POST" enctype="multipart/form-data">
<a href="AdminProducts.php" class="btngb">Go back</a>  <h3>Update the product</h3>
      

  <img src="uploaded_img/<?php echo $fetch_products['Product_Image']; ?>" class="image"  alt="" width="100%">
  <input type="hidden" value="<?php echo $fetch_products['Product_ID']; ?>" name="update_p_id">
  <input type="hidden" value="<?php echo $fetch_products['Product_Image']; ?>" name="update_p_image">
  <input type="text"  class="box" name="rno" style="background:#b1b1b1;" value="<?php echo $fetch_products["MC_Name"];?>" readonly  >
  <input type="text"  class="box" name="rno" style="background:#b1b1b1;" value="<?php echo $fetch_products["Subcategory"];?>" readonly  >
     
    
    
  <input type="text" class="box" value="<?php echo $fetch_products['Product_Name']; ?>" required placeholder="update product name" name="name">
  
  <input type="number" min="0" class="box" value="<?php echo $fetch_products['Product_Price']; ?>"placeholder="Enter product price" name="price">
  <input type="text" class="box" value="<?php echo $fetch_products['Product_Quote']; ?>" placeholder="Enter product quote" name="quote">
  <textarea name="details" class="box"> <?php echo htmlspecialchars($fetch_products['Product_Details']);?>  </textarea>
  
  <input type="file" class="box" accept="image/jpg, image/jpeg, image/png" name="image" width="100%" >
   <input type="submit" value="update product" name="update_product" class="btn">
   
   </form>
</div>
</div>


<?php
      }
   }else{
      echo '<p class="empty">no update product select</p>';
   }
?>

</section>

</body>
</html>
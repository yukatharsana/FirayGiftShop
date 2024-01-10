<?php
	include"config.php";
	session_start();
	if(!isset($_SESSION["MC_ID"]))
	{
		echo"<script>window.open('AdminAddProducts.php?mes=Access Denied..','_self');</script>";
		
	}		
?>
<?php
@include 'config.php';

if(isset($_POST['add_product']))
{

  $Product_SubCategory=$_POST['Scategory'];
  $Product_name=$_POST['name'];
  $Product_price=$_POST['price'];
  $Product_Quote=$_POST['quote'];
  $Product_details=$_POST['details'];
  $Product_image=$_FILES['image']['name'];
  $Product_image_tmp_name=$_FILES['image']['tmp_name'];
  $Product_image_folder='uploaded_img/'.$Product_image;

  if( empty($Product_SubCategory)|| empty($Product_name)|| empty($Product_price)|| empty($Product_Quote)|| empty($Product_details)|| empty($Product_image)){
    $message[]='please fill out all';
  } else{
$insert= "INSERT INTO products(SC_ID,Product_Name,Product_Price,Product_Quote,Product_Details,Product_Image)VALUES((SELECT SC_ID FROM subcategory WHERE Subcategory = '$Product_SubCategory' AND MC_ID='{$_SESSION["MC_ID"]}' ),' $Product_name','$Product_price','$Product_Quote',' $Product_details','$Product_image')";
$upload=mysqli_query($connect,$insert);
if($upload){
  move_uploaded_file($Product_image_tmp_name,$Product_image_folder);
  $message[]='NEW PRODUCT ADDED SUCCESFULLY';
}else{
  $message[]='could not add the product';
}
}
};


if(isset($_GET['delete'])){

  $delete_id = $_GET['delete'];
  mysqli_query($connect, "DELETE FROM `products` WHERE Product_ID = '$delete_id'") or die('query failed');
  header('location:AdminProducts.php');
};
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

<body>

            <div class="product-Container">
              <div class="admin-product-form-container">

              <form action="" method="POST" enctype="multipart/form-data">
                <h3>Add new product</h3>


      

              
     <input type="text"  class="box" name="rno" style="background:#b1b1b1;" value="<?php echo $_SESSION["MC_Name"];?>" readonly  >
     
      
    
      <select  name="Scategory" id="C2" class="box">
      $r=$re->fetch_assoc();
      <?php 
           $sl="SELECT DISTINCT(Subcategory) FROM subcategory WHERE MC_ID ='{$_SESSION["MC_ID"]}' ";
          $res=$connect->query($sl);
              if($res->num_rows>0)
                  {
                      echo"<option value=''>Select</option>";
                      while($ro=$res->fetch_assoc())
                      {
                          echo "<option value='{$ro["Subcategory"]}'>{$ro["Subcategory"]}</option>";
                      }
                  }
      ?>
  </select>
  
      <input type="text" class="box" placeholder="Enter product name" name="name">
      <input type="number" min="0" class="box" placeholder="Enter product price" name="price">
      <input type="text" class="box" placeholder="Enter product quote" name="quote">
      <textarea name="details" class="box"  placeholder="Enter product details"> </textarea>
      <input type="file" class="box" accept="image/jpg, image/jpeg, image/png" name="image" width="100%" >
      <input type="submit" value="Add Product" name="add_product" class="btn">
   </form>
</div>
</div>
<?php
$select = mysqli_query($connect,"SELECT 
                                p.Product_Name,
                                p.Product_Price,
                                p.Product_Quote,
                                p.Product_Details,
                                p.Product_Image,
                                p.Product_ID,
                                s.Subcategory,
                                m.MC_Name
                                FROM products p INNER JOIN subcategory AS s ON p.SC_ID = s.SC_ID INNER JOIN maincategory AS m ON s.MC_ID = m.MC_ID ")or die('query failed');
?>
<div class="product-display">
  <table class="product-display-table">
    <thead class="thead">
      <tr class="tr">
        <td> Main category </td>
        <td> Sub Category </td>
        <td> Product Name </td>
        <td> Product Price </td>
        <td> Product quote </td>
        <td> Product Details </td>
        <td> Product Image </td>
        <td rowspan="2"> Action </td>
</tr>
</thead>

<?php
while ($row = mysqli_fetch_assoc($select)){

  ?>


          

  <tr>
        <td><?php echo $row["MC_Name"];?> </td> 
        <td> <?php echo $row["Subcategory"] ;?> </td>
        <td> <?php echo $row['Product_Name'];?> </td>
        <td> <?php echo $row['Product_Price'];?>LKR</td>
        <td> <?php echo $row['Product_Quote'];?></td>
        <td> <?php echo $row['Product_Details'];?></td>
        <td> <img src="uploaded_img/<?php echo $row['Product_Image'];?>" height="150" width="150" alt=""> </td>
        <td> 

<a href="ProductsUpdate.php?update=<?php echo $row['Product_ID']; ?>" class="button">  <i class="fa fa-edit"></i> Update</a>

<a href="AdminProducts.php?delete=<?php echo $row['Product_ID']; ?>" class="button" onclick="return confirm('delete this product?');"> <i class="fa fa-trash"></i> Delete</a>
      
        </td>
      <tr>
<?php 
}; 
?>
</table>



</body>
</html>

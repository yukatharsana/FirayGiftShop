<?php
@include 'config.php';

if(isset($_POST['add_maincategory']))
{
  $Product_MainCategory=$_POST['Mcategory'];

  if(empty($Product_MainCategory)){
    $message[]='please fill MainCategory Name';
  } 
  else {
$insert= "INSERT INTO maincategory(MC_Name)VALUES(' $Product_MainCategory')";
$upload=mysqli_query($conn,$insert);
if($upload){
  $message[]='NEW MainCategory ADDED SUCCESFULLY';
}else{
  $message[]='could not add the MainCategory';
}
}
};

if(isset($_POST['add_subcategory']))
{
  $Product_SubCategory=$_POST['Scategory'];
  $MainCategory=$_POST['SMcategory'];

  if(empty($Product_SubCategory)){
    $message[]='please fill all fields';
  } 
  else {
$insert= "INSERT INTO subcategory(Subcategory,MC_ID)VALUES(' $Product_SubCategory',(SELECT MC_ID FROM maincategory WHERE MC_Name = '$MainCategory'))";
 $upload=mysqli_query($connect,$insert);
if($upload){
  $message[]='NEW SubCategory ADDED SUCCESFULLY';
}else{
  $message[]='could not add the SubCategory';
}
}
};


if(isset($_GET['deleteM'])){

  $delete_id = $_GET['deleteM'];
  mysqli_query($connect, "DELETE FROM `maincategory`  WHERE MC_ID = '$delete_id'") or die('query failed');
  header('location:AdminCategory.php');
};

if(isset($_GET['delete'])){

  $delete_id = $_GET['delete'];
  mysqli_query($connect, "DELETE FROM `subcategory` WHERE SC_ID = '$delete_id'") or die('query failed');
 
  header('location:AdminCategory.php');
};
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Products</title>

</head>
<body>

<style>
  .fa fa-trash{
    color:purple;
  }
  </style>

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
      <h3>Add new Main Category</h3>
      <input type="text" class="box" placeholder="Enter Main Category Name" name="Mcategory">
      <input type="submit" value="Add Main Category" name="add_maincategory" class="btn">
   </form>
</div>
</div>

<body>
<div class="product-Container">
    <div class="admin-product-form-container">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>Add new Sub Category</h3>

      <select  name="SMcategory" id="C1" class="box">
				
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

      <input type="text" class="box" placeholder="Enter Sub Category Name" name="Scategory">
      <input type="submit" value="Add Sub Category" name="add_subcategory" class="btn">
   </form>
</div>
</div>
<br>

<?php
$select = mysqli_query($connect,"SELECT  s.Subcategory,                                 
                                      m.MC_Name FROM  subcategory s INNER JOIN maincategory AS m ON s.MC_ID = m.MC_ID ")or die('query failed');
?>
<div class="scd">
  <table class="scdt">
    <thead class="scdth">
      <tr class="tr">
        <td> Main category </td>
       
        <td> Sub Category </td>
       
</tr>
</thead>

<?php
while ($row = mysqli_fetch_assoc($select)){
  ?>

  <tr class="scdtr">
        <td> <?php echo $row['MC_Name'];?> </td>
        
        <td> <?php echo $row['Subcategory'];?> </td>
        
      <tr>
<?php 
}; 
?>
</table>
</div>

<br>

<?php
$selectm = mysqli_query($connect,"SELECT * FROM  maincategory")or die('query failed');
?>
<div class="amc">
  <table class="amct">
    <thead class="">
      <tr>
      <td class="amcth"> Main category </td>
        <td class="amcth" >Delete Main category  </td>
</tr>
</thead>
<?php
while ($rowm = mysqli_fetch_assoc($selectm)){
  ?>

  <tr class="amctr">
  <td> <?php echo $rowm['MC_Name'];?> </td>
        <td> 
<a href="AdminCategory.php?deleteM=<?php echo $rowm['MC_ID']; ?>" class="acbtn" onclick="return confirm('delete this product?');"> <i class="fa fa-trash"></i> Delete</a>
       </td>
      <tr>
<?php 
}; 
?>
</table>
</div>

<br>
<?php
$selects = mysqli_query($connect,"SELECT * FROM  subcategory")or die('query failed');
?>
<div class="amc">
  <table class="amct">
    <thead class="">
      <tr class="tr">
        <td class="amcth"> Sub Category </td>
        <td class="amcth">Delete Sub Category </td>
</tr>
</thead>

<?php
while ($rows = mysqli_fetch_assoc($selects)){
  ?>

  <tr class="amctr">
        <td> <?php echo $rows['Subcategory'];?> </td>
        <td> 
<a href="AdminCategory.php?delete=<?php echo $rows['SC_ID']; ?>" class="acbtn" onclick="return confirm('delete this product?');"> <i class="fa fa-trash"></i> Delete</a>
       </td>
      <tr>
<?php 
}; 
?>
</table>
</div>

</body>
</html>

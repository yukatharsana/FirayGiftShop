<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Reviews</title>
<?php @include 'AdminHeader.php'; 
@include 'config.php';
?>
</head>
<body>
<section class="users">


   <div class="box-container">
      <?php
         $select_users = mysqli_query($connect, "SELECT * FROM `reviews`") or die('query failed');
         if(mysqli_num_rows($select_users) > 0){
            while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> Review ID : <span><?php echo $fetch_users['ID']; ?></span></p>
         <p> User_ID : <span><?php echo $fetch_users['User_ID']; ?></span></p>
         <p> Review : <span><?php echo $fetch_users['review']; ?></span></p>
      </div>
      <?php
         }
      }
      ?>
   </div>

</section>


</body>
</html>


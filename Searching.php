<?php 
    include('config.php');
    $action=$_POST['action'];
    if($action=="seemore"){
        $id=$_POST['id'];
       $sql="SELECT * FROM `products` WHERE `Product_ID` = $id";
        $res=$connect->query($sql);
        while($pro=mysqli_fetch_object($res)){
            echo json_encode($pro);
        }
    }
    else if ($action=="search") {
        $serch=$_POST['search'];
        $sql="SELECT * FROM `products` WHERE `Product_Name` LIKE '$serch%' OR `Product_ID` LIKE '$serch%' OR `Product_Quote` LIKE '$serch%'";
        $res=$connect->query($sql);
        while($row=mysqli_fetch_assoc($res)){ ?>
                    <div class="serchitem" id='<?php echo $row['Product_ID'];?>'>
        <img src="uploaded_img/<?php echo $row['Product_Image']; ?>" alt="<?php echo $row['Product_Image'];?>">
        <h3><?php echo $row['Product_Name']; ?></h3>
        <h4>Rs.<?php echo $row['Product_Price']; ?>/=</h4>
        <p><?php echo $row['Product_Details	']; ?></p>
        <div class="icons">
                 <a href="#" class="fas fa-heart fa-3x" id='<?php echo $row['Product_ID'];?>></a>
                 <button type="submit" class="show-details-buy" id='<?php echo $row['Product_ID'];?>>Buynow</button>
                 <a href="#" class="fa-solid fa-cart-shopping fa-3x" id='<?php echo $row['Product_ID'];?>'></a>
                 
               </div>
   </div>  
     <?php   }
     
    }
?>
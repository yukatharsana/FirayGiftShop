<?php 
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
 
    include('config.php');
    $orderid=$_POST['id'];
    $delsql="DELETE FROM `orders` WHERE `Order_ID`='$orderid'";
    if($connect->query($delsql)){
        echo "yes";
    }
    else{
        echo "no";
    }


?>
<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
};

if(!isset($_POST['submit']))
{

$purchase_type=$_POST['purchase_type'];
$sender_name=$_POST['sender_name'];
$sender_number=$_POST['sender_number'];
$sender_email=$_POST['sender_email'];
$sender_city=$_POST['sender_city'];
$receiver_name=$_POST['receiver_name'];
$receiver_number=$_POST['receiver_number'];
$receiver_email=$_POST['receiver_email'];
$receiver_address=$_POST['receiver_address'];
$receiver_city=$_POST['receiver_city'];
$delivery_date=$_POST['delivery_date'];
$delivery_time=$_POST['delivery_time'];
$special_note=$_POST['special_note'];
$image=$_POST['image'];
$personal_note=$_POST['personal_note'];
$G_Total=$_POST['G_Total'];
$o_products=$_POST['oproducts'];



$connect=mysqli_connect("localhost","root","","fairygift_shop");

$sql="INSERT INTO orders
(User_ID,purchase_type,sender_name,sender_number,sender_email,sender_city,receiver_name,receiver_number,receiver_email,receiver_address,receiver_city,delivery_date,delivery_time,special_note,image,personal_note,order_datetime,G_Total,products)
VALUES ('$user_id','$purchase_type','$sender_name','$sender_number','$sender_email','$sender_city','$receiver_name','$receiver_number','$receiver_email','$receiver_address','$receiver_city','$delivery_date','$delivery_time','$special_note','$image','$personal_note',NOW(),'$G_Total','$o_products');
DELETE FROM `cart` WHERE user_id = '$user_id'";

if($connect->multi_query($sql)){
{
  header('location:payment.php');
}

}else

 {
  header('location:Home.php');
 }

}

?>
<?php
	include"config.php";


    $oid = $_GET['oid'];

	
        $sql="SELECT * FROM orders LEFT JOIN gifts ON orders.Order_ID = gifts.Order_ID where orders.Order_ID='$oid' ";
		$res=$connect->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}	
    
        if(isset($_POST["submit"]))
        {
    
        }
        
        $osql="SELECT * FROM orders where orders.Order_ID='$oid'";
		$result=$connect->query($osql);

		if($result->num_rows>0)
		{
			$frow=$result->fetch_assoc();
		}
       
        
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> user_view </title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>
	<?php include"AdminHeader.php";?><br> 
		
   
	<div class="">
    <h3 class="aohead"> Order Details</h3><br>
        <div class="">
		                        
            <table  class='table'>
                                
                <thead>
                    <tr>	
                        <th>Order_ID</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $frow["Order_ID"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> User_ID</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $frow["User_ID"] ?> </td>
                    </tr>							
                </tbody>
                <thead>
                    <tr>	
                        <th> Order</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["products"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> Purchase Type</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["purchase_type"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> Sender Name</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["sender_name"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> Sender Number</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["sender_number"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Sender Email </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["sender_email"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Sender city</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["sender_city"] ?>  </td>
                    </tr>							
                </tbody>
                <thead>
                    <tr>	
                        <th> Reciver Name</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["receiver_name"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> Reciver Mobile No</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["receiver_number"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Reciver_Email </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["receiver_email"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Reciver Address</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["receiver_address"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> Delivery Date</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["delivery_date"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Delivery Time</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["delivery_time"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Special Note</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["special_note"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th> Image </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["image"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Personal Note</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["personal_note"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Ordered Date & Time </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["order_datetime"] ?>  </td>
                    </tr>							
                </tbody>
                <thead>
                    <tr>	
                        <th>Order Status</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Order_status"] ?>  </td>
                    </tr>							
                </tbody>
                <thead>
                    <tr>	
                        <th> Total Payment</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["G_Total"] ?>  </td>
                    </tr>							
                </tbody>		
                <thead>
                    <tr>	
                        <th> Payment status </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["payment_status"] ?>  </td>
                    </tr>							
                </tbody>
                <thead>
                    <tr>	
                        <th> Lucky Gift </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["G_name"] ?>  </td>
                    </tr>							
                </tbody>			
                
            </table>

           

            <form id="request" action="" method="post" role="form" style="display: block;">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 my-3" style="text-align:right;">
                            <input type="submit" name="submit" id="register-submit" tabindex="4" class="btncf" value="Confirm Order" ; onclick="return confirm('confirm this order?');">
                        </div>
                    </div>
                </div>						
            </form>

        </div>	
    </div>

    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>





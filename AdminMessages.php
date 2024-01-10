
 <!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Messages</title>
<?php @include 'AdminHeader.php'; 
?>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>

<div class="container">
								
					<h3 class="aohead"> your Messages </h3> <br>
					
        <div class="adsection">
       
									<table  class='table'>
									<thead>
										<tr>
										<th >Message ID</th>
										<th >User ID</th>
                              <th >User Name </th>
                              <th >User Email </th>
										<th> Message</th>	
                            <th> Image </th>
                              <th >Action</th>
										</tr>
									</thead>
                           <?php
								
								$sql="SELECT * FROM Message INNER JOIN users on Message.User_ID=users.id ";
								$re=$connect->query($sql);
								if($re->num_rows>0)
								{
				$i=0;
				while($row=$re->fetch_assoc())
				{
					$i++;
						echo  	"<tbody>
										<tr>
										<th>{$row["Message_ID"]}</th>
										<td>{$row["User_ID"]}</td>
										<td>{$row["name"]}</td>
                              <td>{$row["email"]}</td>
                              <td>{$row["message"]}</td>
                              <td> <img src='message_img/".$row["image"]."'style='width:175px;height:175px; '></td>
                              <td><a onClick=\"javascript:return confirm('Delete this message?');\"  href='message_delete.php?mid={$row["Message_ID"]}' class='acbtn'>Remove</a></td>
										
										</tr>
								</tbody>
							";		
            }
         }	
            
				else
				{
					echo "No record Found";
				}
					echo "</table>";
         
			?>
       
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	</body>
</html>





     
      

         
         
         
         
         
         
         
         
         
         
         
         <!-- <p> <img src="message_img/<?php echo  $fetch_users['image'];?>" height="150" width="150" alt=""> </p> -->
      
    

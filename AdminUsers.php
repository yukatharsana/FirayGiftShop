<?php
	include"config.php";

   ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Users</title>
<?php @include 'AdminHeader.php'; 
?>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>

<div class="container">
								
					<h3 class="aohead"> your users </h3> <br>
					
        <div class="adsection">
       
									<table  class='table'>
									<thead>
										<tr>
										<th >User Id</th>
										<th >User name</th>
										<th> Email</th>	
                              <th >Action</th>
										</tr>
									</thead>
                           <?php
								
								$sql="SELECT * FROM users where User_Type= 'user'";
								$re=$connect->query($sql);
								if($re->num_rows>0)
								{
				$i=0;
				while($row=$re->fetch_assoc())
				{
					$i++;
						echo  	"<tbody>
										<tr>
										<th>{$row["id"]}</th>
										<td>{$row["name"]}</td>
										<td>{$row["email"]}</td>
                              <td><a onClick=\"javascript:return confirm('Delete this user?');\"  href='user_delete.php?id={$row["id"]}' class='acbtn'>Remove</a></td>
										
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






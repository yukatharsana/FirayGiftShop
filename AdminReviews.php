<?php
	include"config.php";
  

   ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
<title>Admin_Reviews</title>
<?php @include 'AdminHeader.php'; 
?>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>

<div class="container">
								
					<h3 class="aohead"> your Reviews </h3> <br>
					
        <div class="adsection">
       
									<table  class='table'>
									<thead>
										<tr>
										<th >Review ID</th>
										<th >User ID</th>
										<th> Review </th>	
                              <th >Action</th>
										</tr>
									</thead>
                           <?php
								
								$sql="SELECT * FROM reviews";
								$re=$connect->query($sql);
								if($re->num_rows>0)
								{
				$i=0;
				while($row=$re->fetch_assoc())
				{
					$i++;
						echo  	"<tbody>
										<tr>
										<th>{$row["ID"]}</th>
										<td>{$row["User_ID"]}</td>
										<td>{$row["review"]}</td>
                              <td><a onClick=\"javascript:return confirm('Delete this Review?');\"  href='review_delete.php?rid={$row["ID"]}' class='acbtn'>Remove</a></td>
										
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






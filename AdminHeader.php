<?php

@include 'config.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AdminHeader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href = "AdminStyle.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
</head>
<body>



<nav class="navbar navbar-expand-sm  navbar-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">FairyGift - AdminPanel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon test"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ms-auto">
    
        <li class="nav-item "  >
          <a class="nav-link" href="AdminDashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminAddProducts.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminCategory.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminOrders.php">Orders</a>
        </li>    
      <li class="nav-item">
          <a class="nav-link" href="AdminUsers.php">Users</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="AdminReviews.php">Reviews</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="AdminMessages.php">Messages</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="#">account</a>
                    <ul>
                        <li><a href="pupdate.php"> Update</a></li>
                        <li><a href="logout.php"> Logout </a></li>
                    </ul>
        </li>
      
        </ul>
    </div>
  </div>
</nav>


</body>
</html>

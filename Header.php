
<header>

  <div class="header-1">
    <a href="#" class="logo">
      <img src="Images/logo1.ico" class="img-fluid rounded-circle" alt="Logo" width="80px" height="80px"> Fairy Gift Shop
    </a>

    <div class="form-container">
      <form  action="" autocomplete='off' method="POST" id="searchform">
          <input type="search" placeholder="search products" id="search" list="serachresult" /><label for="search" class="fas fa-search searching"></label>
      </form>
      <datalist id="serachresult"></datalist>
    </div>
  </div>

  <div class="header-2">
    <div id="menu" class="fa fa-ellipsis-v"></div>
      <nav class="navbar">
        <ul>

          <li>
            <a class="nav-link" href="Home.php">
              <span class="Menuicon">
                <i class="fas fa-home"></i>
              </span>
              <span class="menutext">Home</span>
            </a>
          </li>

          <li>
            <a class="nav-link" href="about.php">
              <span class="Menuicon">
                  <i class="fa fa-file-text"></i>
              </span>
               <span class="menutext">About Us</span>
            </a>
          </li>

          <li>
            <a class="nav-link" href="">
              <span class="Menuicon"> </span>
                <span class="menutext"> </span></a>
           
        <div class="icons">
        <div class="nav-item dropdown px-5 d-inline-block ">
        <a class="nav-link menulink  dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="display:flex;flex-direction:column;justify-content:center;align-items:center;"><i class="fa fa-gift"></i></span>Shop</span>
        </a>
      
    
    <div class="dropdown-menu catdropdown " aria-labelledby="navbarDropdown">

        <div class="submenu">
          <a class="dropdown-item text-white catoption" href="category.php">Birthday Gifts &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>

          <div class="submenu2">
                  <a class="dropdown-item text-white catoption" href=" ">Birthday Cakes</a>
                  <a class="dropdown-item text-white catoption" href="">Flowers</a>
                  <a class="dropdown-item text-white catoption" href="">Chocolates</a>
                  <a class="dropdown-item text-white catoption" href="">Personalized Gifts</a>
          </div>  
  </div>

  <div class="submenu">
          <a class="dropdown-item text-white catoption" href="">Wedding Gifts &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>

          <div class="submenu2">
              <a class="dropdown-item text-white catoption" href="">Flowers</a>
              <a class="dropdown-item text-white catoption" href="">Personalized Gifts</a>
          </div>  
  </div> 


  <div class="submenu">
          <a class="dropdown-item text-white catoption" href="">Anniversary Gifts &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i> </a>

          <div class="submenu2">
            <a class="dropdown-item text-white catoption" href="">Cakes</a>
              <a class="dropdown-item text-white catoption" href="">Flowers</a>
              <a class="dropdown-item text-white catoption" href="">Chocolates</a>
              <a class="dropdown-item text-white catoption" href="">Personalized Gifts</a>
          </div>  
  </div> 


  <div class="submenu">
          <a class="dropdown-item text-white catoption" href="">Valentinesday Gifts &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>
          <div class="submenu2">
            <a class="dropdown-item text-white catoption" href="">Cakes</a>
              <a class="dropdown-item text-white catoption" href="">Flowers</a>
              <a class="dropdown-item text-white catoption" href="">Chocolates</a>
              <a class="dropdown-item text-white catoption" href="">Personalized Gifts</a>
          </div>  
  </div> 


  <div class="submenu">
          <a class="dropdown-item text-white catoption" href="">Best Wishes Gifts &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>
          <div class="submenu2">
            
              <a class="dropdown-item text-white catoption" href="">Cakes</a>
              <a class="dropdown-item text-white catoption" href="">Flowers</a>
              <a class="dropdown-item text-white catoption" href="">Chocolates</a>
          </div>  
  </div> 


  <div class="submenu">
          <a class="dropdown-item text-white catoption" href="">Next - Day Delivery &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>
          <div class="submenu2">
            <a class="dropdown-item text-white catoption" href="">Cakes</a>
              <a class="dropdown-item text-white catoption" href="">Flowers</a>
              <a class="dropdown-item text-white catoption" href="">Chocolates</a>
              <a class="dropdown-item text-white catoption" href="">Personalized Gifts</a>
          </div>  
  </div> 

  <div class="submenu">
          <a class="dropdown-item text-white catoption" href="">Same - Day Delivery &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>
          <div class="submenu2">
            <a class="dropdown-item text-white catoption" href="">Cakes</a>
              <a class="dropdown-item text-white catoption" href="">Flowers</a>
              <a class="dropdown-item text-white catoption" href="">Chocolates</a>
              <a class="dropdown-item text-white catoption" href="">Personalized Gifts</a>
          </div>  
  </div> 


          <div class="submenu">
          <a class="dropdown-item text-white catoption" href="orphanage.php">Orphanage &nbsp; &nbsp;<i style="transform: rotate(-90deg);" class=" fa fa-caret-down"></i></a>
     
  </div> 
        
        </div>
        </div> 
          </li>



          <li>
            <a class="nav-link" href="contact.php">
              <span class="Menuicon">
                <i class="fa fa-envelope "></i>
              </span>
              <span class="menutext">Contact Us</span>
            </a>
          </li>

        </ul>
      </nav>
      <?php 
        if(isset($_SESSION['user_id'])){ ?>
        <div class="icons">
        <div class="nav-item dropdown px-5 d-inline-block ">
        <a class="nav-link menulink  dropdown-toggle" href="login.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="display:flex;flex-direction:column;justify-content:center;align-items:center;"><i class="fas fa-user"></i><span style="font-size:16px"><?php echo $_SESSION['user_name']; ?></span></span>
        </a>
        <div class="dropdown-menu userdropdown " aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-white useroption" href="Myorder.php"><i class="fas fa-user-plus mr-4"></i>My Order</a>
          <a class="dropdown-item text-white useroption" href="Login.php"><i class="fas fa-user mr-4"></i>Sign in</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-white useroption" href="login.php"><i class="fa fa-sign-out mr-4" aria-hidden="true"></i>Log out</a>
        </div>
        </div> 
        <?php 
          $userid=$_SESSION['user_id'];
          $wishlist= mysqli_query($connect, "SELECT * FROM `wishlist` WHERE `User_ID` = '$userid'") or die('query failed');
          $card=mysqli_query($connect, "SELECT * FROM `cart` WHERE `User_ID` ='$userid'") or die('query failed')
        ?>
          <a href="wishlist.php" class="fas fa-heart"><span><sup>(<?php echo mysqli_num_rows($wishlist); ?>)</sup></span> </a>
          <a href="cart.php" class="fas fa-shopping-cart"><span><sup>(<?php echo mysqli_num_rows($card); ?>)</sup></span></a> 
      </div>
        <?php }
        else{?>
      <div class="icons">
        <a href="login.php" class="fas fa-user"></a>  
        <a href="wishlist.php" class="fas fa-heart"></span> </a>
        <a href="cart.php" class="fas fa-shopping-cart"></a> 
      </div>
      <?php } ?>
  </div>
</header>
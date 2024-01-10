<?php
  include("config.php");
  session_start();
  
  $FairyJsonFile=file_get_contents('JS/Fairy.json');
  $FairyGiftShop=json_decode($FairyJsonFile,true);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="CSS/HeaderFooterStyle.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="CSS/Home.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/efee1a3566.js" ></script>
    <title>Home</title>
</head>
<body>
    <?php include("Header.php"); ?>
    <main>
      <section>
      <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
      <?php $count=0;
      while($count<=count($FairyGiftShop['aboutFairy'])){
        if($count==0){?>
      <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $count?>" class="active"></li>
        <?php }else{ ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $count?>"></li>
          <?php }
          $count++;
        }
          ; ?>
  </ol>
  <div class="carousel-inner ">
      <div class="carousel-item active">
      <img src="https://thumbs.dreamstime.com/b/happy-birthday-cupcake-celebration-message-160558421.jpg" class="d-block w-100 SlideShowImag" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
      </div>
    </div>

    <?php  
      foreach ($FairyGiftShop['aboutFairy'] as $about) {
      ?>
        <div class="carousel-item <?php echo $about['Style'];?>">
          <img src="<?php echo $about['image'];?>" class="d-block w-100 SlideShowImag" alt="<?php echo $about['Title'];?>">
          <div class="carousel-caption d-none d-md-block">
          <h5><?php echo $about['Title'];?></h5>
        </div>
    </div>
   <?php }?>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</section>
<section class="OFFERS">
      <div class="OfferContainer">    
        <span class="Offers">Offers</span>
          <?php
            foreach ($FairyGiftShop['Offer'] as $Offers) {
                  $id=$Offers['Product_ID'];
                  $OfferQuery="SELECT * FROM products WHERE Product_ID='$id'";
                  $OfferProduct=mysqli_query($connect,$OfferQuery);
                  while($OfferRow=mysqli_fetch_assoc( $OfferProduct)){
            ?>
          <div class="offerItems">
              <div class="image">
              <span class="discount"><?php echo $Offers['Discount']; ?>%</span>
                <img src="<?php echo "uploaded_img/".$OfferRow['Product_Image']; ?>" alt="<?php echo $OfferRow['Product_Name']; ?>"/>
                <div class="icons">
                  <a href="#" class="fa-solid fa fa-eye fa-3x seebtn" id="<?php echo $OfferRow['Product_ID'];?>"></a>
                  <a href="view_page.php?pid=<?php echo $OfferRow['Product_ID']; ?>" class="fa-solid fa-cart-shopping fa-3x"></a>
                </div>
            ` </div>
            <div class="content">
              <h6><?php echo $OfferRow['Product_Name']; ?></h6>
              <p class="price">
                <span class="oldprice">RS.<?php echo $OfferRow['Product_Price']; ?>/=</span><span class="newprice">RS.<?php echo $OfferRow['Product_Price']-((($Offers['Discount'])/100)*$OfferRow['Product_Price']); ?>/=</span>
              </p>
            </div>
        </div>
        <?php }} ?>
      </div>
      </section>
 <!-------------------------------------------------categories----------------------->

<section class="Categories">
      <span class="category">Gifts Categories</span>
    <div class="CategoriesContainer">
    
        <?php  foreach ($FairyGiftShop['Categories'] as $Categories) { ?>
          <div class="Category">
            <div>
            <img src="<?php echo $Categories['Sample']; ?>" alt="<?php echo $Categories['category']; ?>">
            </div>
            <div>
              <h2><?php echo $Categories['category']; ?></h2>
            </div>
          </div>
        <?php } ?>
    </div>
      </section>
<!----------------------------------------end---------------------------------->

<!---------------------------------------------latest----------------------------------->
    <section class="LATEST">
      <span class="latest">Latest Gifts</span>
        <div class="LatestContainer">
         <?php foreach ($FairyGiftShop['Latest'] as $Latest){
                  $id=$Latest;
                  $LatestQuery="SELECT * FROM products WHERE Product_ID='$id'";
                  $LatestProduct=mysqli_query($connect,$LatestQuery);
                  while($LatestRow=mysqli_fetch_assoc( $LatestProduct)){ ?>
              <div class="Latest" id="<?php echo $LatestRow['Product_ID']; ?>">
                <div>
                  <img src="<?php echo "uploaded_img/".$LatestRow['Product_Image']; ?>" alt="<?php echo $LatestRow['Product_Name']; ?>">
                </div>
                <div>
                  <h3><?php echo $LatestRow['Product_Name']; ?></h3>
                  <p>RS:<?php echo $LatestRow['Product_Price']; ?>/=</p>
                </div>
              </div>
         <?php }} ?> 
        </div>
      </section>

     <section class="Reveiws">
      <div class="ReveiwContainer">
          <div><button class="scrollbtn" onclick="scrollleft()"><i class="fa-solid fa-chevron-left"></i><button></div>
          <div class="cover">
             <div class="reviews" id="reveiws"> 
                <?php 
                $sql="SELECT * from reviews INNER JOIN users ON reviews.User_ID = users.id ";

                  
                  $res=$connect->query($sql);

                while($row=mysqli_fetch_assoc($res)){?>
                <div class="review">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['review'];?></p>
                </div>
                <?php } ?>
             </div>
          </div>
          <div><button class="scrollbtn" onclick="scrollright()"><i class="fa-solid fa-chevron-right"></i><button></div>
        </div>
      </section>
    <!--------show box------->
    </main>
                <div class="modal fade" tabindex="-1" role="dialog" id='Show-details'>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button style="font-size:20px"  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span   aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div class="Show-details">
         <img src="https://assets.thehansindia.com/h-upload/2020/02/05/260163-valentense-day.jpg" alt="">
         <h3>Headding</h3>
         <h4>rs.459</h4>
         <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint eligendi sit, voluptatum fuga aspernatur sed aliquam optio perspiciatis explicabo suscipit facere aliquid voluptatem laudantium </p>
         <div class="icons">
                  <a href="cart.php" id="card" class="fa-solid fa-cart-shopping fa-3x"></a>
                  
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>  
    <?php include("footer.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/Header.js"></script>
  <script src="JS/Home.js"></script>
</body>
</html>
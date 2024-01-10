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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" > <!-- need for category list responsive-->
    <title> about </title>

  <!--FOR FONT LINKS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
    integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


  <!--CSS GOOGLE FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">


  <!--BOOTSTRAP-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

   <!--instance, to load jQuery libraires For MY IMAGE SLIDER-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 


  <!--For icons in service side -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://fontawesome.com/v4/icons/">
	<link rel="stylesheet" href="https://fontawesome.com/v4/icon/credit-card-alt">
  
 
 <link rel="stylesheet" href="CSS/about.css">
 <link rel="stylesheet" href="CSS/HeaderFooterStyle.css">
 
 <?php include("Header.php"); ?>  
</head>

<body>



    
  
  <!--*************************************Image Sliding Section*****************************************************-->
  <section class="first">
    <div class="main">
      <div id="sliding" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">

        </ul>

        <!--IMAGE 01 -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/international-womens-day-flowers-62.jpg" class="image1">
            <div class="carousel-caption">
              <div class="line">
                <h3>Fairy Gifting</h3>
                <p>Enjoy your life with your loving one!</p>
                
              </div>
            </div>
          </div>
          
          

          <!--IMAGE 02 -->
          <div class="carousel-item">
            <img src="images/purple-flowers.jpg" class="image2">
            <div class="carousel-caption">
              <div class="line">
                <h3>Fairy Gifting</h3>
                <p>Gifts can make you happy!</p>
                
              </div>
            </div>
          </div>

          

        </div>



<!--FOR ARROW MARKS-->
        <a class="carousel-control-prev arrow" href="#sliding" data-slide="prev">
          <span><i class="fas fa-arrow-left"></i> </span>
        </a>
        <a class="carousel-control-next arrow" href="#sliding" data-slide="next">
          <span><i class="fas fa-arrow-right "></i></span>
        </a>
      </div>
    </div>

    <br>
    <br>
    <br>

    </div>
    </div>

  </section>
  <br>
  

  <!--************************************* Right About Us Section*****************************************************-->
  <section class="right-about-html">
    <div class="right-about-body">

      <div class="right-section">
        <div class="right-container">
          <div class="right-content-section">
            <div class="right-title">
              <h1>Who We Are?</h1>
            </div>
            <div class="right-content">
              <h3>Fairy Gifiting is a leading Sri Lankan eCommerce platform bringing premium online shopping experience to thousands of Sri Lankans.</h3>
                
              <p>
                We are running a online gifting platform which can make you feel ease when you gifting your loving one!
              </p>
              
            </div>
            
          </div>
          <div class="right-image-section">
            <img src="images/purple-2.jpg" class="right-image">
            <div class="middle">
					<div class="middle-text"> Fairy Gift Shop </div>

				</div>
          </div>
          </div>
        </div>
      </div>
    

    </div>
  </section>
  

  <!--************************************* left About Us Section*****************************************************-->
  <section class="left-about-html">
    <div class="left-about-body">
      <div class="left-section">
        <div class="left-container">
          <div class="left-content-section">
            <div class="left-title">
              <h1>Why We Uniqe?</h1>
            </div>
            <div class="left-content">
              <h3>The best gifting Platform!</h3>
              <p>Our service and products are known for its quality, freshness and innovation.
                Our consistent, highest customer satisfaction rating makes us incredibly proud because reliability and quality.omers is our core values.
                Our service and products are known for its quality, freshness and innovation.
              </p>
              
            </div>
            
          </div>
          <div class="left-image-section">
            <img src="images/h3-GiftBox.jpg" class="left-image">
            <div class="middle">
					<div class="middle-text"> Fairy Gift Shop </div>

				</div>
          </div>
        </div>
      </div>

      </div>
      </section>




      <!--************************************* Right About Us Section*****************************************************-->
  <section class="right-about-html">
    <div class="right-about-body">

      <div class="right-section">
        <div class="right-container">
          <div class="right-content-section">
            <div class="right-title">
              <h1>Where We Offer?</h1>
            </div>
            <div class="right-content">
            <h3>We located at Colombo Grandpass area!</h3>
              <p> It is part of an area known as Colombo 14,
                <br>
                Our delivering service is limited in Colombo District.
                
                <br>
               If you are in Colombo, No worries You can get our product in time!

              
              </p>
              
              
            </div>
            
          </div>
          <div class="right-image-section">
            <img src="images/where.jpg" class="right-image">
            <div class="middle">
					<div class="middle-text"> Fairy Gift Shop </div>

				</div>
          </div>
        </div>
      </div>
    

    </div>
  </section>
  

  <!--************************************* left About Us Section*****************************************************-->
  <section class="left-about-html">
    <div class="left-about-body">
      <div class="left-section">
        <div class="left-container">
          <div class="left-content-section">
            <div class="left-title">
              <h1>About Our Delivery!</h1>
            </div>
            <div class="left-content">
              <h3>We are punctual...</h3>
              
                <P>
                  all taxes & delivery costs are included in the retail price you see; 
                  we hate hidden charges that appear at the end as much as the next person, so be rest assured there will be none of that.
                   If a product is Rs. 5000, that sum accounts for the product, delivery, and taxes!
                </P>

              
              </p>
              
            </div>
            
          </div>
          <div class="left-image-section">
            <img src="images/delivery.jpg" class="left-image">
            <div class="middle">
					<div class="middle-text"> Fairy Gift Shop </div>

				</div>
          </div>
        </div>
      </div>

      </div>
      </section>

      <br>
      <br>
      <br>
<!--*************************************OUR SERVICES*****************************************************-->
<section class="services-html">
  <div class="services-body">
    <!-- chat -->
    <div class="services">
      <h1 class="service-heading">What we offer!</h1>
      <div class="cen">
        <div class="service">
          <b><i class="fa fa-comments fa-2x service-icon "></i></b>
          <h2 class="service-h2">Chat</h2>
          <p class="service-para">You can chat with Us freely.</p>
        </div>
 <!-- payment -->
        <div class="service">
          <i class="fa fa-credit-card fa-2x  service-icon"></i>
          <h2 class="service-h2">Payment</h2>
          <p class="service-para">Secure online payment gateway..</p>
        </div>

<!-- suprice -->
        <div class="service">
          <i class="fa fa-gift fa-2x service-icon"></i>
          <h2 class="service-h2">Make Suprice</h2>
          <p class="service-para">Select bespoke gifts for your loved ones.</p>
        </div>
<!-- orpanage -->
        <div class="service">
          <i class="fa fa-heart fa-2x service-icon"></i>
          <h2 class="service-h2">Donate for people</h2>
          <p class="service-para">If you like to donate orpanages, we can do for you.</p>
        </div>

        <!-- Time -->
        <div class="service">
          <i class="fa fa-clock-o fa-2x service-icon"></i>
          <h2 class="service-h2">Time is precious!</h2>
          <p class="service-para">We like being punctual.</p>
        </div>

<!-- order -->
        <div class="service">
          <i class="fa fa-location-arrow fa-2x service-icon"></i>
          <h2 class="service-h2">Order</h2>
          <p class="service-para">For your order we take care of everything for you!.</p>
        </div>
      </div>
    </div>
  </div>
</section>






  <!--*************************************Review Section*****************************************************-->
<div>
  <br>
  <br>
  <br>
</div>


<!-- jquery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <!-- popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
   <!-- Bootstrap js
   <script src="library/BootstrapJS/bootstrap.min.js"></script> -->
   <!-- Extrnal jS -->
  
  <?php include("footer.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/Header.js"></script>
  <script src="JS/Home.js"></script>

</body>

</html>
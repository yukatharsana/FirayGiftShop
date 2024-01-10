<?php
  include("config.php");
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
      <div id="searchresult" class="searchresult">
      </div>
    </main>
    <?php include("footer.php"); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="JS/Header.js"></script>
  <script src="JS/Home.js"></script>
</body>
</html>
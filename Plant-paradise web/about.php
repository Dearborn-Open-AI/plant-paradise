<?php 
    session_start();
    require_once('./inc/config.php');    

    $sql = "SELECT p.*,pdi.img from products p
                    INNER JOIN product_images pdi ON pdi.product_id = p.id
                    WHERE pdi.is_featured = 1";
    $handle = $db->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
    
?>













<!DOCTYPE html>
<html lang="en">
<head>
  <title>About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="about.css">
  <script src="naviBarSlideDown.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <style>
  
  </style>

</head>
<body onload="window.addEventListener('resize', setPanels); setPanels();">

<!-- navi bar top main -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="navbarmain">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="margin-right:-130px;"><img src="logo images/logo-green.png"  height="50%" width="50%"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">My cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact us.php">Contact us</a>
        </li> 
      </ul>
      <div class="nav-link">
      <a class="link-success" href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentcolor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg></a>
     </div>
     <div class="nav-link">
      <a style="text-decoration:none;" class="link-success" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentcolor" class="bi bi-cart2" viewBox="0 0 16 16">
        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
      </svg>
      <?php 
                echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';
            ?></a>
      </div>
    </div>
  </div>
</nav>

<!-- navi bar side down on scroll --> 
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="margin-right:-130px;"><img src="logo images/logo-white.png"  height="50%" width="50%"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbarscroll">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbarscroll">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">My cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact us.php">Contact us</a>
        </li> 
      </ul>
      <div class="nav-link">
      <a class="link-success" href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentcolor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg></a>
     </div>
     <div class="nav-link">
      <a style="text-decoration:none;" class="link-success" href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentcolor" class="bi bi-cart2" viewBox="0 0 16 16">
        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
      </svg>
      <?php 
                echo (isset($_SESSION['cart_items']) && count($_SESSION['cart_items'])) > 0 ? count($_SESSION['cart_items']):'';
            ?></a>
      </div>
    </div>
  </div>
</nav>



<div class="jumbotron text-center">
  <h1 class="display-3" style="margin-top:10%;">ABOUT US</h1> 
</div>

<div class="text-center" style="margin-top: 1%;margin-bottom: 2%;">
  <img src="logo images/logo-green.png" class="rounded" alt="logo" width="15%">
</div>

<div class="container-fluid text-center" id="headfontsize">
   <div class="row">
    <div class="col-sm-12">We bring nature to your place with suitable,<br>eco-friendly products</div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <img src="images/spimg.png" width="30%">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12" style="font-size:20px;;width:70%;margin:auto;"><p>Nothing adds more beauty and comfort to our homes and offices than the lush flowers and foliage of indoor plants. Bedrooms, bathrooms, kitchens, cubicles… There really isn’t a space a houseplant can’t enliven. Just add light and water, and you’ve got a growing indoor oasis. Bringing plants into your home is aesthetically pleasing and – amazingly – plants can offer strong health benefits as well!</p> </div>
  </div>
</div>

<div class="container-fluid text-center" id="body">    
  
  <div class="row">
    <div class="col-sm-4"><img src="images/blog-1-720x484.jpg" width="75%"></div>
    <div class="col-sm-4"><img src="images/blog-2-720x484.jpg"width="75%"></div>
    <div class="col-sm-4"><img src="images/blog-3-720x484.jpg"width="75%"></div>
  </div><br><br>
  <div class="row">
    <h3>Here's How It Works</h3>
  </div>
    <br><br>
    <div class="row">
    <div class="col-sm-12" style="width: 50%;margin:auto;">
    <div class="row">
    <div class="col-sm" style="padding: 0%;"><img src="images/icons8_plant_200px.png" width="70%"><P>Pick your plant</P></div>
    <div class="col-sm"  style="padding:0%;margin:auto;"><img id="arrow"src="images/icons8_arrow_200px_1.png"width="30%"></div>
    <div class="col-sm" style="padding: 0%;"><img src="images/icons8_shipped_240px.png"width="70%"><P>Have it shipped</P></div>
    <div class="col-sm" style="padding: 0%;margin:auto;"><img  id="arrow2" src="images/icons8_arrow_200px_1.png"width="30%"></div>
    <div class="col-sm" style="padding: 0%;"><img src="images/icons8_garden_240px.png"width="70%"><p>Watch it grow</p> </div>
    </div>
    </div>
    </div>
  </div>
</div>
<br><br>
<div class="container-fluid text-center">
  <div class="row">
    <div class="col-sm-12" style="width:30%;margin:auto;">
      <div class="row">
        <div class="col-sm" style="padding: 0%;"><img src="images/brand-1.png" width="50%"></div>
        <div class="col-sm"  style="padding:0%;"><img src="images/brand-2.png"width="50%"></div>
        <div class="col-sm" style="padding: 0%;"><img src="images/brand-3.png"width="50%"></div>
        <div class="col-sm" style="padding: 0%;"><img src="images/brand-4.png"width="50%"></div>
        </div>
    </div>
  </div>
</div>
<br><br>

<div class="container-fluid bg-3 text-center text-white bg-dark" id="footerbody">    
  
  <div class="row">
    <div class="col-sm-3">
      <h5><b>ABOUT</b></h5><hr>
      
      <p>Nothing adds more beauty and comfort to our homes and offices than the lush flowers and foliage of indoor plants. Bedrooms, bathrooms, kitchens, cubicles… There really isn’t a space a houseplant can’t enliven. Just add light and water, and you’ve got a growing indoor oasis. Bringing plants into your home is aesthetically pleasing and – amazingly – plants can offer strong health benefits as well! </p>
    </div>

    <div class="col-sm-3"> 
      <h5><b>USEFUL LINKS</b></h5><hr>
      <p><a class="link-success" href="#" >Plant paradise</a></p>
      <p><a class="link-success" href="#" >Shop</a></p>
      <p><a class="link-success" href="#" >My cart</a></p>
      <p><a class="link-success" href="#" >Contact us</a></p>
    </div>
    
    <div class="col-sm-3">
      <h5><b>OUR SHOPS</b></h5><hr>
      <p>No:567/C,Ritz Tower,Colombo 08,Sri Lanka.</p>
      <p>No:567/C,Ritz Tower,Colombo 08,Sri Lanka.</p>
      <p>No:567/C,Ritz Tower,Colombo 08,Sri Lanka.</p>
    </div>

    <div class="col-sm-3">
      <h5><b>CONTACT US</b></h5><hr>
      <p>No:567/C,Ritz Tower,Colombo 08,Sri Lanka.</p>
      <p>Phone: 011-1234123</p>
      <p>Email: support@Plantparadise.com</p>
      <p>Opening Time</p>
      <p>8:00Am – 10:00Pm, Sunday Close</p>
     <div><img src="logo images/logo-green.png"  height="100%" width="100%"></div> 
     <br>
     <div class="row" id="footersocialmedia">
      <div class="col-sm"><a class="link-success" href="#"><i class="bi bi-facebook" style="font-size: 25px;"></i></a></div>
      <div class="col-sm"><a class="link-success" href="#"><i class="bi bi-youtube" style="font-size: 25px;"></i></a></div>
      <div class="col-sm"><a class="link-success" href="#"><i class="bi bi-instagram" style="font-size: 25px;"></i></a></div>
      <div class="col-sm"><a class="link-success" href="#"><i class="bi bi-whatsapp" style="font-size: 25px;"></i></a></div>
    </div>
    
    
    
    
    </div>
  </div>
</div>

<footer class="container-fluid text-center text-white bg-dark" id="footer">
  <p>Plantparadise.com<br>© 2022 All rights reserved | Designed by GROUP 5</p>
</footer>
</body>
</html>
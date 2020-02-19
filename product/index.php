<?php //PHP EV
  if(empty($_GET['s'] && $_GET['item']))header('location:../');//防止無 $_GET 進入

  include_once('../php/sql.php'); //PDO & SESSION START

  $rows = $db->query('SELECT * FROM '.$_GET['s'].' WHERE id = '.$_GET['item'].';');
  function sizeSelect($item){
    if($item != ''){
      echo '<a class="mr-3 sizeSelectA" ><div class="size text-center">'.$item.'</div></a>';
    }
  }
  function imgSelect($item, $table){
    if($item != ''){
      echo '<div class="carousel-item h-100 ">
              <img src="../img/'.$table.'/'.$item.'" class="d-block" >
            </div>';
    }
  }
  foreach($rows->fetchAll() as $row){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158760835-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-158760835-1');
  </script>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KTDX733');</script>
    <!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/fontawesome.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="icon" href="../icon/nd.ico" type="image/x-icon" >
  <title ><?=$row['title']?></title>
  <style>
    body{
      font-family: 'Roboto', sans-serif;
    }
    
  </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTDX733"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <header class="vh-100 position-relative">
    <!-- <div class="arrow"><a href=""><img src="icon/chevron-compact-down.svg" alt=""></a></div> -->
  <!-- <div class="arrow"><a href=""><img src="icon/chevron-compact-down.svg" alt=""></a></div> -->
  <!-- nav -->
  <nav class="navbar navTop sticky-top navbar-expand-lg navbar-light bg-light py-3 ">
    <a class="navbar-brand " href="../"><span style="font-size: 1.5rem;"><h2>NIKEDIN</h2></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarTogglerDemo02">

      <!-- NAV ITEM -->
      <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link menu_men position-relative" href="../men-shop-all/" alt="Men"><b>MEN</b></a>
          <!-- menu Area -->
          <div class="menuMenArea menuArea d-none" alt="menu_men">
              <div class=" container-fluid">
                <div class="row bg-white mx-2 w-100 border border-top-0" >
                  <div class=" menuItem  w-100 d-flex px-2 py-3">
                    <ul>
                      <li>HIGHLIGHTS</li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">CK ONE</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">White Day Gifts</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Couple Sets</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Out of Season</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">New Arrivals</a></li>
                    </ul>
                    <ul>
                      <li>APPAREL</li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Coats</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweaters</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">T-shirts + Tanks</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Polo Shirts</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shirts</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Denim Jeans</a></li>
                    </ul>
                    <ul>
                      <li>ACCESSORIES</li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Bags + Backpacks</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Wallets + Small Accessories</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Belts</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Watches + Jewelry</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shoes</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Socks</a></li>
                      <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sunglasses</a></li>
                    </ul>
                    <div class=" ml-auto menuImg" >
                      <a href="">
                        <img src="https://www.calvinklein.com/sgstatic/on/demandware.static/-/Sites-calvinklein-other-navigation/default/dw80acd4ab/CK1-reskin-dropdown-menu-banner.jpg">
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu_women position-relative" href="../women-shop-all/" alt="Women"><b>WOMEN</b></a>
          <!-- menu Area -->
          <div class="menuWomenArea menuArea d-none" alt="menu_women">
            <div class=" container-fluid">
              <div class="row bg-white mx-2 w-100 border border-top-0" >
                <div class=" menuItem  w-100 d-flex px-2 py-3">
                  <ul>
                    <li>HIGHLIGHTS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">CK ONE</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">White Day Gifts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Couple Sets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Out of Season</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">New Arrivals</a></li>
                  </ul>
                  <ul>
                    <li>APPAREL</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweaters</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">T-shirts + Tanks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Polo Shirts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shirts</a></li>
                  </ul>
                  <ul>
                    <li>ACCESSORIES</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Bags + Backpacks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Wallets + Small Accessories</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Belts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Watches + Jewelry</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shoes</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Socks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sunglasses</a></li>
                  </ul>
                <div class=" ml-auto menuImg" >
                  <img src="https://www.calvinklein.com/sgstatic/on/demandware.static/-/Sites-calvinklein-other-navigation/default/dwc03dcfa0/CK1-reskin-dropdown-menu-banner-2.jpg">
                </div>
              </div>
            </div>
          </div>
        </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu_kids position-relative" href="#" alt="Kids"><b>KIDS</b></a>
          <!-- menu Area -->
          <div class="menuKidsArea menuArea d-none" alt="menu_kids">
            <div class=" container-fluid">
              <div class="row bg-white mx-2 w-100 border border-top-0" >
                <div class=" menuItem  w-100 d-flex px-2 py-3">
                  <ul>
                    <li>HIGHLIGHTS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">CK ONE</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">White Day Gifts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Couple Sets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Out of Season</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">New Arrivals</a></li>
                  </ul>
                  <ul>
                    <li>BOYS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href=""> T-Shirts + Tops</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets + Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Pants + Shorts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Underwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Swimwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sleepwear</a></li>
                  </ul>
                  <ul>
                    <li>GIRLS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href=""> T-Shirts + Tops</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets + Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Pants + Shorts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Underwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Swimwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sleepwear</a></li>
                  </ul>
                  <div class=" ml-auto menuImg" >
                    <img src="https://www.calvinklein.com/sgstatic/on/demandware.static/-/Sites-calvinklein-other-navigation/default/dwf499e027/DEC%2027%20-%20dropdown%20menu%20banner%20KIDS.jpg">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu_performance position-relative" href="#" alt="Performance"><b>PERFORMANCE</b></a>

          <div class="menuPerformanceArea menuArea d-none" alt="menu_performance">
            <div class=" container-fluid">
              <div class="row bg-white mx-2 w-100 border border-top-0" >
                <div class=" menuItem  w-100 d-flex px-2 py-3">
                  <ul>
                    <li>HIGHLIGHTS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">CK ONE</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">White Day Gifts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Couple Sets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Out of Season</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">New Arrivals</a></li>
                  </ul>
                  <ul>
                    <li>MEN</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweaters</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">T-shirts + Tanks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Polo Shirts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shirts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Denim Jeans</a></li>
                  </ul>
                  <ul>
                    <li>WOMEN</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Bags + Backpacks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Wallets + Small Accessories</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Belts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Watches + Jewelry</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shoes</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Socks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sunglasses</a></li>
                  </ul>
                  <div class=" ml-auto menuImg" >
                    <a href="">
                      <img src="https://www.calvinklein.com/sgstatic/on/demandware.static/-/Sites-calvinklein-other-navigation/default/dwcf54a478/DEC%2027%20-%20dropdown%20menu%20banner%20CKP.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item  action active">
          <a class="nav-link menu_sale text-danger position-relative" href="#" alt="Sale"><b>SALE</b></a>
          <div class="menuSaleArea menuArea d-none" alt="menu_sale">
            <div class=" container-fluid">
              <div class="row bg-white mx-2 w-100 border border-top-0" >
                <div class=" menuItem  w-100 d-flex px-2 py-3">
                  <ul>
                    <li>HIGHLIGHTS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">CK ONE</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">White Day Gifts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Couple Sets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Out of Season</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">New Arrivals</a></li>
                  </ul>
                  <ul>
                    <li>MEN</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweaters</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">T-shirts + Tanks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Polo Shirts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shirts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Denim Jeans</a></li>
                  </ul>
                  <ul>
                    <li>WOMEN</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Bags + Backpacks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Wallets + Small Accessories</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Belts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Watches + Jewelry</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shoes</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Socks</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sunglasses</a></li>
                  </ul>
                  <ul>
                    <li>BOYS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href=""> T-Shirts + Tops</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets + Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Pants + Shorts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Underwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Swimwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sleepwear</a></li>
                  </ul>
                  <ul>
                    <li>GIRLS</li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Shop All</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href=""> T-Shirts + Tops</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sweatshirts + Hoodies</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Jackets + Coats</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Pants + Shorts</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Underwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Swimwear</a></li>
                    <li><a class="text-secondary text-decoration-none" style="font-size: 12px;" href="">Sleepwear</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>

      <ul class="navbar-nav mt-2 mt-lg-0">
        <li class="av-item">
          <a  class="nav-link" id="searchBtn" >
            <div class="o">
              <img src="../icon/search.svg" alt="">Search
            </div>
            <div class="x">
              <img src="../icon/x-circle-fill.svg" alt="">Close
            </div>
          </a>          
        </li>
        <li class="av-item"><a  class="nav-link" href=""><img src="../icon/house.svg" alt="">Store</a></li>
        <li class="nav-item signIn dropdown">
          <a  class="nav-link signIn " data-toggle="modal" data-target="#logInModal"><img src="../icon/person.svg" alt="signIn"><span class="userName"></span><span>Sign In</span></a>
        </li>
        <li class="nav-item position-relative"><a  class="nav-link cartA" ><img class="bagSvg" src="../icon/bucket.svg" alt="">Bag</a></li>
      </ul>
      <!-- AJAX INSERT  -->
      <div class="cart p-2">
      </div>
    </div>
    <!-- SEARCH -->
    <div class="searchArea ">
      <form id="searchForm" action="../search" method="get">
        <fieldset>
          <input type="text form-control " id="q" name="q" placeholder=" Search NIKEDIN"  autocomplete="off">
          <label for="q" class="position-relative" >
            <svg class="bi bi-search" width="2rem" height="2rem" viewBox="0 0 20 20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.442 12.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8.5 14a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM15 8.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
            </svg>
          </label>
        </fieldset>
      </form>
    </div>
  </nav>

  <!-- logIn Modal -->
  <div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="logInModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center w-100" id="logInModalTitle">LOG IN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <div class="form-group">
            <form  id="loginForm" >
              <label for="memberID">Member ID or Email</label>
              <input type="text" name="acc" class="form-control" value="" id="memberID" aria-describedby="emailHelp">
              <small id="accHelp" class="form-text text-muted" style="color:red!important"></small>
          </div>
          <div class="form-group">
            <label for="memberPassword">Password</label>
            <input type="password" name="psw" class="form-control " id="memberPassword" required>
            <div class="invalid-feedback">
              Please Enter!
            </div>
          </div>
          <p class="ipF text-danger"></p>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn loginBtn">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- content -->
  <main class="container-fluid px-4">
  <form class="cartForm">
    <!-- breadcrumbs -->
    <div id="breadcrumbs" style="font-size: .5rem;" class="text-secondary my-3 text-decoration-none">
      <a href="../" >
        HOME
      </a>
      / 
      <a href="">
        <span ><?=$row['tag']?></span>
      </a>
       / <span id="table"><?=$_GET['s']?></span> / <span id="id" alt="<?=$_GET['item']?>"><?=$row['title']?></span>
      <input type="text" name="table" value="<?=$_GET['s']?>" hidden>
    </div>
    <div class="product_details row">
      <!-- Product Image -->
      <div class="col-12 col-md-6 image_content">
        <!-- carouse -->
        <div id="carouselExampleCaptions" class="carousel slide vh-100 overflow-hidden " data-ride="carousel">
          <ol class="carousel-indicators justify-content-start ml-5">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner h-100">
            <div class="carousel-item active h-100 ">
              <img src="../img/<?=$_GET['s']?>/<?=$row['img1']?>" class="d-block" alt="...">
            </div>
<?php
              imgSelect($row['img2'], $_GET['s']);
              imgSelect($row['img3'], $_GET['s']);
?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="next_pre" aria-hidden="true"><img src="../icon/chevron-compact-left.svg"  alt=""></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="next_pre" aria-hidden="true"><img src="../icon/chevron-compact-right.svg"  alt=""></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!-- Product txt -->
      <div class="col-12 col-md-6 txt_content vh-100 overflow-auto px-5">
        <h1 class="productName"><?=$row['title']?></h1>
        <div class="product_price">
          <span></span>
          <span class="price_sales">NT$ <?=$row['sales_price']?></span>
          <input type="number" name="cartPrice" hidden value="<?=$row['sales_price']?>">
          <span></span>
        </div>
        <div class="product_val">
            <!-- color -->
          <div class="product_color my-4">
            <ul class="" style="padding-inline-start: 0px;">
              <li ><span>COLOR:</span> <span class="text-secondary">BLACK</span></li>
              <input type="text" name="cartColor" hidden value="BLACK">
              <li><div class="color_black mt-2"><div class="BLACK"></div></div></li>
            </ul>
          </div>
          <!-- size -->
          <div class="product_size my-4">
            <ul class="" style="padding-inline-start: 0px;">
              <li class="mt-2"><span>SIZE:</span><span class="text-secondary sizeSelect"></span></li>
              <input name="size" type="text" class="cartSize" hidden>
              <li class="mt-2 d-flex">
<?php
              sizeSelect($row['XS']);
              sizeSelect($row['S']);
              sizeSelect($row['M']);
              sizeSelect($row['L']);
              sizeSelect($row['XL']);
              sizeSelect($row['XXL']);
?>
              </li>
            </ul>
          </div>
          <!-- stock -->
          <div class="product_stock ">
            <span id="stockNum" style="color:#888">　</span>
          </div>
          <div class="d-flex mt-2 mb-4">
            <div class="select_pic mr-3">
              <select name="carNum" class="" id="numSelect">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="addBag flex-grow-1">
              <!-- <button class="px-2 px-md-4 py-2 px-md-5">SHOP NOW</button class="px-2 px-md-4 py-2 px-md-5"> -->
              <input class="btn w-100 addBagBtn" type="button" value="ADD TO BAG">
              <input type="text" name="id" value="<?=$row['id']?>" hidden>
            </div>
  </form>
          </div>
          <div class="product_txt">
            <ul class="" style="padding-inline-start: 0px;">
              <li class="py-4 border-top border-bottom ">
                <div class="details d-flex align-items-center">
                  <span><b>DETAILS</b></span>
                  <p class="ml-auto contentDisplay1 mb-0"><img class="" src="../icon/plus.svg" alt=""></p>
                  <p class="ml-auto contentDisplayNone1 mb-0"><img src="../icon/dash.svg" alt=""></p>
                </div>
                <div class="contentDetails mt-2" style="color:#888"><?=$row['details']?></div>
              </li >
              <li class="py-4 border-bottom ">
                <div class="details d-flex">
                  <span><b>Care & Composition</b></span>
                  <p class="ml-auto contentDisplay mb-0"><img class="" src="../icon/plus.svg" alt=""></p>
                  <p class="ml-auto contentDisplayNone mb-0"><img src="../icon/dash.svg" alt=""></p>
                </div>
                <div class="content mt-2"><?=$row['care']?></div>
              </li>
              <li class="py-4 border-bottom ">
                <div class="details d-flex">
                  <span><b>Shipping and Returns</b></span>
                  <p class="ml-auto contentDisplay mb-0"><img class="" src="../icon/plus.svg" alt=""></p>
                  <p class="ml-auto contentDisplayNone mb-0"><img src="../icon/dash.svg" alt=""></p>
                </div>
                <div class="content mt-2">
		              Style is eternal when it is a classic Western lean shirt from Calvin Klein Jeans. A genuinely timeless piece, it features a contemporary pointed collar, buttoned cuffs, signature logo-engraved snap buttons down the front and a curved hem. The contrastive panels add depth to your outfit.
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- contactUs -->
  <form id="couponForm">
    <section class="contactUs px-1 px-md-5 my-5 d-flex align-items-center">
      <div class="container px-md-5 inputSpace">
        <div class="row text-white px-md-5 inputContent">
          <div class="col-12 col-md-6"><h1>TAKE 10% OFF, ON US</h1></div>
          <div class="col-12 col-md-6"><p>Sign up now to enjoy 10% off your purchase and receive the latest news on new arrivals, exclusive promotions, and more.</p></div>
          <div class="col-12 ">
          <div class="input-group mb-3">
            <input type="email" name="eventMail" class="form-control" placeholder="Enter your email" >
            <div class="input-group-append">
              <button class="btn contactUsBtn" type="submit" >SUBMIT</button>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  <!-- FOOTER -->
  <footer class="container ">
      <h2 class="mb-4">NIKDEDIN</h2>
    <div class="row">
      <div class="col">
        <p class="mb-1"><b>SERVICE</b></p>
          <ul style="padding-inline-start: 0px;">
            <li>Track Orders / Returns</li>
            <li>Shipping Information</li>
            <li>Return Policy</li>
            <li>Payment Methods</li>
          </ul>
      </div>
      <div class="col">
        <p class="mb-1"><b>SERVICE</b></p>
          <ul style="padding-inline-start: 0px;">
            <li>Track Orders / Returns</li>
            <li>Shipping Information</li>
            <li>Return Policy</li>
            <li>Payment Methods</li>
          </ul>
      </div>
      <div class="col">
        <p class="mb-1"><b>SERVICE</b></p>
          <ul style="padding-inline-start: 0px;">
            <li>Track Orders / Returns</li>
            <li>Shipping Information</li>
            <li>Return Policy</li>
            <li>Payment Methods</li>
          </ul>
      </div>
      <div class="col">
        <p class="mb-1"><b>SERVICE</b></p>
          <ul style="padding-inline-start: 0px;">
            <li>Track Orders / Returns</li>
            <li>Shipping Information</li>
            <li>Return Policy</li>
            <li>Payment Methods</li>
          </ul>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col">
        <a href=""><i class="fab fa-facebook-square"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-youtube"></i></a>
        <a href=""><i class="fab fa-pinterest"></i></a>
      </div>
    </div>
    <hr>
    <p class="text-center text-secondary">Copyright © 2020 NIKEDIN All rights reserved.</p>
  </footer>
<?php
  }
?>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/main.js"></script>
  <script>

    // details display EVENT 
    $('.contentDisplayNone').add('.contentDisplay1').add('.content').toggle();
    $('.details').click(
      function(){
        $(this).children('.contentDisplay').toggle();
        $(this).children('.contentDisplay1').toggle();
        $(this).children('.contentDisplayNone').toggle();
        $(this).children('.contentDisplayNone1').toggle();
        $(this).siblings('.content').toggle();
        $(this).siblings('.contentDetails').toggle();
      }
    )
    $('.content').add('.contentDetails').click(
      function(){
        $(this).hide();
        $(this).siblings('.details').children('.contentDisplay').toggle();
        $(this).siblings('.details').children('.contentDisplayNone').toggle();
        $(this).siblings('.details').children('.contentDisplayNone1').toggle();
        $(this).siblings('.details').children('.contentDisplay1').toggle();
        
      }
    )
    //------------------------end
    
    // SIZE SELECT EV
    $('#numSelect').change(function(){
      num = $(this).val();
    })
    $('.sizeSelectA').click(function(){
      let thisSize = $(this).text();
      $('.cartSize').val($(this).text());
      let size = {
        XS:'EXTRA SMALL',
        S:'SMALL',
        M:'MEDIUM',
        L:'LARGE',
        XL:'EXTRA LARGE',
        XXL:'EXTRA EXTRA LARGE'
      }
      $('.sizeSelect').text(`　${size[thisSize]}`);
      $.post(`api.php?do=selectSize&size=${thisSize}&table=${$('#table').text()}&id=${$('#id').attr('alt')}`, function(num){
        // console.log(num);
        if(num <= 5){
          $('#stockNum').text(`ONLY ${num} LEFT IN STOCK`);
          let optionS = '';
          for(let i=1;i<=num;i++){
            optionS += `<option value="${i}">${i}</option>`;
          }
          $('#numSelect').html(optionS);
        }else{
          $('#stockNum').text(`IN STOCK`);
          let optionS = '';
          for(let i=1;i<=5;i++){
            optionS += `<option value="${i}">${i}</option>`;
          }
          $('#numSelect').html(optionS);
        }
        // $('#stockNum').text();
        // 
      }).fail(function(){
        console.log('SELECT SIZE FAIL!')
      })
    })

    //sizeBtn EV
    $('.size').click(function(){
      $('.sizeSelectA').removeAttr('style');
      $(this).parent('a').css({
        color: '#fff',
        background:'#333'
      })
    })




    
    // coupon form EV
    $('#couponForm').submit(function(e){
      e.preventDefault();
      $('.inputContent').hide();
      $('.inputSpace').html(`
      <h2 class="text-center text-light">THANKS FOR SIGNING UP.</h2>
      <p class="text-center text-light">You have been added to our mailing list.</p>
      `)
    })


  </script>
</body>
</html>
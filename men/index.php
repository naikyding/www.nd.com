<?php //PHP EV
  $db = new PDO('mysql:host=localhost;dbname=s1080417;charset=utf8','root','');
  $rows = $db->query('SELECT * FROM '.$_GET['s'].' WHERE id = '.$_GET['item'].';');
  foreach($rows->fetchAll() as $row){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/fontawesome.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Product Page</title>
  <style>
    .carousel-item img{
      height:100%;
      width: 100%;
      object-fit: cover;
      object-position: 50% 0px;
    }
    .price_sales{
      font-size: 1.5rem;
      color:#f00;
    }
    .color_black{
      position: relative;
      width:30px;
      height:30px;
      background-color: #fff;
      border-radius: 50%;
      padding: 4px;
      border:1px solid #ddd;
    }
    .BLACK{
      background-color: #333;
      width: 20px;
      height:20px;
      border-radius: 50%;
    }
    .size{
      width:5rem;
      height:3rem;
      line-height: 3rem;
    }
    .product_size a{
      border: 1px solid #ddd;
      color:black;
      text-decoration: none;
    }
    .product_size a:hover{
      background-color: #333;
      color:#fff;
    }
    select{
      text-align:center;
      text-align-last:center;
      width:7rem;
      height: 3rem;
      border: 1px solid #ddd;
      background-color: #fff;
    }
    .select_pic{
      position: relative;
    }
    .select_pic::before{
      content: "QTY";
      position: absolute;
      font-size: .4rem;
      top:32%;
      left:5px;
    }
    option{
      text-align:center;
      text-align-last:center;
    }
    .addBagBtn{
      background-color: #C79C57;
      border:1px solid #C79C57;
      color:#fff;
      height:3rem;
      border-radius:2px;
    }
    .addBagBtn:hover{
      border:1px solid #C79C57;
      color:#000;
      background-color: #fff;
    }
    .details, .content{
      cursor: pointer;
    }
    .product_txt .content{
      color:#888;
    }
  </style>
</head>
<body>
    <!-- <div class="arrow"><a href=""><img src="icon/chevron-compact-down.svg" alt=""></a></div> -->
    <!-- nav -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light py-3 ">
      <a class="navbar-brand " href="#"><span style="font-size: 1.5rem;"><h2>NIKEDIN</h2></span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#"><b>MEN</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><b>WOMEN</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><b>KIDS</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><b>PERFORMANCE</b></a>
          </li>
          <li class="nav-item action active">
            <a class="nav-link text-danger " href="#" ><b>SALE</b></a>
          </li>
        </ul>
        <ul class="navbar-nav mt-2 mt-lg-0">
          <li class="av-item"><a  class="nav-link" href=""><img src="../icon/search.svg" alt="">Search</a></li>
          <li class="av-item"><a  class="nav-link" href=""><img src="../icon/house.svg" alt="">Store</a></li>
          <li class="av-item"><a  class="nav-link" href=""><img src="../icon/person.svg" alt="">Sign In</a></li>
          <li class="av-item"><a  class="nav-link" href=""><img src="../icon/bucket.svg" alt=""></i><span></span>Bag</a></li>
        </ul>
      </div>
    </nav>
  
  <!-- content -->
  <main class="container-fluid px-4">
    <!-- breadcrumbs -->
    <div id="breadcrumbs" style="font-size: .5rem;" class="text-secondary mt-3">
      HOME <span >/ <?=$row['tag']?></span> / <span><?=$_GET['s']?></span> / <span><?=$row['title']?></span> 
    </div>
    <div class="productItem">
      <!-- AJAX INSERT INTO -->
    </div>
  </main>
  <!-- contactUs -->
  <section class="contactUs px-1 px-md-5 my-5 d-flex align-items-center">
    <div class="container px-md-5">
      <div class="row text-white px-md-5">
        <div class="col-12 col-md-6"><h1>TAKE 10% OFF, ON US</h1></div>
        <div class="col-12 col-md-6"><p>Sign up now to enjoy 10% off your purchase and receive the latest news on new arrivals, exclusive promotions, and more.</p></div>
        <div class="col-12 ">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter your email" aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn contactUsBtn" type="" >SUBMIT</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
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
  <script>
    
    // $.post('product_api.php?do=select', $_GET['item'], function(data){
    //   console.log(data);
    //   // $('.productItem').html();
    // }).fail(function(){
    //   console.log('SELECT AJAX FAIL!');
    // });

    // details display EVENT 
    $('.contentDisplayNone').add('.content').toggle();
    $('.details').click(
      function(){
        $(this).children('.contentDisplay').toggle();
        $(this).children('.contentDisplayNone').toggle();
        $(this).siblings('.content').toggle();
      }
    )
    $('.content').click(
      function(){
        $(this).hide();
        $(this).siblings('.details').children('.contentDisplay').toggle();
        $(this).siblings('.details').children('.contentDisplayNone').toggle();
      }
    )
    //------------------------end


  </script>
</body>
</html>
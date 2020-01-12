<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css" />
    <?php
    include("./functions/functions.php");
    ?>
  </head>
  <body>
    <!--the main container-->
    <div class="main_wrapper">
      <div class="header">
        <div class="top">
          <a href="index.php"> <img
            id="logo"
            src="./images/logo1.png"
            alt=""
            width="250px"
            height="150px"
          /></a>
         
          <img id="banner" src="./images/banner.jpg" alt="" />
        </div>

        <div class="menubar">
          <ul class="menu">
            <li><a href="index.php">HOME</a></li>
            <li><a href="all_products.php">All products</a></li>
            <li><a href="./customer/my_account.php">My account</a></li>
            <li><a href="">Sign up</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
          <form
            class="form"
            method="get"
            action="results.php"
            enctype="multipart/form-data"
          >
            <input class="input" type="text" name="user_query" />
            <input class="submit" type="submit" name="Search" value="Search" />
          </form>
           
        </div>
       
      </div>
      <div class="content">
       
         <div class="sidebar">
          <div class="sidebar-title">Categories</div>
          <ul class="categories">
            <?php
  getCats();
    ?>
          </ul>
           <div class="sidebar-title">Styles</div>
          <ul class="categories">
           <?php
  getBrands();
    ?> 
          </ul>
        </div>
        <div class="content_area"> 

          <?php
cart();
    ?> 
<div style="width: 100%;height: 30px;  background: white">
<span style="text-align:center;line-height:30px;font-size:30px;">WELCOME </span>
<span style="float:right;line-height:30px; margin-right:50px;word-spacing: 3px;"><b>Your Cart </b> Total items:<?php
  total_items();
    ?> Total price: Rs.<?php
  total_price();
    ?> <a href="cart.php" style="text-decoration:none; color:blueviolet;">Go to cart</a></span>
 <hr style="margin: 5px 30px 5px 30px;">
 
</div>
          <div id="products_box">
             <?php
  getPro();
  getCatPro();
  getBrandPro();
    ?>
      
          </div>
        </div>
       
      </div>
      <div class="footer" style="text-align: center; line-height: 100px;">
        <h1 >Sandhya &copy</h1>
      </div>
    </div>
  </body>
</html>

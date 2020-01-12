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
<div style="width: 100%;height: 30px;  background: white">
<span style="text-align:center;line-height:30px;">WELCOME </span>
<span style="float:right;line-height:30px; margin-right:50px; word-spacing: 3px; "><b>Your Cart </b> Total items:<?php
  total_items();
    ?> Total price: Rs.<?php
  total_price();
    ?> <a href="cart.php" style="text-decoration:none; color:blueviolet;">Go to cart</a></span>
 <hr style="margin: 5px 30px 5px 30px;">
</div>
          <div id="products_box">
             <?php
 

if (isset($_GET['Search'])) {
      $search_query=$_GET['user_query'];
global $con;
$get_pro="select * from products where product_keywords like '%$search_query%'";
$run_pro=mysqli_query($con,$get_pro);
$count_result=mysqli_num_rows($run_pro);

if ($count_result==0) {
    echo "<h1>No Items Found</h1>";
}
while ($row_pro=mysqli_fetch_array($run_pro)) {
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];

echo "

<div id='single_product'>
<img src='./admin_area/product_images/$pro_image' width='180'height='180' alt='photo'>
<h3 style='height:40px;'>$pro_title</h3>
<br>
<p><b>Rs. $pro_price</b></p>

<a href='details.php?pro_id=$pro_id' style='float: left;text-decoration: none;margin-left:30px; color:black;'>Details</a>
<a href='index.php?add_cart=$pro_id'> <button style='float:right margin:30px;border: none; background:#008080; color:white;'>Add to Cart</button></a>

</div>
";
}
}
 
   




    ?>
      
          </div>
        </div>
       
      </div>
      <div class="footer" style="text-align: center; line-height: 100px;">
        <h1 >Deepti &copy</h1>
      </div>
    </div>
  </body>
</html>

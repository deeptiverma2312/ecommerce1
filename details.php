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
            <li><a href="#">HOME</a></li>
            <li><a href="#">All products</a></li>
            <li><a href="#">My account</a></li>
            <li><a href="#">Sign up</a></li>
            <li><a href="#">Cart</a></li>
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
<span style="float:right;line-height:30px; margin-right:50px;"><b>Your Cart </b> Total items: Total price: <a href="cart.php" style="text-decoration:none; color:blueviolet;">Go to cart</a></span>
 <hr style="margin: 5px 30px 5px 30px;">
</div>
          <div id="products_box">
             <?php
             if (isset($_GET['pro_id'])) {
               $product_id=$_GET['pro_id'];
             $get_pro="select * from products where product_id='$product_id'";
$run_pro=mysqli_query($con,$get_pro);
while ($row_pro=mysqli_fetch_array($run_pro)) {
$pro_id=$row_pro['product_id'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
$pro_desc=$row_pro['product_desc'];
echo "
<div id='decs_pro'>

<h3>$pro_title</h3>
<img style='max-width:400px;' src='./admin_area/product_images/$pro_image'  alt='photo' >
<p><b>Rs. $pro_price</b></p>
<br>
<p>$pro_desc</p>
<br>
<a href='index.php' style='float: left;text-decoration: none;margin-left:30px; color:black;'>Go Back</a>
<a href='index.php?add_cart=$pro_id'> <button style='float:right ;border: none; background:#008080; color:white;'>Add to Cart</button></a>

 
</div>
";}
             }


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

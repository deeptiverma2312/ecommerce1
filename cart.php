<!DOCTYPE html>
 <?php
   session_start();
  
   include("./functions/functions.php");
   
    ?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css" />
   
    <style>
    #cartmenu{
  display: flex;

  }
  #cartmenu li{
  flex:1;
  width:200px;
  height:30px;
  list-style:none;
  border:none;
  background: #008080;
margin:5px;
  }
  #cartmenu li a{
    color:white;
text-decoration:none;
  border:none;
  background: none;
  }
  button,#cbtn{
color:white;
  border:none;
  background: none;
  }
</style>
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
             <form action="" method="post" enctype="multipart/form-data" style="margin-top:30px ; text-align: center;">
            <table align="center" class="table" width="700px" style="margin-left:200px ; text-align: center;">


    <tr  bgcolor="#008080" >
        <th>Remove</th>
         <th>Product(s)</th>
          <th>Quantity</th>
           <th>Total Price</th>
    </tr>
<?php
 
global $con;
    $total=0;   
    $ip=getIp();
    $get_price="select * from cart where ip_add='$ip'";
    $run_price=mysqli_query($con,$get_price);

    while ($p_price=mysqli_fetch_array($run_price)) {
      $pro_id=$p_price['p_id'];
        
      $pro_price="select * from products where product_id=$pro_id";
      $run_pro_price=mysqli_query($con,$pro_price);
while ($pp_price=mysqli_fetch_array($run_pro_price)) {
    $product_price=array($pp_price['product_price']);
    $product_title=$pp_price['product_title'];
    $product_image=$pp_price['product_image'];
    $single_price=$pp_price['product_price'];
    $values=array_sum($product_price);
$total+=$values;


    ?> 
    <tr class="td" style="height: 110px;" align="center">

    <td style="position:relative" ><a class="remove" href='<?php
 echo "cart.php?remove='$pro_id'";
    ?>'>delete</a></td>
     <td style="display:flex" >  <img style="margin:10px"  src='./admin_area/product_images/<?php
 echo $product_image;
    ?> ' width="100px" alt='error'> <h3 style=" line-height:110px" ><?php
  echo $product_title;
  ?></h3>

     </td>
      <td ><input  class="qty" type="text" name="qty" value= "2" ></td>

       <td style="position:relative" > <div style=" position: absolute; top:50%; right:5%; width:80px;"> Rs. <?php
  echo $single_price;
  ?></div></td>
 
    </tr>
    
    
    
<?php
 }
    }


    ?> 
    <tr >
    <td></td>
    <td></td>
    <td>TOTAL PRICE: </td>
    <td>Rs:<?php
  echo $total;
  ?></td>
    </tr>


            </table>
            
            <br>
            <ul id="cartmenu">

<li ><button><a  href="index.php">Back to home</a></button></li>
<li ><input id="cbtn" type="submit" class="removebtn" name="update" value="update"></li>
<li ><button><a href="#">Check Out</a></button></li>

</ul>
            </form>
      
<?php
    ?>



          </div>
        </div>
       
      </div>
      <div class="footer" style="text-align: center; line-height: 100px;">
        <h1 >Deepti &copy</h1>
      </div>
    </div>


 <script>
  var remove = document.querySelector(".table");
remove.addEventListener("click", function(e) {
<?php
 
$ip=getIp();
$remove_id=$_POST['remove'];
    
$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
$run_delete=mysqli_query($con,$delete_product);
if (!$run_delete) {
   die("query failed ".mysqli_error($con));
}
   
  ?>





 e.target.parentElement.parentElement.remove();


 window.open('cart.php','self');
});

  </script>
  </body>
</html>

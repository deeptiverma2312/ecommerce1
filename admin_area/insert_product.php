<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include("./db.php");
    ?>
<style>
.submit {
  border: none;
  height: 30px;
  border-radius: 5px;
  color: white;
  background-color: rgb(96, 0, 185);
}
</style>
</head>
<body >
    <form  method="post"
            action="insert_product.php"
            enctype="multipart/form-data"
          >
        <table align="center" width="700" bgcolor="red" border="2">
            <tr align="center">
                <td colspan="7">
                    <h2>insert new post</h2>
                </td>
            </tr>
             <tr>
                <td align="right">Product Title:</td>
                <td>
                    <input type="text" name="product_title" size="40" required >
                </td>
            </tr>
              <tr>
                <td align="right">Product Categories:</td>
                <td>
                   <select name="product_cat" id="">
                       <option> Select a category</option>
                       <?php
            global $con;           
    $get_cats="select * from catrgories";
    $run_cats=mysqli_query($con,$get_cats);
    while($row_cats=mysqli_fetch_array($run_cats)){
$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];
echo ("<option value='$cat_id'>$cat_title</option>");
    }
                       ?>
                   </select>
                </td>
            </tr>
              <tr>
                <td align="right">Product Brand:</td>
                <td>
               <select name="product_brand" id="">
                       <option> Select a brand</option>
                       <?php
             global $con;          
    $get_brands="select * from brands";
    $run_brands=mysqli_query($con,$get_brands);
    while($row_brands=mysqli_fetch_array($run_brands)){
$brand_id=$row_brands['brand_id'];
$brand_title=$row_brands['brand_title'];
echo ("<option value='$brand_id'>$brand_title</option>");
    }
                       ?>
                   </select>
                </td>
            </tr>
              <tr>
                <td align="right">Product Image:</td>
                <td>
                    <input type="file" name="product_image" required >
                </td>
            </tr>
              <tr>
                <td align="right">Product Price:</td>
                <td>
                    <input type="number" name="product_price" required >
                </td>
            </tr>
              <tr>
                <td align="right">Product Description:</td>
                <td>
                    <textarea name="product_desc" id="" cols="20" rows="10"></textarea>
                </td>
            </tr>
              <tr>
                <td align="right">Product Keywords:</td>
                <td>
                     <input type="text" name="product_keywords" required >
                </td>
            </tr>
              <tr align="center">
                <td colspan="7">
                    <input class="submit" type="submit" name="insert_post" value="Insert product now">
                </td>
            </tr>
        </table>
        </form>

</body>
</html>
<?php
if(isset($_POST['insert_post'])){
    //getting text data form fields
$product_title=$_POST['product_title'];
$product_cat=$_POST['product_cat'];
$product_brand = $_POST['product_brand'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];
$product_keywords=$_POST['product_keywords'];
//geting image from field
$product_image=$_FILES['product_image']['name'];
$product_image_tmp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp,"product_images/$product_image");

$insert_product="INSERT INTO products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES($product_cat,$product_brand,'$product_title',$product_price,'$product_desc','$product_image','$product_keywords')";

$insert_pro=mysqli_query($con,$insert_product);
if (!$insert_pro) {
   die("query failed ".mysqli_error($con));
}


if ($insert_pro){
  
    echo "<script> alert('succesfully inserted product')</script>";
  echo "<script>window.open('insert_product.php','self')</script>";
}


}

?>
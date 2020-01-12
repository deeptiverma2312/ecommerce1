var remove = document.querySelectorAll(".removebtn");
remove.addEventListener("click", function(e) {});
 <script>
  var remove = document.querySelector(".removebtn");
  
remove.addEventListener("submit", function(e) {
   var check=document.querySelectorAll(".checked");
  
   for (let index = 0;  yyu index < check.length; index++) {
     console.log(check[index].checked);
     
   }

<?php
 
$ip=getIp();
 

   foreach ($_POST['remove'] as $remove_id) {
    
$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
$run_delete=mysqli_query($con,$delete_product);
if (!$run_delete) {
   die("query failed ".mysqli_error($con));
}
   }
  ?>
e.preventDefault();
});

  </script>

  <?php
    $pro_q='select * from cart where p_id="$pro_id"';
    $run_q=mysqli_query($con, $pro_q);
if (!$run_q) {
  die("query failed ".mysqli_error($con));
}
while ($pp_q = mysqli_fetch_array($run_q)) {
  $product_q = $pp_q['qty'];
  $_SESSION['qty'] = $product_q;
}
echo $_SESSION['qty'];
  ?>
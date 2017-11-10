<!DOCTYPE html>
<html>
	<head>
    	<title>Payment Options</title>
     </head>
 
 <body>
 <?php 
 include("includes/db.php");
 
 ?>

<div align="center" style="padding:20px;">

<h2>Payment Option for you</h2>

<?php 
$ip = getRealIpAddr();

$get_customer = "select * from customers where customer_ip='$ip'";

$run_customer = mysqli_query($con, $get_customer); 

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id'];


?>

 <a href="order.php?c_id=<?php echo $customer_id; ?>">Cash On Delivery</a></b><br><br><br>






</div>
</body>
</html>
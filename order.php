<?php 
 include("includes/db.php");
include("functions/functions.php");

//Getting customer ID 
if(isset($_GET['c_id'])){
	
	$customer_id = $_GET['c_id'];
	
	$c_email = "select * from customers where customer_id='$customer_id'";
	
	$run_email = mysqli_query($con, $c_email); 
	
	$row_email = mysqli_fetch_array($run_email);
	
	$customer_email = $row_email['customer_email'];
	
	$customer_name = $row_email['customer_name'];
	}

//Getting products price & number of items 

$ip_add = getRealIpAddr();
		 
		 $total = 0;
	
	$sel_price = "select * from cart where ip_add='$ip_add'";
	
	$run_price = mysqli_query($db, $sel_price); 
	
	$status = 'Pending';
	
	$invoice_no = mt_rand();
	
	$i= 0;
	
	$count_pro = mysqli_num_rows($run_price);
	
	while ($record=mysqli_fetch_array($run_price)){
		
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($db,$pro_price); 
		
		while($p_price=mysqli_fetch_array($run_pro_price)){
			
			$product_name = $p_price['product_title'];
			
			$product_price = array($p_price['product_price']);
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			$i++;
			
			}
		}
//Getting Quaintity from the cart 

$get_cart = "select * from cart";

$run_cart = mysqli_query($con, $get_cart); 

$get_qty = mysqli_fetch_array($run_cart);

$qty = $get_qty['qty'];

if($qty==0){
	
	$qty=1;
	
	$sub_total = $total;
	}
	else {
		
		$qty=$qty;
		
		$sub_total = $total*$qty;
		
		}
		
		 $insert_order = "insert into customer_orders (customer_id, due_amount, invoice_no, total_products, order_date, order_status) values ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";
		
		$run_order = mysqli_query($con, $insert_order); 

			echo "<script>alert('Order successfully submitted, Thanks!')</script>";
		echo "<script>window.open('all_products.php','_self')</script>";
			
	


?>
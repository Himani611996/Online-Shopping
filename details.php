<?php 
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>
	
    <!--Main Container Starts-->
    <div class="main_wrapper">
    	
        <!--Header Starts-->
    	<div class="header_wrapper">
            <a href="index.php"><img src="images/logo.png" style="float:left;"></a>
            <img src="images/ad_banner.jpg" style="float:right;">
        </div>
        <!--Header Ends-->
        
        <!--Navagation Bar starts-->
        <div id="navbar" style="background-color:#880E4F;">
        	
            <ul id="menu" >
        		<li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                
               
                <li><a href="cart.php">Shopping Cart</a></li>
               
        
        	</ul>
            
             <div id="form">
             	<form method="get" action="results.php" enctype="multipart/form-data">
                	
                    <input type="text" name="user_query" placeholder="Search a Product"/>
                    <input type="submit" name="search" value="Search" />
                    
                </form>
            </div>
            
        </div>
        <!--Navagation Bar Ends-->
       
       
        <div class="content_wrapper">
        	
            <div id="left_sidebar" style="background-color:#880E4F";>
            
            	<div id="sidebar_title">Categories</div>
                
                <ul id="cats">
                	<?php getCats(); ?>
                    
                </ul>
                
                <div id="sidebar_title">Brands</div>
                 
                 <ul id="cats">
                 
                 <?php getBrands(); ?>
                
            
            	</ul>
            </div>
            
            
        	<div id="right_content" style="background-color:#F3E5F5;height:621px;">
           
            
            	<div id="headline" style="background-color:#3E2723;">
           
                	<div id="headline_content">
                    	<b>Welcome Guest!</b>
                   
                    </div>
                </div>
            
            <div id="products_box">
           <?php 
		   
		   if(isset($_GET['pro_id'])){
			   
			   $product_id = $_GET['pro_id'];
		   
		   $get_products = "select * from products where product_id='$product_id'";
				
				$run_products = mysqli_query($db, $get_products); 
				
				while ($row_products=mysqli_fetch_array($run_products)){
					
					$pro_id = $row_products['product_id'];
					$pro_title= $row_products['product_title'];
					$pro_desc = $row_products['product_desc'];
					$pro_price = $row_products['product_price'];
					$pro_image1 = $row_products['product_img1'];
                                        $pro_image2 = $row_products['product_img2'];
	                              
				
					
					echo "
					<div id='single_product'>
					
					<h3>$pro_title</h3>
					
					<img src='admin_area/product_images/$pro_image1' width='300' height='250' />
					<img src='admin_area/product_images/$pro_image2' width='300' height='250' />
					
<br>
					
					<p><b>Price:  $ $pro_price </b></p>
					
					<p>$pro_desc</p>
					
					<a href='index.php' style='float:left;'>Go Back</a>
					
					<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
					
					</div>
					";
					
					
					
					
					
					}
		   }
		   
		   ?>
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">
        
        <h1 style="color:#000; padding-top:30px; text-align:center;">&copy; 2017 *  SHOPIF BY THEME UNDERGROUND MEDIA  * </h1>
        
        </div>
    
    
    
    </div>
    <!--Main Container End-->
    
</body>
</html>
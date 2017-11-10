<?php 
session_start(); 

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
        	
            <ul id="menu">
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
        	
            <div id="left_sidebar" style="background-color:#880E4F;">
            
            	<div id="sidebar_title">Categories</div>
                
                <ul id="cats">
                	<?php getCats(); ?>
                    
                </ul>
                
                <div id="sidebar_title">Brands</div>
                 
                 <ul id="cats">
                 
                 <?php getBrands(); ?>
                
            
            	</ul>
            </div>
            
            
        	<div id="right_content" style="background-color:#F3E5F5;height:590px;">
           
            <?php cart(); ?> 
            
            	<div id="headline" style="background-color:#3E2723;">
                	<div id="headline_content">
                    	<?php 
                        if(!isset($_SESSION['customer_email']))
	{
							echo "<b>Welcome Guest!</left></b>
<b style='color:#FF4081'>Shopping Cart</b>";
							
	}
else {
	echo "<b>Welcome:" . "<span style='color:white'>" . $_SESSION['customer_email'] . "</span>" . "</b>" . "<b style='color:#FF4081'>Your Shopping Cart </b>";
	}
						?> 


                    	<span> - Total Items: <?php items(); ?> - Total Price: <?php total_price(); ?> - <a href="cart.php" style="color:#FF4081;">Go to Cart</a>
                        <?php 
                       
					   if(!isset($_SESSION['customer_email'])){
					    
						echo "<a href='checkout.php' style='color:#FF4081;'>Login</a>";
 
					   }
					   else {
						   echo "<a href='logout.php' style='color:#FF4081;'>Logout</a>";
   
						   }
						
						?>
                        </span>
                    </div>
                </div>
     
            <div>
            <?php     

		   if(!isset($_SESSION['customer_email']))
		   { 
			   include("customer/customer_login.php");
				
			   
			   }
			   else {
				   include("payment_options.php");

				   
				}   
		   
		   
		
		  
		   
		   ?>	
 	 
            </div>
            
            
            
            </div>
        
        
        </div>
        
        
        <div class="footer">
        
        <h1 style="color:#000; padding-top:30px; text-align:center;">&copy; 2017 *  SHOPIF BY THEME UNDERGROUND MEDIA  *</h1>
        
        </div>
    
    
    
    </div>
    <!--Main Container End-->
    
</body>
</html>
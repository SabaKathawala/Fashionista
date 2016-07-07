<?php
	session_start();
	require_once('dbconnection.php');
	$obj = new DBConnect();
   	if(isset($_GET['arg1']))
    {
   		session_destroy();	//destroy current session :logout
    }
    else if(isset($_GET['product_id']))
	{	
	//session exists		
		if(isset($_SESSION['login'])):
			$time = time()+120;
			$query = "Select `quantity` from `cart` where `product_id`='$_GET[product_id]' AND `customer_id`='$_SESSION[customer_id]'";
			$result = $obj->sql_select($query);
			if(mysqli_num_rows($result)!=0)
			{
				$row = mysqli_fetch_assoc($result);
				$quantity = $row['quantity']+1;
				
				$query = "Update `cart` set `quantity`='$quantity', `created_at`='$time' where `product_id` = '$_GET[product_id]' AND `customer_id`='$_SESSION[customer_id]'";
				if($obj->sql_update($query))
				{
					$query = "Select * from `cart` where `customer_id`='$_SESSION[customer_id]'";
		 			$result=$obj->sql_select($query);
			 		if(mysqli_num_rows($result))
			 		{
			 			$_SESSION['cart_quantity'] = mysqli_num_rows($result);
			 			echo "(".$_SESSION['cart_quantity'].")";
			 		}
				}
			}
			
		    else
		    {
		    	
		    	$query = "Insert into `cart` (`product_id`, `quantity`, `customer_id`, `created_at`) VALUES ('$_GET[product_id]','1','$_SESSION[customer_id]', '$time')";
	      		if($obj->sql_update($query))
		      	{
		      	
			 		$query = "Select * from `cart` where `customer_id`='$_SESSION[customer_id]'";
			 		$result=$obj->sql_select($query);
			 		if($result)
			 		{
			 			$_SESSION['cart_quantity'] = mysqli_num_rows($result);
			 			echo "(".$_SESSION['cart_quantity'].")";
			 		}
		        }
		    }
		//session doesn't exist    
	    else:
	    	//cookie set
	    	if(isset($_COOKIE['g_c']))
	    	{
	      		$time = time()+(30*24*60*60);
				setcookie('g_c', $_COOKIE['g_c'], $time);
	      		//product_id present
	    		$query = "Select `quantity`,`created_at` from `cart` where `session_id`='$_COOKIE[g_c]' AND `product_id`='$_GET[product_id]'";
	    		$result = $obj->sql_select($query);
	    		if($row = mysqli_fetch_assoc($result))
	      		{
	      			$quantity = $row['quantity']+1;
					$query = "Update `cart` set `quantity`='$quantity', `created_at`='$time' where `product_id` = '$_GET[product_id]' AND `session_id`='$_COOKIE[g_c]'";
					if($obj->sql_update($query))
					{
			    		$query = "Select * from `cart` where `customer_id`='$_COOKIE[g_c]'";
				 		$result=$obj->sql_select($query);
						if($num = mysqli_num_rows($result))
						{
					 		setcookie('cart_quantity',$num, $time);
					 		echo $num;
					 	}
		    			
		    		}
	      		}
	      		//product_id not present
	      		else
	      		{
	      			$time = time()+(30*24*60*60);
		      		$query = "Insert into `cart` (`product_id`, `quantity`, `customer_id`, `session_id`, `created_at`) VALUES ('$_GET[product_id]','1','$_COOKIE[g_c]', '$_COOKIE[g_c]', '$time')";
		      		if($obj->sql_update($query))
					{
				    	$query = "Select * from `cart` where `customer_id`='$_COOKIE[g_c]'";
						$result=$obj->sql_select($query);
						if($num = mysqli_num_rows($result))
						{
					 		setcookie('cart_quantity', $num, $time);
					 		echo $num;
					 	}
			    	}
			    }
	      	}
	    	//cookie not set
	    	else
	    	{
		    	$session_id = session_id().time();
		    	$time = time()+(30*24*60*60);
		    	setcookie('g_c', $session_id, $time);//30*24*60*60
		    	$query = "Insert into `cart` (`product_id`, `quantity`, `customer_id`, `session_id`, `created_at`) VALUES ('$_GET[product_id]','1','$session_id', '$session_id', '$time')";
	    		if($obj->sql_update($query))
				{
			  //  		$query = "Select * from `cart` where `customer_id`='$session_id'";
			 	// 	$result=$obj->sql_select($query);
					// if($result)
					// {
				 // 		setcookie('cart_quantity', mysqli_num_rows($result), $time);
				 // 		sleep(5);
				 // 		echo $_COOKIE['cart_quantity'];
				 // 	}
						setcookie('cart_quantity', '1', $time);
						echo 1;
		    	}
		    }
      	endif;
    }
    else if(isset($_GET['arg2']))
    {
    	if(isset($_SESSION['login']))
    	{
    		$query = "Delete from `cart` where `product_id`='$_GET[arg2]' AND `customer_id`='$_SESSION[customer_id]'";	
    		if($obj->sql_update($query)){
    			$_SESSION['cart_quantity']-=1;
    			echo "The selected product has been removed from your cart";
    		}
    		else
    			echo "There was some problem processing your request. Plaese try again later";
    	}
    	else if(isset($_COOKIE['g_c']))
    	{
    		$query = "Delete from `cart` where `product_id`='$_GET[arg2]' AND `customer_id`='$_COOKIE[g_c]'";	
    		if($obj->sql_update($query)){
    			$_COOKIE['cart_quantity']-=1;
    			echo "The selected product has been removed from your cart";
    		}
    		else
    			echo "There was some problem processing your request. Plaese try again later";
    	}
    }
    else if(isset($_GET['arg3']))
    {
    	if(isset($_SESSION['login']))
    	{
    		$query = "Delete from `order_details` where `order_id` = (Select `order_id` from `order` where `customer_id`='$_SESSION[customer_id]') AND `product_id`='$_GET[arg3]'";

    		if($obj->sql_update($query)){
    			
    			echo "The selected product has been removed from your order";
    		}
    		else
    			echo "There was some problem processing your request. Plaese try again later";
    	}
    	else if(isset($_COOKIE['g_c']))
    	{
    		$query = "Delete from `order_details` where `order_id` = (Select `order_id` from `order` where `customer_id`='$_COOKIE[g_c]')	AND `product_id`='$_GET[arg3]'";
	
    		if($obj->sql_update($query)){
    			
    			echo "The selected product has been removed from your order";
    		}
    		else
    			echo "There was some problem processing your request. Plaese try again later";
    	}
    }
?>
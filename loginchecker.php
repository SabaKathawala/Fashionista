
<?php
	// $user = $_POST['username'];
	// $pass = $_POST['userpass'];
	// if($user=='QQ'&& $pass=='WW'){
	// 	setcookie('login','true',time()+60*60*24*10);
	// 	setcookie('user','QQ');
	// 	header('location:Home.php');
	// }
		
	require_once("dbconnection.php");


		$username = $_GET['username'];
		$userpass = $_GET['userpass'];

		$obj = new DBConnect();
		
		$query = " select `customer_password`,`customer_id`,`customer_fname` from `customer` where  `customer_email_id` = '$username' ";

		$result = $obj->sql_select($query);

		$rows = mysqli_num_rows($result);

		if($rows == 0)
		{
			$response = array("status"=>"failed","msg"=>"Unauthorized Access. Register to get Access :)");
			echo json_encode($response);
		}

		else
		{
			$row=mysqli_fetch_assoc($result);
			if($row['customer_password']==$userpass)
			{
				session_start();
				$name=$row['customer_fname'];
				$_SESSION['login']=true;
				$_SESSION['customer_id']=$row['customer_id'];
				$_SESSION['customer_fname']=$name;
				$_SESSION['customer_email_id']=$username;
				
				if(isset($_COOKIE['g_c']))
		    	{
					$query1 = "Select `quantity`, `product_id` from `cart` where `customer_id`='$_COOKIE[g_c]'";
					$result1 = $obj->sql_select($query1);
					while($row1 = mysqli_fetch_assoc($result1))
					{
						$query2 = "Select `quantity` from `cart` where `product_id`='$row1[product_id]' AND `customer_id`='$_SESSION[customer_id]'";
						$result2 = $obj->sql_select($query2);
						if($row2 = mysqli_fetch_assoc($result2))
							$quantity = $row1['quantity'] + $row2['quantity'];
						else
							$quantity = $row1['quantity'];
						//delete the original node of customer
						$query = "Delete from `cart` where `customer_id`='$_SESSION[customer_id]' AND `product_id`='$row1[product_id]'";
						$obj->sql_update($query);
						//update the guest to registered customer
						$query = "Update `cart` set `quantity`='$quantity', `customer_id`='$_SESSION[customer_id]' where `product_id`='$row1[product_id]' AND `session_id`='$_COOKIE[g_c]'";
						$obj->sql_update($query);						
					}
					$query = "Select * from `cart` where `customer_id`='$_SESSION[customer_id]'";
					$result = $obj->sql_select($query);
					if(mysqli_num_rows($result)!=0)
						$_SESSION['cart_quantity'] = mysqli_num_rows($result);
					setcookie('cart_quantity');
				}
				else{
					$query = "Select * from `cart` where `customer_id`='$_SESSION[customer_id]'";
					$result = $obj->sql_select($query);
					if(mysqli_num_rows($result)!=0)
						$_SESSION['cart_quantity'] = mysqli_num_rows($result);

				}
				$response = array("status"=>"success","msg"=>$name);
					echo json_encode($response);
			}
			else
			{
				$response = array("status"=>"failed","msg"=>"Either username or password is wrong");
				echo json_encode($response);
			}
		}
		$obj->sql_close();
?>	


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
		
		$query = " select `customer_password`,`cutomer_id` from `customer` where  `customer_email_id` = '$username' ";

		$result = $obj->sql_select($query);

		$rows = mysqli_num_rows($result);

		if($rows == 0)
		{
			$response = array("status"=>"failed","msg"=>"Unauthorized Access");
			echo json_encode($response);
		}

		else
		{
			$row=mysqli_fetch_assoc($result);
			if($row['customer_password']==$userpass)
			{
				session_start();
				$name=$row['customer_name'];
				$_SESSION['login']=true;
				$_SESSION['customer_id']=$row['customer_id'];
				$response = array("status"=>"success","customer_name"=>$name);
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

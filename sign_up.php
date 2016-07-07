<?php 
require_once('dbconnection.php');
$obj = new DBConnect();
?>


<?php

//....................................update_account.................................
	if(isset($_POST['update']))
	{
		session_start();
		$customer_id = $_SESSION['customer_id'];
		$customer_lname = $_POST['customer_lname'];
		$customer_fname = $_POST['customer_fname'];
		$customer_email_id = $_POST['customer_email_id'];
		$customer_password = $_POST['customer_password'];
		$customer_street = $_POST['customer_street'];
		$customer_city = $_POST['customer_city'];
		$customer_state = $_POST['customer_state'];
		$customer_country = $_POST['customer_country'];
		$customer_pincode = $_POST['customer_pincode'];
		$customer_phone_no = $_POST['customer_phone_no'];
		$obj = new DBConnect();
		$query = "Update `customer` set 
		`customer_fname`='$customer_fname',
		`customer_lname`='$customer_lname',
		`customer_email_id`='$customer_email_id',
		`customer_phone_no`='$customer_phone_no',
		`customer_password`='$customer_password',
		`customer_street`='$customer_street',
		`customer_city`='$customer_city',
		`customer_state`='$customer_state',
		`customer_country`='$customer_country',
		`customer_pincode`='$customer_pincode' where `customer_id`='$_SESSION[customer_id]'";
		$obj->sql_update($query);
	}
//....................................delete_account.................................
	elseif(isset($_POST['delete']))
	{
		session_start();
		$query = "Delete from `customer` where `customer_id`='$_SESSION[customer_id]'";
		if($obj->sql_update($query)){
			session_destroy();
			sleep(5);
			header("location:Home.php");
		}
	}
//....................................create_account.................................
	elseif(isset($_POST['create_account']))
	{
			
		$customer_lname = $_POST['customer_lname'];
		$customer_fname = $_POST['customer_fname'];
		$customer_email_id = $_POST['customer_email_id'];
		$customer_password = $_POST['customer_password'];
		$customer_street = $_POST['customer_street'];
		$customer_city = $_POST['customer_city'];
		$customer_state = $_POST['customer_state'];
		$customer_country = $_POST['customer_country'];
		$customer_pincode = $_POST['customer_pincode'];
		$customer_phone_no = $_POST['customer_phone_no'];
		$obj = new DBConnect();
		$query = "Insert into `customer`
		(`customer_fname`, `customer_lname`, `customer_email_id`, `customer_phone_no`, `customer_password`, `customer_street`, `customer_city`, `customer_state`, `customer_country`, `customer_pincode`) values('$customer_fname','$customer_lname','$customer_email_id','$customer_phone_no','$customer_password','$customer_street','$customer_city','$customer_state','$customer_country','$customer_pincode')";
		if($obj->sql_update($query)){
			$query = " select * from `customer` where  `customer_fname` = '$customer_fname'";
			$result = $obj->sql_select($query);
			$row=mysqli_fetch_assoc($result);
			session_start();
			$_SESSION['login'] = true;
			$_POST['create_account'] = null;
			$_SESSION['customer_id'] = $row['customer_id']; 
			$_SESSION['customer_fname'] = $customer_fname; 
			$query = "Select * from `cart` where `customer_id`='$_SESSION[customer_id]'";
			$result = $obj->sql_select($query);
			if(mysqli_num_rows($result)!=0)
			{
				$_SESSION['cart_quantity'] = mysqli_num_rows($result);

			}	
		}
	}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<style>
	.container{
		background-image: url("images/shoes/background.jpg");
		display:none;
	}
	.active{
		display:block;
	 }

	
	#options{
		margin-top:200px;
		list-style-type: none;
		background-color: rgb(253,150,150);

	}
	#options li{
		font-style:italic;
		display: inline-block;
		padding: 10px 150px 10px 150px;
		font-size: 20px;
		border-left: solid 2px white;
		border-right: solid 2px white;
		text-align: center;
		color: white;
		background-color: rgb(253,160,160);
	}

	.two{
		display: none;
	}

	#options li:hover{
		cursor: pointer;
		background-color: rgb(253,150,150);
	}
	table{
		margin-top: 40px;
	}
	table td{
		padding:15px 100px 15px 0;
		
		font-family: cursive;
		font-size: 20px;
		color:rgb(146, 45, 101); /*rgba(175, 124, 154,0.5);*/
	}

	.btn{
		background: transparent;
		color:rgb(146, 45, 101);
		border-color: #A79F9F;
	}

	.btn:hover{
		background:rgb(146, 45, 101) ;
		color:white;
	}
	/*table tr{
		border-top:dotted 2px black;
		border-bottom:dotted 2px black;
	}*/

	</style>
</head>

<body>
	<?php 
		if (!isset($_SESSION))
		{
		  	session_start();
		}
		if(isset($_SESSION['login'])){
		
		    include_once('Header.php');
		    include_once("sign_in.html");
		    // include_once('feedback.php');
 
	?>
		<ul id='options'>
			<li data-id='view'>View Profile</li>
			<li data-id='edit'>Edit Profile</li>
			<li data-id='delete'>Delete Account</li>
		</ul>
		<hr/>
		<div class='container active' id='view'>
			<!-- <div class='row'>
				<div class='col-md-10'>
					<i class = 'fa fa-times pull-right' id ='one'></i>
					<h2>Shop the best with Fashionista. Log In ;)</h2>
					<form id='login-form'>
						<table class='pull-left'>
							<tr>
								<td><div id='error' style='color:red;'></div></td>
							</tr>
							<!-- <br/> -->
						   <!-- <tr>
						        <td>Email Id</td>
						    	<td><input class='form-control' id='email' name='email'/></td>
							</tr>
							<tr>
							    <td>Password</td>
							    <td><input class='form-control' id='password' name='password'/></td>
							</tr>
							<tr>
							    <td><button class='btn one'>Log In</button></td>
							</tr>
						</table>
					</form>
					<div class="jumbotron pull-right">
						<h3>Not Registered yet?</h3>
						<p><a class="btn btn-primary btn-lg cacc" role="button">Sign Up</a></p>
					</div>
				</div>			
			</div>       -->    
<!--	.......................	Login form ..................................-->				       
			<div class='row'>
				<div class='col-md-10'>
					
					<?php 
						$obj = new DBConnect();	
						$query = "select * from `customer` where  `customer_id` = '$_SESSION[customer_id]'";
						$result = $obj->sql_select($query);
						$row=mysqli_fetch_assoc($result);
					?>
					<table class='pull-right'>
		                <tr>
				        	<td>First Name:</td>
				            <td><?php echo "$row[customer_fname]";?></td>
				            
				        </tr>
				        <tr>
							<td>Last Name:</td>
				            <td><?php echo "$row[customer_lname]";?></td>
				        </tr>		
				        <tr>
				            <td>Email Address:</td>
				            <td><?php echo "$row[customer_email_id]";?></td>
				        </tr>
					    <tr>
					        <td>Password:</td>
					        <td><?php echo "$row[customer_password]";?></td>
					    </tr>
					    <tr>
					    	<td><hr/></td>
					    </tr>
					    <tr>
					        <td>Address Details</td>
					    </tr>
					    <tr>
					        <td>Street:</td>
					        <td><?php echo "$row[customer_street]";?></td>
					    </tr>
					    <tr>
					    	<td>City:</td>
					     	<td><?php echo "$row[customer_city]";?></td>
					     </tr>
					    <tr>
					        <td>State:</td>
					        <td><?php echo "$row[customer_state]";?></td>
					    </tr>
					    <tr>
					        <td>Country:</td>
					        <td><?php echo "$row[customer_country]";?></td>
					    </tr>
					   	<tr>		         
					        <td>Pincode:</td>
					        <td><?php echo "$row[customer_pincode]";?></td>
					    </tr>
					    <tr>
					        <td>Phone No:</td>
					        <td><?php echo "$row[customer_phone_no]";?></td>
					    </tr>
					  </table>
				    <img src='images/sign.jpg' class='img-responsive'/>
				</form>
			</div>
		</div>
	</div>
	<div class='container' id='edit'>
		<div class='row'>
			<div class='col-md-10'>
				<form action='sign_up.php' method='post' id='update'>
					<table class='pull-right'>
					       	<td>First Name</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_fname]";?>' name='customer_fname' id='customer_fname'/></td>
				        </tr>
				        <tr>
				            <td>Last Name</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_lname]";?>' name='customer_lname' id='customer_lname' /></td>
				        </tr>
				        <tr>
				            <td>Email Address</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_email_id]";?>' name='customer_email_id' id='customer_email_id'/></td>
				        </tr>
				        <tr>
				            <td>Password</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_password]";?>' name='customer_password' id='customer_password'/></td>
				        </tr>
				        <tr>
				            <td colspan='13'><hr/></td>
				        </tr>
				        <tr>
				            <td>Address Details</td>
				        </tr>
				        <tr>
				            <td>Street</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_street]";?>' name='customer_street' id='customer_street'/></td>
				        </tr>
				        <tr>
				        	<td>City</td>
				        	<td><input class='form-control' value='<?php echo "$row[customer_city]";?>' name='customer_city' id='customer_city'/></td>
				        </tr>
				        <tr>
				            <td>State</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_state]";?>' name='customer_state' id='customer_state'/></td>
				        </tr>
				        <tr>
				            <td>Country</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_country]";?>' name='customer_country' id='customer_country'/></td>
				        </tr>
				       	<tr>		         
				            <td>Pincode</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_pincode]";?>' name='customer_pincode' id='customer_pincode'/></td>
				        </tr>
				        <tr>
				            <td>Phone No</td>
				            <td><input class='form-control' value='<?php echo "$row[customer_phone_no]";?>' name='customer_phone_no' id='customer_phone_no'/></td>
				        </tr>
				        <tr>
				            <td><button type='submit' class='btn btn-success' name='update'>Update Account</button></td>
				        </tr>
			       	</table>
			       	<img src='images/shopaholics.jpg' class='img-responsive'/>
			    </form>
			</div>	
		</div>
	</div>
	<!-- </div> -->
	<div class='container' id='delete'>
		<div class='row'>
			<div class='col-md-10'>
				<div class="jumbotron pull-right one">
					<h3>Are you sure you want to delete your account?</h3>
					<form action='sign_up.php' method='post'>
					<p><button class="btn btn-primary btn-lg delete" name = 'delete' type='submit'>Delete</button></p>
				</div>
				<img src='images/sadface.jpg' class='img-responsive one'/>
				<div class="jumbotron pull-right two">
					<h3 style='margin-top:80px;'>We know you'll miss us. Come back soon<br/>
						Redirecting in 5 seconds</h3>
				</div>

				<img src='images/happyface.jpg' class='img-responsive two'/>
			</div>
		</div>
	</div>
	<hr/>
	<?php }
	else {
		header("location:Home.php");
	}
	?>
	
</body>
</html>		
<script src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#options li").click(function(){
    	//get active option and corresponding menu
	    var data_id = $(this).attr('data-id');
       	var active_div=$(".active");
       	var tobeactive_div=$("#"+data_id);
       	active_div.animate({width:'toggle'},700);
	    tobeactive_div.animate({width:'toggle'},700);
	    active_div.removeClass('active');	       
	    tobeactive_div.addClass('active');
    })
    $(".delete").click(function(){
      	$(".one").hide();
       	$(".two").show();
    })
});
</script>
<?php

	require_once('dbconnection.php');
	$obj = new DBConnect();
	$query="";

	if(isset($_GET['add_wardrobe']))
	{

		
		$category = $_GET['root'];
		$style = $_GET['style'];
		$page = $_GET['page'];
		$photograph = $_GET['photograph'];
		$cost = $_GET['cost'];
		//get main_menu_category_id
		$query = "Select `category_id`
				  from `main_category`
				  where `main_category`='$category' ";
		if($result= $obj->sql_select($query))
		{
			$row = mysqli_fetch_assoc($result);//if returns successfully
			$query = "Insert into `category` (`main_menu_category_id`, `category_name`, `category_description`) values('$row[main_menu_category_id]','$category_name','$category_description')"; //
			if($obj->sql_update($query))
			{
				$response = array("msg"=>"Your category has been inserted successfully");
				echo json_encode($response);
			}
			else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
				
		}
		
	}

	//===============================================================================================================//

	if(isset($_GET['edit_category']))
	{
		$category_name = $_GET['category'];
		$edit_name = $_GET['edit_name'];
		$edit_description = $_GET['edit_description'];

		//get main_menu_category_id
		$query = "Update `category`
				  set `category_name` = '$edit_name', `category_description` = '$edit_description'
				  where `category_name` = '$category_name'"; //
		if($obj->sql_update($query))
		{
			$response = array("msg"=>"Your category has been updated successfully");
				echo json_encode($response);
		}
		else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}

	}
	//============================================================================================================//

	if(isset($_GET['delete_category']))
	{
		$query = "Delete from `category`
				  where `category_name` = '$_GET[category]'"; //
		if($obj->sql_update($query))
		{
			$response = array("msg"=>"Your category has been deleted successfully");
			echo json_encode($response);
		}
		else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}

	}

	//==========================================================================================================//

	if(isset($_GET['add_product']))
	{
		$category_name = $_GET['category'];
		$product_name = $_GET['product_name'];
		$product_description = $_GET['product_description'];
		$product_cost = $_GET['product_cost'];
		$product_quantity = $_GET['product_quantity'];
		$product_weight = $_GET['product_weight'];
		$product_model_no = $_GET['product_model_no'];
		$product_created_at = $_GET['product_created_at'];
		$search_keyword = $_GET['search_keyword'];
		$feature_name = $_GET['feature_name'];
		$feature_value = $_GET['feature_value'];
		//get category info
		$query = "Select `main_menu_category_id`, `category_id`
				  from `category`
				  where `category_name`='$category_name' ";
		if($result= $obj->sql_select($query))
		{
			$row = mysqli_fetch_assoc($result);
			$query = "Insert into `product`
			          (`product_name`, `product_cost`, `product_quantity`, `product_weight`, `product_model_no`, `product_description`, `product_created_at`, `main_menu_category_id`, `category_id`, `search_keyword`)
					  values ('$product_name','$product_cost','$product_quantity','$product_weight','$product_model_no','$product_description','$product_created_at','$row[main_menu_category_id]','$row[category_id]','$search_keyword')"; //
			if($obj->sql_update($query))
			{
				$response = array("msg"=>"Your product has been inserted successfully");
				echo json_encode($response);
			}
			else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
		}
		
		$query = "Select `product_id`
				  from `product`
				  where `product_name`='$product_name' ";
		if($result= $obj->sql_select($query))
		{
			$row = mysqli_fetch_assoc($result);
			$query = "Insert into `product_features`
			         (`product_id`, `feature_name`, `feature_value`)
			         values ('$row[product_id]', '$feature_name','$feature_value')"; //
			if($obj->sql_update($query))
			{
				$response = array("msg"=>"Your product features have been inserted successfully");
				echo json_encode($response);
			}
			else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
				
		}
	
	}

//============================================================================================================//

	// if(isset($_GET['upload_image']))
	// {
	// 	$product_name = $_GET['product'];
	// 	$image = $_GET['image'];
	// 	$name = split("\\", $image);
	// 	$path = "images/".$name[2];
	// 	$query = "Select `product_id`
	// 			  from `product`
	// 			  where `product_name`='$product_name' ";
	// 	$resume_name = $_FILES['image']['name'];	
	// 	$tmp_name = $_FILES['image']['tmp_name'];	
	// 	$path = 'images/';
	// 	move_uploaded_file($tmp_name, $path.$resume_name);
	// 	if($result= $obj->sql_select($query))
	// 	{
	// 		$row = mysqli_fetch_assoc($result);
	// 		$query = "Insert into `product_images`
	// 		         (`product_id`, `main_image`)
	// 		         values ('$row[product_id]', '$path.$resume_name')"; //
	// 		if($obj->sql_update($query))
	// 		{
	// 			$response = array("msg"=>"Your image has been inserted successfully");
	// 			echo json_encode($response);
	// 		}
	// 		else
	// 		{
	// 			$response = array("msg"=>"There was some problem processing your request. Please try again later.");
	// 			echo json_encode($response);
	// 		}
				
	// 	}
	// }

////////////////////////////////////   kajal  ///////////////////////////////////////////////////////////////////

    if(isset($_GET['add_image']))
    {

	    $main_image = $_GET['main_image'];
	    $thumb_image_1 = $_GET['thumb_image_1'];
	    $thumb_image_2 = $_GET['thumb_image_2'];
	    $thumb_image_3 = $_GET['thumb_image_3'];
        $zoomer_image_1 = $_GET['zoomer_image_1'];
        $zoomer_image_2 = $_GET['zoomer_image_2'];
        $zoomer_image_3 = $_GET['zoomer_image_3'];

// yahan se upload ni kar sakte since here $main_image mein get se c:fakepathpic9.jpg aya yani bina / ke wo sahi name nahi img ka      

	    $im=substr_replace($main_image,"uploads/",0,11);
	    $it_1=substr_replace($thumb_image_1,"uploads/",0,11);
	    $it_2=substr_replace($thumb_image_2,"uploads/",0,11);
	    $it_3=substr_replace($thumb_image_3,"uploads/",0,11);
	    $iz_1=substr_replace($zoomer_image_1,"uploads/",0,11);
	    $iz_2=substr_replace($zoomer_image_2,"uploads/",0,11);
	    $iz_3=substr_replace($zoomer_image_3,"uploads/",0,11);

		$product_name = $_GET['product_name'];
		$query = "Select `product_id`
				  from `product`
				  where `product_name`='$product_name' ";

		if($result= $obj->sql_select($query))
		{
			$row = mysqli_fetch_assoc($result);
			$pro_id=$row['product_id'];
			
			$query = "Insert into `product_images` (`product_id`, `main_image`,`thumbnail_image_1`,`thumbnail_image_2`,`thumbnail_image_3`,`zoomer_image_1`,`zoomer_image_2`,`zoomer_image_3`) values ('$row[product_id]', '$im','$it_1','$it_2','$it_3','$iz_1','$iz_2','$iz_3')";
			if($obj->sql_update($query))
			{
				$response = array("msg"=>"Your image has been inserted successfully");
				echo json_encode($response);
			}
			else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
			
		}

	}


//===================================================================================================================//

	if(isset($_GET['edit_product']))
	{
		$product_id = $_GET['product_id'];
		$product_name = $_GET['product_name'];
		$product_description = $_GET['product_description'];
		$product_cost = $_GET['product_cost'];
		$product_quantity = $_GET['product_quantity'];
		$product_weight = $_GET['product_weight'];
		$product_model_no = $_GET['product_model_no'];
		$product_created_at = $_GET['product_created_at'];
		$search_keyword = $_GET['search_keyword'];
		$feature_name = $_GET['feature_name'];
		$feature_value = $_GET['feature_value'];
		//update product info
		$query = "Update `product` set
		          `product_name` = '$product_name', `product_cost` = '$product_cost',
		          `product_quantity`='$product_quantity', `product_weight`='$product_weight',
		          `product_model_no` = '$product_model_no', `product_description` = '$product_description',
		          `product_created_at` = '$product_created_at', `search_keyword`='$search_keyword'
		          where `product_id` = '$product_id'";  
		    if($obj->sql_update($query))
			{
				$response = array("msg"=>"Your product has been updated successfully");
				echo json_encode($response);
			}
			else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
		
		
			$query = "Update `product_features`
			          set `feature_value` = '$feature_value'
			          where `product_id`=`$product_id` AND  `feature_name` ='$feature_name'";
			if($obj->sql_update($query))
			{
				$response = array("msg"=>"Your product features have been updated successfully");
				echo json_encode($response);
			}
			else
			{
				$response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
					
	}

//=========================================================================================================================//

	if(isset($_GET['delete_product']))
	{
	    $product_name = $_GET['product_name'];
		$query = "Select `product_id`
				  from `product`
				  where `product_name`='$product_name' ";
		if($result= $obj->sql_select($query))
		{
			$row = mysqli_fetch_assoc($result);
			$query = "Delete from `product_features`
				  where `product_id` = '$row[product_id]'"; 
			if($obj->sql_update($query))
			{
				$response=array();
				$response['msg']='Features deleted successfully';
				// $response = array("msg"=>"Features deleted successfully");
	            echo json_encode($response);
			}
			else
			{
	 		    $response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}

			$query = "Delete from `product_images`
				  where `product_id` = '$row[product_id]'"; 
			if($obj->sql_update($query))
			{
				$response=array();
				$response['msg']='Images deleted successfully';
				// $response = array("msg"=>"Features deleted successfully");
	            echo json_encode($response);
			}
			else
			{
	 		    $response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}

			$query = "Delete from `product` where `product_id` = '$row[product_id]'";
			if($obj->sql_update($query))
			{
				$response = array("msg"=>"Product deleted successfully");
	            echo json_encode($response);
			}
			else
			{
	 		    $response = array("msg"=>"There was some problem processing your request. Please try again later.");
				echo json_encode($response);
			}
		}

	}
?>
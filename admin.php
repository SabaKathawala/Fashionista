<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css">
	</head>

	<body>
<header>
    <div class='container-fluid'>
      
      <div class='row'>
        <div class='col-md-12'>
          <ul class='header-ul pull-right'>

            <li><a href=''>Sign In</a></li>
            <li><a href=''>WishList</a></li>
            <li><a href=''>Cart</a></li>
            <li><a href=''>Checkout</a></li>

          </ul>
        </div>
      </div>

      <div class='row'>
        <div class='col-md-12 logo'>
          <a href ='header.html'>Fashionista</a>
        </div>
      </div>

      <div class='row'>
        <div class='col-md-12 caption'>
          <label>Live With Fashion</label>
        </div>
      </div>

      <div class='row'>
        <div class='col-md-10'>
          <ul class='options'>

            <li><a data-id='dashboard'>Dashboard</a></li>
            <li><a data-id='category'>Category</a></li>
            <li><a data-id='product'>Product</a></li>
            <li><a data-id='brand'>Brand</a></li>
            <li class='quote'>
              <i class='fa fa-search'></i>
              <input placeholder='Search products'/>
            </li>
          </ul>
        </div>
      </div>

    </div><!--end of container-fluid-->
  </header>

     

  <div class="nav-black"><!--id="nav-content"-->
    


    <!-- Navigation -->
      <ul id='category' class='active'>
    	 <li class="mymenu"><a data-id='add_category'><span><i class="fa fa-plus"></i>Add Category</span></a></li>
        <li class="mymenu"><a data-id="edit_category"><span><i class="fa fa-pencil"></i>Edit Category</span></a></li>
        <li class="mymenu"><a data-id="delete_category"><span><i class="fa fa-times"></i>Delete Category</i></span></a></li>
      </ul>
    

    <ul id='product'>
       <li class="mymenu profile"><a data-id='add_product'><span><i class="fa fa-plus"></i>Add New Product</span></a></li>
        <li class="mymenu"><a data-id='add_image'><span><i class="fa fa-camera"></i>Add Product Images</span></a></li>
        <li class="mymenu"><a data-id='edit_product'><span><i class="fa fa-pencil"></i>Edit Product</i></span></a></li>
         <li class="mymenu"><a data-id="delete_product"><span><i class="fa fa-times"></i>Delete Product</i></span></a></li>
      </ul>
  

    
      <ul id='brand'>
       <li class="mymenu profile"><a data-id='add_brand'><span><i class="fa fa-plus"></i>Add</span></a></li>
      </ul>
       
   </div>

  <!-- <form action='admin_database.php' method='post'> -->
   <div class='edit_blocks'>
   
      <div class='category active'>
        
        <div id='add_category'>
          <table>
            <tr>
              <td>Select Root Category</td>
              <td>
                <select id='root_category'>
                  <option>Clothes</option>
                  <option>Footwear</option>
                  <option>Accessory</option>
              </td>
            </tr>
            <tr>
              <td>Name</td>
              <td><input class='form-control' id='category_name'/></td>
            </tr>
            <tr>
              <td>Description</td>
              <td><textarea rows='5' cols='70' id='category_description'></textarea></td>
            </tr>
            <tr>
              <td><button class='btn btn-success' id='btn_add_category'>Add Category</button></td>
            </tr>
          </table>
        </div>

        <div id='edit_category'>
          <table>
          <?php
              include('show_categories.html');
            ?><tr>
              <td colspan='13'><hr/></td>
            </tr>
            <tr>
              <td>Edit Information</td>
            </tr>
           <tr>
              <td>Name</td>
              <td><input class='form-control' id='edit_name'/></td>
            </tr>
            <tr>
              <td>Description</td>
              <td><textarea rows='5' cols='70' id='edit_description'></textarea></td>
            </tr>
            <tr>
            <td><button class='btn btn-success' id='btn_edit_category'>Edit Category</button></td>
            </tr>
          </table>
        </div>

        <div id='delete_category'>
          <table>
            <?php
              include('show_categories.html');
            ?><tr>
              <td><button class='btn btn-success' id='btn_delete_category'>Delete Category</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class='product'>
        <div id='add_product'>
          <table>
            <?php
              include('show_categories.html');
            ?><tr>
              <td>Name</td>
              <td><input class='form-control' id='product_name'/></td>
            </tr>
            <tr>
              <td>Description</td>
              <td><textarea rows='5' cols='70' id='product_description'></textarea></td>
            </tr>
            <tr>
              <td>Cost</td>
              <td><input class='form-control' id='product_cost'/></td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td><input class='form-control' id='product_quantity'/></td>
            </tr>
            <tr>
              <td>Weight</td>
              <td><input class='form-control' id='product_weight'/></td>
            </tr>
            <tr>
              <td>Model No</td>
              <td><input class='form-control' id='product_model_no'/></td>
            </tr>
            <tr>
              <td>Set Product as New from Date</td>
              <td><input class='dp' id='product_created_at'/></td>
            </tr>
            <tr>
              <td>Set Product as New to Date</td>
              <td><input class='dp'/></td>
            </tr>
            <tr>
              <td>Search Keywords</td>
              <td><input class='form-control' id='search_keyword'/></td>
            </tr>
            <tr>
              <td colspan='13'><hr/></td>
            </tr>
            <tr>
              <td>Product Attributes</td>
            </tr>
             <tr>
              <td>Attribute Name</td>
              <td><input class='form-control' id='feature_name'/></td>
            </tr>
             <tr>
              <td>Atrribute Value</td>
              <td><input class='form-control' id='feature_value'/></td>
            </tr>
            <tr>
              <td><button class='btn btn-success' id='btn_add_product'>Add Product</button></td>
            </tr>
          </table>
        </div>
        
        <div id='add_image'>
          <form action='admin.php' method='post'  enctype="multipart/form-data">
          <table>
             <?php
              include('show_categories.html');
             ?>
             <tr>
               <td>Select Product</td>
              <td>
                <select name='product_name'>
                  <option>Select</option> 
                </select>  
              </td>
            <tr>
              <td>Main Image</td>
              <td><input type = 'file' id='m_image' name='m_image'/></td>
              <!-- <td><button type ='submit' id='btn_upload_mimage' name='upload_mimage'>Upload MImage</button></td> -->


              <!-- <td><input type = 'file' id='image' name='image'/></td> -->
             <!--  <td><button class='btn btn-success' id='upload_mimage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <td>Thumbnail Image 1</td>
              <td><input type = 'file' id='t_image_1' name='t_image_1'/></td>
              <!-- <td><button type ='submit' id='btn_upload_timage' name='upload_timage'>Upload TImage</button></td> -->

              
              <!-- <td><input type = 'file'/></td> -->
              <!-- <td><button class='btn btn-success' id='upload_timage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <td>Thumbnail Image 2</td>
              <td><input type = 'file' id='t_image_2' name='t_image_2'/></td>
              <!-- <td><button type ='submit' id='btn_upload_timage' name='upload_timage'>Upload TImage</button></td> -->

              
              <!-- <td><input type = 'file'/></td> -->
              <!-- <td><button class='btn btn-success' id='upload_timage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <td>Thumbnail Image 3</td>
              <td><input type = 'file' id='t_image_3' name='t_image_3'/></td>
              <!-- <td><button type ='submit' id='btn_upload_timage' name='upload_timage'>Upload TImage</button></td> -->

              
              <!-- <td><input type = 'file'/></td> -->
              <!-- <td><button class='btn btn-success' id='upload_timage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <td>Zoomer Image 1</td>
              <td><input type = 'file' id='z_image_1' name='z_image_1'/></td>
              <!-- <td><button type ='submit' id='btn_upload_zimage' name='upload_zimage'>Upload ZImage</button></td> -->

              
              <!-- <td><input type = 'file'/></td> -->
              <!-- <td><button class='btn btn-success' id='upload_zimage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <td>Zoomer Image 2</td>
              <td><input type = 'file' id='z_image_2' name='z_image_2'/></td>
              <!-- <td><button type ='submit' id='btn_upload_zimage' name='upload_zimage'>Upload ZImage</button></td> -->

              
              <!-- <td><input type = 'file'/></td> -->
              <!-- <td><button class='btn btn-success' id='upload_zimage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <td>Zoomer Image 3</td>
              <td><input type = 'file' id='z_image_3' name='z_image_3'/></td>
              <!-- <td><button type ='submit' id='btn_upload_zimage' name='upload_zimage'>Upload ZImage</button></td> -->

              
              <!-- <td><input type = 'file'/></td> -->
              <!-- <td><button class='btn btn-success' id='upload_zimage'>Upload Image</button></td> -->
            </tr>
            <tr>
              <!-- <td><button class='btn btn-success' id='upload_image'>Upload Images</button></td> -->
              <td><button type ='submit' id='btn_upload_image' name='upload_image'>Upload Images</button></td>
            </tr>
          </table>  
          </form>
        </div>


        <div id='edit_product'>
         <table>
            <?php
              include('show_categories.html');
            ?>
            <tr>
               <td>Select Product</td>
              <td>
                <select name='product_name'>
                  <option>Select</option> 
                </select>  
              </td>
            </tr>
            <tr>
              <td><button class='btn btn-success pull-left' id="btn_info_edit"
                onclick="document.getElementById('info_edit').style.display='block';
                        document.getElementById('feature_edit').style.display='none';" >
                        Edit Product information
                  </button></td>
              <td><button class='btn btn-success pull-right' id="btn_feature_edit"
                onclick="document.getElementById('info_edit').style.display='none';
                        document.getElementById('feature_edit').style.display='block';">
                        Add more Features
              </button></td>
          </table>
          <table id="info_edit">
            
          </table>
          <table id='feature_edit'style='display:none;'>
            <tr>
              <td>Product Attributes</td>
            </tr>
             <tr>
              <td>Attribute Name</td>
              <td><input class='form-control' id='feature_name'/></td>
            </tr>
             <tr>
              <td>Atrribute Value</td>
              <td><input class='form-control' id='feature_value'/></td>
            </tr>
            <tr>
              <td><button class='btn btn-success' id='btn_add_feature'>Add Feature</button></td>
            </tr>
          </table>
        </div>

        <div id='delete_product'>
          <table>
            <?php
              include('show_categories.html');
             ?><tr>
               <td>Select Product</td>
              <td>
                <select name='product_name'>
                  <option>Select</option> 
                </select>  
              </td>
            </tr>
            <tr>
              <td><button class='btn btn-success' id='btn_delete_product'>Delete Product</button></td>
            </tr>
          </table>
        </div>
      </div>

      <div class='brand'>
        <div id='add_brand'>
          Add brand
        </div>
      </div>


    
   </div>
   <!--  </form>  -->

<!--///////////////////////////////////////////   php    ///////////////////////////////////////////-->


<?php  

  // require_once('dbconnection.php');
  // $obj = new DBConnect();
  // $query="";

  // if(isset($_POST['upload_image'])) 
  // {

  //    $m_image_name=$_FILES['m_image']['name'];
  //    $tmp_name=$_FILES['m_image']['tmp_name'];
  //    $path='uploads/';
  //    move_uploaded_file($tmp_name,$path.$m_image_name);

  //    $t_image_name=$_FILES['t_image']['name'];
  //    $tmp_name=$_FILES['t_image']['tmp_name'];
  //    $path='uploads/';
  //    move_uploaded_file($tmp_name,$path.$t_image_name);

  //    $z_image_name=$_FILES['z_image']['name'];
  //    $tmp_name=$_FILES['z_image']['tmp_name'];
  //    $path='uploads/';
  //    move_uploaded_file($tmp_name,$path.$z_image_name);

  //    $im=$path.$m_image_name;
  //    $it=$path.$t_image_name;
  //    $iz=$path.$z_image_name;

  //    $query = "Select `product_id` from `product` where `product_name`='$_POST[product_name]' ";

  //   if($result= $obj->sql_select($query))
  //   {
  //     $row = mysqli_fetch_assoc($result);
  //     $query = "Insert into `product_images` (`product_id`, `main_image`,`thumbnail_image`,`zoomer_image`) values ('$row[product_id]', '$im','$it','$iz')";
  //     if($obj->sql_update($query))
  //     {
  //       echo ("Your image has been inserted successfully");
  //     }
  //     else
  //     {
  //       echo ("There was some problem processing your request. Please try again later.");
  //     }
      
  //   }

  // }
  // else
  // {
  //    echo "hh";
  // }

?>


<?php

  if(isset($_POST['upload_image'])) 
  {

     $m_image_name=$_FILES['m_image']['name'];
     $tmp_name=$_FILES['m_image']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$m_image_name);

     $t_image_name_1=$_FILES['t_image_1']['name'];
     $tmp_name=$_FILES['t_image_1']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$t_image_name_1);

     $t_image_name_2=$_FILES['t_image_2']['name'];
     $tmp_name=$_FILES['t_image_2']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$t_image_name_2);

     $t_image_name_3=$_FILES['t_image_3']['name'];
     $tmp_name=$_FILES['t_image_3']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$t_image_name_3);

     $z_image_name_1=$_FILES['z_image_1']['name'];
     $tmp_name=$_FILES['z_image_1']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$z_image_name_1);

     $z_image_name_2=$_FILES['z_image_2']['name'];
     $tmp_name=$_FILES['z_image_2']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$z_image_name_2);

     $z_image_name_3=$_FILES['z_image_3']['name'];
     $tmp_name=$_FILES['z_image_3']['tmp_name'];
     $path='uploads/';
     move_uploaded_file($tmp_name,$path.$z_image_name_3);

  }
  // else
  // {
  //    echo "hh";
  // }

?>

<!--///////////////////////////////////////////   php    ///////////////////////////////////////////-->
 
</body>
</html>

<script src='js/jquery.js'></script>
<script src="js/jquery.min.js"></script>
<script src="js/zoomsl-3.0.min.js"></script>
<script src='js/jquery-1.10.2.min.js'></script>
<script src='js/bootstrap.js'></script>
<script src='js/admin.js'></script>
<script src='js/bootstrap-datepicker1.js'></script>
<script src='js/datepicker.js'></script>
<script>

$(document).ready(function(){

  $(".root").change(function(){
  
    var root = $(this).find("option:selected").val();
    console.log(root);
     $("select[name='category']").empty();
      optionsAsString = "<option>Select</option>";
      $("select[name='category']").append( optionsAsString );
    $.get("admin_database_string.php", {root_name:root}, function(data,status){
     console.log(data);
      // optionsAsString = "<option>"+data+"</option>";
      $("select[name='category']").append( data );

    })
  });
//===============================================================================//
  $("select[name='category']").change(function(){
  
    var category = $(this).find("option:selected").val();
    // console.log(category);
    $("select[name='product_name']").empty();
      optionsAsString = "<option>Select</option>";
      $("select[name='product_name']").append( optionsAsString );

    $.get("admin_database_string.php", {category_name:category}, function(data,status){
      // console.log(data);
      // optionsAsString = "<option>"+data+"</option>";
      $("select[name='product_name']").append( data );

    })
  });
  //=====================================================================================//
 //add category
  $("#btn_add_category").click(function(){
    var category = $("#category_name").val();
    var description = $("#category_description").val();
    var root = $("#root_category").find("option:selected").val();
    console.log("Hi");
    
    $.get("admin_database.php",
      {add_category:true,category:category, category_description:description, root_category:root},
      function(data,status){
      alert(data);
      
    })
 
});
  //===========================================================================================//
  //edit category
  $("#btn_edit_category").click(function(){
    var name = $("#edit_name").val();
    var description = $("#edit_description").val();
    var category = $("#edit_category select[name='category']").find("option:selected").val();
    console.log(category);
    
    $.get("admin_database.php",
      {edit_category:true,category:category, edit_description:description,edit_name:name},
      function(data,status){
      alert(data);
      

    })

});

  //===========================================================================================//
  //delete category
  $("#btn_delete_category").click(function(){
    
    var category = $("#delete_category select[name='category']").find("option:selected").val();
    console.log(category);
    
    $.get("admin_database.php",
      {delete_category:true,category:category},
      function(data,status){
        alert(data);
    })

});
  //===========================================================================================//
  //add product
  $("#btn_add_product").click(function(){

    var category = $("#add_product select[name='category']").find("option:selected").val();
    var product_name = $('#product_name').val();
    var product_description = $('#product_description').val();
    var product_cost = $('#product_cost').val();
    var product_quantity = $('#product_quantity').val();
    var product_weight = $('#product_weight').val();
    var product_model_no = $ ('#product_model_no').val();
    var product_created_at = $('#product_created_at').val();
    var search_keyword = $('#search_keyword').val();
    var feature_name = $('#feature_name').val();
    var feature_value = $('#feature_value').val();
    console.log(product_name);

    $.get("admin_database.php",
    {add_product:true,category:category,product_name:product_name,product_description:product_description,product_quantity:product_quantity,product_cost:product_cost,product_weight:product_weight,product_model_no:product_model_no,product_created_at:product_created_at,search_keyword:search_keyword,feature_name:feature_name,feature_value:feature_value},
      function(data,status){
        alert(data);
    })


  });

//===========================================================================================//

//add image
 /*$("#upload_image").click(function(){
    var product = $("#add_image select[name='product_name']").find("option:selected").val();
    var image = $("#image").val();
    console.log(image);//The browser changes the real path to C:\fakepath\  so malicious sites can't use javascript to glean information about your computer's directory structure.
    
    $.getJSON("admin_database.php",
      {upload_image:true,image:image,product:product},
      function(data,status){
      alert(data.msg);
      console.log(data.msg);
    })

});*/

//??????????????????????  kajal   ?????????????????????????????????????????///

  $("#btn_upload_image").click(function(){

    var product_name = $("#add_image select[name='product_name']").find("option:selected").val();
    var main_image = $("#m_image").val();
    var thumb_image_1 = $("#t_image_1").val();
    var thumb_image_2 = $("#t_image_2").val();
    var thumb_image_3 = $("#t_image_3").val();
    var zoomer_image_1 = $("#z_image_1").val();
    var zoomer_image_2 = $("#z_image_2").val();
    var zoomer_image_3 = $("#z_image_3").val();
    console.log(main_image);

    $.get("admin_database.php",{ add_image:true, product_name:product_name, main_image:main_image, thumb_image_1:thumb_image_1, thumb_image_2:thumb_image_2, thumb_image_3:thumb_image_3, zoomer_image_1:zoomer_image_1, zoomer_image_2:zoomer_image_2, zoomer_image_3:zoomer_image_3 },
      function(data,status){
        alert(data);
        
      });

  });


//=========================================================================================//


 $("#edit_product select[name='product_name']").change(function()
 {
   var product = $(this).find("option:selected").val();
   console.log(product);
   $.get("admin_database_string.php",
      {show_edit_product:true,product:product},
      function(data,status){
        console.log(data);
        $("#info_edit").empty();
      $("#info_edit").append(data);
      console.log($("#btn_edit_product").html());
      
    })
 });

 //===========================================================================================//

 //  edit product


//===========================================================================================//

//delete product

  $("#btn_delete_product").click(function(){

    var product_name = $("#delete_product select[name='product_name']").find("option:selected").val();
    console.log(product_name);

    $.get("admin_database.php",{ delete_product:true, product_name:product_name },function(data,status){
          alert(data);
    });


  });

  });


</script>


<script type="text/javascript">
//because the buton is dynamically loaded script couldnt find it on initial load. hence this is how it needs to be identified
   $(document).on("click","#btn_edit_product",function(){
    
     
    var product_id = $('#pid').val();
    var product_name = $('#edit_pname').val();
    var product_description = $('#edit_pdescription').val();
    var product_cost = $('#edit_cost').val();
    var product_quantity = $('#edit_quantity').val();
    var product_weight = $('#edit_weight').val();
    var product_model_no = $ ('#edit_model_no').val();
    var product_created_at = $('#edit_created_at').val();
    var search_keyword = $('#edit_search_keyword').val();
    var feature_name = $('#edit_feature_name').val();
    var feature_value = $('#edit_feature_value').val();
    console.log(product_created_at);

    $.get("admin_database.php",
      {edit_product:"true",product_id:product_id,product_name:product_name,product_description:product_description,product_quantity:product_quantity,product_cost:product_cost,product_weight:product_weight,product_model_no:product_model_no,product_created_at:product_created_at,search_keyword:search_keyword,feature_name:feature_name,feature_value:feature_value},
      function(data,status){
        
        alert(data);
    });
  


  // });

// $("#btn_feature_edit").click(function()
// {
//    var product = $("#edit_product select[name='product_name']").find("option:selected").val();
//    console.log(product);
//    $.get("admin_database.php",
//       {edit_product:"true",product:product},
//       function(data,status){
//       $("#info_edit tbody").append(data);
      
//     })
//  })



});
</script>


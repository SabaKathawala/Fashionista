<?php 
  require_once("dbconnection.php");
  $obj = new DBConnect();
  session_start();
  
  if(!(isset($_SESSION['cart_quantity']) || isset($_COOKIE['cart_quantity']))){
    echo "<script type='text/javascript'>alert('Your cart is empty. No orders can be placed');
       window.location.href = 'add_to_cart.php';
    </script>";
   
  }
  else{
   
     // SELECT * FROM `order` JOIN `cart` WHERE `order`.`customer_id` = `cart`.`customer_id` AND `cart`.`customer_id`= 9
//GROUP BY `product_id`;

    if(isset($_SESSION['login']) && isset($_POST['total'])){
      $query = "Select * from `order` where `customer_id` = '$_SESSION[customer_id]'";
      $result = $obj->sql_select($query);
      $total = $_POST['total'];
      $date = date('Y-m-d');
      echo "<script>alert($total);</script>";
      if(mysqli_num_rows($result) == 0 ){
        $query = "Insert into `order`(`customer_id`, `customer_type`, `order_date`, `total_amount`,`payment_method`) VALUES ('$_SESSION[customer_id]','registered','$date','$total','khaali')";
        $obj->sql_update($query);
        $query =  "Select `order_id`,`product_id`,`quantity` from `order` JOIN `cart`
                  WHERE `order`.`customer_id` = `cart`.`customer_id` AND `cart`.`customer_id`= '$_SESSION[customer_id]'
                  GROUP BY `product_id`";
        $result = $obj->sql_select($query);
        while($row = mysqli_fetch_assoc($result)){
          $query = "Insert into `order_details`(`order_id`, `product_id`, `product_quantity`) VALUES ('$row[order_id]', '$row[product_id]', '$row[quantity]')";
          $obj->sql_update($query);
        }
      }
      else{
        $query = "Update `order` set `order_date` = '$date', `total_amount`='$total' where `customer_id`= '$_SESSION[customer_id]'";
         $obj->sql_update($query);
         $query =  "Select `order_id`,`product_id`,`quantity` from `order` JOIN `cart`
                  WHERE `order`.`customer_id` = `cart`.`customer_id` AND `cart`.`customer_id`= '$_SESSION[customer_id]'
                  GROUP BY `product_id`";
        $result = $obj->sql_select($query);
        while($row = mysqli_fetch_assoc($result)){
             $query = "Delete from `order_details` where `order_id` = '$row[order_id]' AND `product_id` = '$row[product_id]'";
            $obj->sql_update($query);
        $query = "Insert into `order_details`(`order_id`, `product_id`, `product_quantity`) VALUES ('$row[order_id]', '$row[product_id]', '$row[quantity]')";
        $obj->sql_update($query);
        }
      }
      // $order = true;
    }
    else if(isset($_COOKIE['g_c']) && isset($_POST['total'])){
      $total = $_POST['total'];
      $date = date('Y-m-d');
      $query = "Select * from `order` where `customer_id` = '$_COOKIE[g_c]'";
      $result = $obj->sql_select($query);
      if(mysqli_num_rows($result) == 0 ){      
        $date = date('Y-m-d');
        $query = "Insert into `order`(`customer_id`, `customer_type`, `order_date`, `total_amount`,`payment_method`)
                              VALUES ('$_COOKIE[g_c]','guest','$date','$total','khaali')";
        $obj->sql_update($query);
        $query =  "Select `order_id`,`product_id`,`quantity` from `order` JOIN `cart`
                  WHERE `order`.`customer_id` = `cart`.`customer_id` AND `cart`.`customer_id`= '$_COOKIE[g_c]'
                  GROUP BY `product_id`";
        $result = $obj->sql_select($query);
        while($row = mysqli_fetch_assoc($result)){
           $query = "Insert into `order_details`(`order_id`, `product_id`, `product_quantity`) VALUES ('$row[order_id]', '$row[product_id]', '$row[quantity]')";
          $obj->sql_update($query);
        }
      }
      else{
       $query = "Update `order` set `order_date` = '$date', `total_amount`='$total' where `customer_id`= '$_COOKIE[g_c]'";
        $obj->sql_update($query);
        $query =  "Select `order_id`,`product_id`,`quantity` from `order` JOIN `cart`
                  WHERE `order`.`customer_id` = `cart`.`customer_id` AND `cart`.`customer_id`= '$_COOKIE[g_c]'
                  GROUP BY `product_id`";
        $result = $obj->sql_select($query);
        while($row = mysqli_fetch_assoc($result)){
          $query = "Delete from `order_details` where `order_id` = '$row[order_id]' AND `product_id` = '$row[product_id]'";
          $obj->sql_update($query);
        $query = "Insert into `order_details`(`order_id`, `product_id`, `product_quantity`) VALUES ('$row[order_id]', '$row[product_id]', '$row[quantity]')";
          $obj->sql_update($query);
        }
      }
      // $order = true;
    }
  }
  
?>
<?php
  include_once('Header.php');
  include_once('sign_in.html');
  include_once('feedback.php');

?>
 
<html>
  <head>
      <link type='text/css' rel='stylesheet' href='css/bootstrap.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'/> 
      <link rel="stylesheet" type="text/css" href="css/header.css">
      <!-- <link type='text/css' rel='stylesheet' href='css/fashionista_clothes_click_css.css'/> -->
      <script src='js/jquery.js'></script>
      <title>
        Fashionista | Clothes...Place_Order
      </title>
      <meta name="viewport" content="width=device-width" />

<style type="text/css">


/****************************************************************************************************/

/***********************************************************************************************/

/*.r1
{
   box-shadow: 0 0 30px rgb(253, 106, 106) ;
}*/

/*========================================================================================================*/

.row {
  margin-right: 0;  
}

.pay_method img:hover
{
    cursor: pointer;
}

/*header{
  position: fixed;
  top:0;
  left:0;
  background: url('images/fashionista_header_bg.jpg');
  width:100%;
  height:192px;
  z-index: 100;
}



.header-ul{
  margin-top: 8px;
  list-style-type: none;
  word-spacing: 10px;
}

.header-ul li{
  display: inline-block;
  padding-left: 15px;
}

.header-ul li a{
  padding-left: 2px;
  padding-right: 2px;
  color:#836953;
  font-size: 18px;
  font-family:'Oregon LDO';
  text-transform: uppercase;
  letter-spacing: 1px;
}

.header-ul li a:hover{
  text-decoration: none;
  background-color: #321414;
}

.logo{
  margin-top: -20px;
  text-align: center;
}
.logo a{
  font-size: 95px;
  letter-spacing: 3px;
  color:rgb(252, 136, 136);
  font-family: 'Billy Argel Font';
}

.logo a:hover{

  text-decoration: none;
  color:rgb(253, 106, 106);

}
.caption{
  font-family: 'Oregon LDO Vanishing Bold Oblique_0';
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  word-spacing: 5px;
  text-transform: lowercase;
  margin-top: -40px;
  color: rgb(146, 45, 101);
}

.options{
  margin-top: -10px;
  list-style-type: none;
  text-align: center;
  word-spacing: 60px;
}

.options li{
  
  display: inline-block;
  padding-right:40px; 
}

.options li a{
  color:#695C58;
  font-size: 18px;
  font-weight: bold;
  font-family: 'Oregon LDO Light Oblique';
}

.options li a:hover{
  text-decoration: none;
  color:#543d37;
}*/

/***************************************              NEW           ****************************************/

.container-fluid{
  padding: 0;
}

.container-fluid .row {
  margin: 0;
}



footer
{
    background: url('images/footer-bg.jpg') repeat;   
    color: #afa38a;
    border-top: 6px solid #1D0202;
    border-bottom: 12px solid #1D0202;
    padding-bottom: 20px;
}

footer .title {
background: url("images/footer-title-border.png") bottom repeat-x;
color: #221d1b;
font: normal 22px 'Norican', cursive;
line-height: 50px;
padding: 0 0 6px;
margin: 8px 0 30px;
width: 80%;                    
text-align: center;
text-shadow: -1px -1px 0 #634e37;
}

footer .title span{
background: url("images/footer-title.jpg") repeat-x;
display: block;
padding: 0px 10px;
}


footer .glyphicon
{
  margin-right: 30px;
  font-size: 17px;
}

footer .fa
{
  margin-right: 30px;
  font-size: 23px;
  background: #afa38a;
  color:#221d1b;
  padding: 5px;
}
footer .fa:hover
{
  background: #659c28;
}
footer a
{
  color: #afa38a;
}
footer a:hover
{
  color: #659c28;
}
footer p
{
  color: #afa38a;
  width: 300px;
}
footer .pay >a
{
  padding-right: 15px;
}

/***************************************************************************************************/

.popupbox
{
width: 960px;
margin-left: 190px;
margin-top: 200px;
}

/*********************************************************************************************/

.popupbox .panel-title
{
font-size: 18px;
letter-spacing: 2px;
color: white;
font-family: 'Quikhand'; 
font-weight: bold;
}
.popupbox .panel-title>a:hover
{
  text-decoration: none;
}
.popupbox .panel-body
{
  width: 960px;
  background: url('images/hol.jpg') ;
}
.popupbox .panel-heading
{
  background: url('images/ribbon7.jpg');
  opacity: 0.8;
    
  /*box-shadow: 0 0 30px rgb(146, 45, 101) inset;*/
}
table
{
  color:rgb(146, 45, 101);
  font-family: 'Oregon LDO Light Oblique';
  font-size: 20px;
  letter-spacing: 1px;
  font-weight: bold;
}

/*****************************************************************************/
.order_t tr
{
   /* max-width: 200px;
    width: 200px;*/
    padding-bottom: 60px;
    font-size: 20px;
    text-align: left;
}
.delivery td
{
    width: 200px;
    padding-left: 30px;
    padding-bottom: 20px;
    height: 50px;
}
.delivery td>input, .city
{
    width: 300px;
    height: 40px;
}
.popupbox .btn-success
{
    margin-left: 350px;
    width: 250px;
    height: 45px;
    font-size: 20px;
    /*visibility: hidden;*/
/*    background-color: #1D0202;border-color: #1D0202;*/
}
.continue
{
    visibility: hidden;
}
/*.btn-success:hover
{
    background-color: #1D0202;
    border-color: #1D0202;
}*/

.order_sum td
{
    padding-left: 25px;
}
.pay_method td
{
    padding-left: 120px;
    width: 200px;
}

/*****************************************************************************************************/

body
{
    background: transparent url('images/hol-site-bg-pattern.jpg') repeat top center;
}

/*********************************************************************************************/

</style>

</head>

<body>   

  

<!-- ************************************************************************************************ -->

 

<!--   <header>
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
          <a href =''>Fashionista</a>
        </div>
      </div>

      <div class='row'>
        <div class='col-md-12 caption'>
          <label>Live With Fashion</label>
        </div>
      </div>

      <div class='row'>
        <div class='col-md-11'>
          <ul class='options'>

            <li><a href='fashionista_clothes.html'>Clothes</a></li>
            <li><a href=''>Shoes</a></li>
            <li><a href=''>Accessories</a></li>
            <li class='quote'>
                <i class='fa fa-search'></i>
                <input placeholder='Search products'/>
            </li>
          
          </ul>
        </div>
      </div>

    </div>
  </header> -->


<!--****************************   collapse    **********************************-->


<br/><br/>
<div class='popupbox'>   
    <div class=''>
<div class="panel-group" id="accordion">


<div class=''>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> -->
          1. SIGN IN, check out faster!
        <!-- </a> -->
      </h4>
    </div>
    <div id="collapseTwo" >   <!-- class="panel-collapse collapse" -->
      <div class="panel-body">
         <center><table class='order_t'>
             <tr>
                <td><br/><input type='radio' id='conti' name='one[1]'/>  Already Logged In</td>
              </tr>
              <tr>
                 <td><input id='sign_order' type='radio' name='one[1]'/> Log In</td>
              </tr>
              <tr>
                 <td><input type='radio' name='one[1]'/> Shop as Guest </td>
              </tr>
              <tr>   
                 <td id='guest'>Enter your email:</td>
                 <td><input class='form-control'/></td>
              </tr>
              <tr>
                 <!-- <td style='text-align: center;'> or </td> -->
                 <td><input id='cacc_order' type='radio' id='conti' name='one[1]'/>Sign Up</td>
             </tr>
           </table></center>
         <br/>
         <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><button class='continue btn btn-success'>Continue</button></a>       
      </div>
    </div>
  </div>

</div>

<div class=''>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> -->
          2. DELIVERY ADDRESS
        <!-- </a> -->
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <form id='deliver'>
          <center><table class='delivery'>
             <tr>
                  <td><label>Name</label></td>
                  <td><input name='name' type='text'/></td>
             </tr>
             <tr>
                  <td><label>Pincode</label></td>
                  <td><input name='pin' type='text'/></td>
             </tr>
             <tr>
                  <td><label>Address</label></td>
                  <td><textarea name='addr' rows='5' cols='40'></textarea></td>
             </tr>
             <tr>
                  <td><label>City</label></td>
                  <td>
                      <select class='city'>
                          <option>Jaipur</option>
                          <option>Udaipur</option>
                          <option>Kota</option>
                      </select>
                  </td>
             </tr>
             <tr>
                  <td><label>State</label></td>
                  <td>
                      <select class='city'>
                          <option>Rajasthan</option>
                          <option>Punjab</option>
                          <option>Uttar-Pradesh</option>
                      </select>
                  </td>
             </tr>
             <tr>
                  <td><label>Country</label></td>
                  <td><input name='country' type='text'/></td>
             </tr>
             <tr>
                  <td><label>Phone</label></td>
                  <td><input name='phone' type='text'/></td></button>
             </tr>
          </table></center>
        
          <br/>
          <button type='submit'id='deliver_button' class='btn btn-success'>SAVE & CONTINUE<a data-toggle="collapse" id="delivery_toggle" data-parent="#accordion" href=""></a></button>
          <br/>
          </form>
      </div>
    </div>

  </div>

</div>

<div class=''>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> -->
          3. ORDER SUMMARY
        <!-- </a> -->
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
          <center><!-- <div class='popupbox'> -->
      <!--   <br/> -->
    <table class='table order_sum'>
      <tr rowspan='2'>
          <th colspan='20'></th>
          <th colspan='25'><center>ITEM</center></th>
          <th colspan='18'><center>QTY</center></th>
          <th colspan='9'><center>PRICE</center></th>
          <th colspan='58' style="padding-top:12px;padding-bottom:4px;">DELIVERY DETAILS</th>
          <th colspan='18'>SUBTOTAL</th>
          <th colspan='10'>REMOVE</th>
      </tr>
       
      <?php 
          $total_price = 0;
          if(!isset($_SESSION))
            session_start();
          
          //session exists    
          if(isset($_SESSION['login'])):
            
          $query =  "Select `product_id`,`product_quantity` from `order` JOIN `order_details`
                  WHERE `order`.`customer_id` = '$_SESSION[customer_id]' AND `order_details`.`order_id` = `order`.`order_id` ";       
            $result = $obj->sql_select($query);
            if(mysqli_num_rows($result)!=0):
            
              while($row = mysqli_fetch_assoc($result)):
                $query = "Select `main_image` from `product_images` where `product_id`='$row[product_id]'";
                $result_image = $obj->sql_select($query);
                $row_image = mysqli_fetch_assoc($result_image);
                $query = "Select * from `product` where `product_id`='$row[product_id]'";
                $result_info = $obj->sql_select($query);
                $row_info = mysqli_fetch_assoc($result_info);
      ?>
        <tr id="r<?php echo $row['product_id'];?>">
          <td colspan='20' style="padding-bottom:20px;"><img class="" src="<?php echo $row_image['main_image'];?>"/></td>
          <td colspan='25'><center><?php echo $row_info['product_name'];?></center></td>
          <td colspan='18'><center><label style="width:30px;"><?php echo $row['product_quantity']; ?> </label></center></td>
          <td colspan='9'><center>$<?php echo $row_info['product_cost'];?></center></td>
          <td colspan='58' style="padding-top:10px;">$3<br/>Delivery in 6 to 7 business days</td>
          <td colspan='18' class='price'>$<?php $total_price += $row['product_quantity']*$row_info['product_cost'];
                            echo $row['product_quantity']*$row_info['product_cost']; ?></td>
          <td colspan='10'><i class='fa fa-times' id='<?php echo $row['product_id']; ?>'></i></td>
        
       </tr>
       <?php
                endwhile;
                //no products in customer cart
              else:
        ?>
      <tr>
        <td colspan='54' rowspan='2' style="padding-top:10px;">
          <?php
            echo "<script type='text/javascript'>alert('Sorry!! No orders can be placed');
                    window.location.href = 'add_to_cart.php';
                  </script>";
          ?>
      </td>
      </tr>
        <?php
              endif;
            //session doesn't exist    
            else:
             //cookie set
              if(isset($_COOKIE['g_c'])):
          
                //product_id present
                
          $query =   "Select `product_id`,`product_quantity` from `order` JOIN `order_details`
                  WHERE `order`.`customer_id` = '$_COOKIE[g_c]' AND `order_details`.`order_id` = `order`.`order_id` ";       
                $result = $obj->sql_select($query);
                while($row = mysqli_fetch_assoc($result)):
                  $query = "Select `main_image` from `product_images` where `product_id`='$row[product_id]'";
                  $result_image = $obj->sql_select($query);
                  $row_image = mysqli_fetch_assoc($result_image);
        ?>
        <tr id="r<?php echo $row['product_id'];?>">
          <td colspan='20' style="padding-bottom:20px;"><img class="" src="<?php echo $row_image['main_image'];?>"/></td>
        <?php
        
                $query = "Select * from `product` where `product_id`='$row[product_id]'";
                $result_info = $obj->sql_select($query);
                $row_info = mysqli_fetch_assoc($result_info);
        ?>
          <td colspan='25'><center><?php echo $row_info['product_name'];?></center></td>
          <td colspan='18'><center><input type = 'text' value = '<?php echo $row['product_quantity']; ?>' style="width:30px;"/></center></td>
          <td colspan='9'><center>$<?php echo $row_info['product_cost'];?></center></td>
          <td colspan='58' style="padding-top:10px;">$3<br/>Delivery in 6 to 7 business days</td>
          <td colspan='18' class='price'>$<?php $total_price += $row['product_quantity']*$row_info['product_cost'];
                            echo $row['product_quantity']*$row_info['product_cost']; ?></td>
          <td colspan='10'><i class='fa fa-times' id='<?php echo $row['product_id']; ?>'></i></td>

       </tr>
       <?php
       
              endwhile;
               //no products in customer cart //cookie not set
            else:
        ?>
      <tr>
        <td colspan='54' rowspan='2'  style="padding-top:10px;">
          <?php
            echo "<script type='text/javascript'>alert('Sorry!! No orders can be placed');
                  window.location.href = 'add_to_cart.php';
                 </script>";
          ?>
      </td>
      </tr>
      <?php endif;//cookie
        endif; //outermost
        if($total_price!=0):
      ?>
      <tr style="border-top: solid 2px black;">
        <td colspan='130' style='text-align:right;font-weight:bold'>Estimated total : </td>
        <td>$</td>
        <td colspan='17' id="total">$<?php echo $total_price?></td>
      </tr>
    
    
     
       <?php endif;
       ?>
       </table> 
   
  </div></center>
          <br/>
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><button class='btn btn-success'>Payment</button></a>
      </div>
    </div>
  </div>

</div>

<div class='acc'>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"> -->
          4. PAYMENT METHOD
        <!-- </a> -->
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
          <table class='pay_method'>
             <tr>
                  <td><img src="images/visa.png"/></td>
                  <td><img src="images/pay_3.png"/></td>
                  <td><img src="images/pay_4.png"/></td>
                  <td><img src="images/pay_5.png"/></td>
             </tr>
          </table>      
      </div>
    </div>
  </div>

</div>

</div>
</div></div>
<br/><br/> 

<!--****************************   collapse    **********************************-->


  <footer>
    <div class='container-fluid'>
      <div class ='row'>
             <div class='col-md-12 col-xs-12'>
              <br/><br/>
              <div class='col-md-4 col-xs-4'>
                  <h4 class="title"> <span>About Us</span> </h4>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend enim a feugiat corrupti quos.</p>
              </div> 

              <div class='col-md-4 col-xs-4'>
                  <h4 class="title"> <span>Contact Information</span> </h4>
                  <span class="glyphicon glyphicon-envelope"></span><a href="www.facebook.com">designthemes@somemail.com</a><br/><br/>
                  <span class="glyphicon glyphicon-home"></span>2145 - 007 - 1566<br/><br/>
                  <span class="glyphicon glyphicon-phone-alt"></span>No 45, Season Street, Livingstone LA, Inc - 4502<br/><br/>
                  We're Social<br/><br/>
                  <a href="www.facebook.com"><i class='fa fa-facebook icon_1'></i></a>
                  <a href="www.twitter.com"><i class='fa fa-twitter icon_1'></i></a>
                  <a href="www.yahoo.com"><i class='fa fa-yahoo icon_1'></i></a>
                  <a href="www.google-plus.com"><i class='fa fa-google-plus icon_1'></i></a>
              </div>

              <div class='col-md-4 col-xs-4'>
                  <h4 class="title"> <span>Payment Method</span> </h4>
                  <div class='pay'><a href="www.w3school.com"><img src="images/visa.png"/></a>
                  <a href="www.w3school.com"><img src="images/pay_3.png"/></a>
                  <a href="www.w3school.com"><img src="images/pay_4.png"/></a>
                  <a href="www.w3school.com"><img src="images/pay_5.png"/></a></div>
              </div>

           </div>
        </div>
    </div>
  </footer>
 
<!--  **************************************************************************************************  -->

</body>
</html>


<script src='js/bootstrap.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src="js/zoomsl-3.0.min.js"></script>
<!-- <script src="js/js/masonry.pkgd.min.js"></script> -->
<script type="text/javascript" src="js/Home.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src='js/Place_Order_js.js'></script>
<script src="js/ValidateLogin.js"></script>
<script src="js/feedback_js.js"></script>
<script type="text/javascript">

$(document).on("click", 'td i', function(){

       var product_id = $(this).attr('id');
       $.get('logout.php',{arg3:product_id},function(data,status){
         var price = $("#r"+product_id).find(".price").html();
        // alert(price);
         price = price.replace('$','');
         var total_old = $("#total").html();
         total_old = total_old.replace('$','');
         var new_price = total_old - price;
         // alert(new_price+ " "+total_old)
         $("#total").html(new_price);
         $("#r"+product_id).remove();

         //alert("The selected product has been removed");
         if(new_price == 0){
          alert('Sorry!! No orders can be placed');
          window.location.href = "add_to_cart.php";
        } 

      });
 
  });

$('.pay_method img').click(function(){
     alert("Thank You for visiting our website :)");  
  });
</script>
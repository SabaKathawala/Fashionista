<?php
    include_once('Header.php');
        include_once('feedback.php');
        include_once('sign_in.html');
    require_once('dbconnection.php');
    $obj = new DBConnect();
?>
<html>
  <head>
      <link type='text/css' rel='stylesheet' href='css/bootstrap.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'/> 
      <link rel="stylesheet" type="text/css" href="css/header.css"/>
      <!-- <link type='text/css' rel='stylesheet' href='css/fashionista_clothes_click_css.css'/> -->
      <script src='js/jquery.js'></script>

      <title>
        Fashionista | Clothes...Add to Cart
      </title>
      <meta name="viewport" content="width=device-width" />

<style type="text/css">


/****************************************************************************************************/


/***********************************************************************************************/

/*.r1
{
   box-shadow: 0 0 30px rgb(253, 106, 106) ;
}*/

body , .ttt
{
   background: url('images/shoes/background.jpg') repeat top center;
}

/*========================================================================================================*/

.row {
  margin-right: 0;  
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
}

*/

/***************************************              NEW           ****************************************/

/*.container-fluid{
  padding: 0;
}

.container-fluid .row {
  margin: 0;
}


header{
  position: fixed;
  top:0;
  left:0;
  background: url('images/fashionista_header_bg.jpg') ;
  width:100%;
  height:160px;
  z-index: 5;
}



.header-ul{

  margin-top: 8px;
  list-style-type: none;
  word-spacing: 8px;
}

.header-ul li{
  display: inline-block;
  padding-left: 15px;
}

.header-ul li a{
  padding-left: 2px;
  padding-right: 2px;
  color:#836953;
  font-size: 16px;
  font-family:'Oregon LDO';
  text-transform: uppercase;
  letter-spacing: 1px;
}

.header-ul li a:hover{
  text-decoration: none;
  background-color: #321414;
}

.logo{
  margin-top: -24px;
  }
.logo a{
  font-size: 80px;
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
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  word-spacing: 5px;
  text-transform: lowercase;
  margin-top: -40px;
  color: rgb(146, 45, 101);
}

.options{
  margin-top: -15px;
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

/******************************************************************************************************/

/*.quote{
  text-align: center;
  font-family: 'Quikhand';
  text-transform: capitalize;
  word-spacing: 10px;
  color:rgb(204, 101, 87);
}

.quote i{
  font-size: 20px;
  font-weight: bold;
  color:#695C58;
}

.quote input{
  width:200px;
  text-align: center;
  color:black;
  border-color: black;
  border-radius: 10px;
  height:30px;
  font-size: 18px;
}*/

/*::-webkit-input-placeholder {
   color: rgb(204, 101, 87);
}*/

/* Firefox 18- */
/*:-moz-placeholder { 
   color: rgb(204, 101, 87);  
}*/

/* Firefox 19+ */
/*::-moz-placeholder {  
   color: rgb(204, 101, 87);  
}*/

/*:-ms-input-placeholder {  
   color: rgb(204, 101, 87);  
}*/

/*****************************************   NEW       ******************************************************/

/*.quote{
  margin-top:150px;
  text-align: center;
  font-family: 'Quikhand';
  text-transform: capitalize;
  word-spacing: 10px;
  color:rgb(204, 101, 87);
}

.quote i{
  font-size: 20px;
  font-weight: bold;
  color:black;
}

.quote input{
  width:200px;
  text-align: center;
  color:black;
  border-color: black;
  border-radius: 10px;
  height:30px;
  font-size: 18px;
}

.quotes{
  text-align: center;
  font-family: 'Quikhand';
  text-transform: capitalize;
  word-spacing: 10px;
  color:rgb(204, 101, 87);
}

.quotes i{
  font-size: 20px;
  font-weight: bold;
  color:#695C58;;
}

.quotes input{
  width:200px;
  text-align: center;
  color:black;
  border-color: black;
  border-radius: 10px;
  height:30px;
  font-size: 18px;
}

::-webkit-input-placeholder {
   color: rgb(204, 101, 87);
}

:-moz-placeholder { /* Firefox 18- */
/*   color: rgb(204, 101, 87);  
}

::-moz-placeholder {  /* Firefox 19+ */
/*   color: rgb(204, 101, 87);  
}

:-ms-input-placeholder {  
   color: rgb(204, 101, 87);  
}


*//****************************************************************************************************/

footer
{
    background: url('images/footer-bg.jpg') repeat;   
    color: #afa38a;
    border-top: 6px solid #1D0202;
    border-bottom: 12px solid #1D0202;
    padding-bottom: 20px;
    /*margin-top: 434px;*/
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
  width: 1060px;
  /*height: 400px;*/
  /*background-color: white;*/
  margin-left: 150px;
  margin-top: 200px;
  background: url("images/shoes/background.jpg");
}
.table{
  /*padding-left: 50px;*/
  box-shadow: 0 0 10px 10px black;
  border-top:solid 2px black;
   border-bottom: solid 2px black;
}
.table>tbody>tr> td
{
   width: 226px;
   padding-top: 15px;
   padding-right: 5px;
   font-size: 18px;
   text-align:center;
  
   letter-spacing: 2px;
  font-weight: bold;
  vertical-align: middle;
  color:rgb(146, 45, 101);
  font-family: 'Oregon LDO Light Oblique';
}



input{
  text-align: center;
}

.table th
{
   padding-bottom: 5px;
   /*padding-top: 5px;
   border-bottom: solid 2px black;
   /*border-top: solid 2px black;*/
   /*width: 226px;*/
text-align: center;
   padding-left: 10px;
font-size: 15px;
letter-spacing: 2px;
color: rgb(43, 36, 38);
/*color: rgb(253, 106, 106);*/

  font-family: 'Quikhand';
}
.Place_Order
{
  color:white;
  background-color: rgb(43, 36, 38);
  width:200px;
  height: 40px;
  float:right;
}

.table td img{
  margin-left:60px;
}
td h4 
{
   color: #38424b;
   letter-spacing: .5px;
   font-family: 'Oregon LDO Light Oblique';
   font-weight: bold;
}
td a:hover
{
   color: #38424b;
}

td>.fa-times{
  color:rgb(146, 45, 101);
}
td >.fa-times:hover{
  cursor:pointer;
  color:#222;

}
/*********************************************************************************************/

</style>

</head>

<body>   
<?php

    // include_once('feedback.php');
    //     include_once('sign_in.html');
?>
  

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



<!-- ************************************************************************************************ -->

  <div class='popupbox'>
      <!--   <br/> -->
    <table class='ttt table'>
      <tr rowspan='2'>
          <th colspan='20'></th>
          <th colspan='25'><center>ITEM</center></th>
          <th colspan='18'><center>QTY</center></th>
          <th colspan='9'><center>PRICE</center></th>
          <th colspan='70'><center>DELIVERY DETAILS</center></th>
          <th colspan='18'>SUBTOTAL</th>
          <th colspan='10'>REMOVE</th>
      </tr>
       
      <?php 
          $total_price = 0;
          if(!isset($_SESSION))
            session_start();
          
          //session exists    
          if(isset($_SESSION['login'])):
            
            $query = "Select * from `cart` where `customer_id`='$_SESSION[customer_id]'";
            $result = $obj->sql_select($query);
            if(mysqli_num_rows($result)!=0):
            
              while($row = mysqli_fetch_assoc($result)):
                $query = "Select `main_image` from `product_images` where `product_id`='$row[product_id]'";
                $result_image = $obj->sql_select($query);
                $row_image = mysqli_fetch_assoc($result_image);
      ?>
        <tr>
          <td colspan='20' style="padding-bottom:20px;"><img class="" width='140px' width='30px' src="<?php echo $row_image['main_image'];?>"/></td>
        <?php
        
                $query = "Select * from `product` where `product_id`='$row[product_id]'";
                $result_info = $obj->sql_select($query);
                $row_info = mysqli_fetch_assoc($result_info);
        ?>
          <td colspan='25'><center><?php echo $row_info['product_name'];?></center></td>
          <td colspan='18'><center><label style="width:30px;"><?php echo $row['quantity']; ?></label></center></td>
          <td colspan='9'><center>$<?php echo $row_info['product_cost'];?></center></td>
          <td colspan='70' style="padding-top:10px;">$3<br/>Delivery in 6 to 7 business days</td>
          <td colspan='18'>$<?php $total_price += $row['quantity']*$row_info['product_cost'];
                            echo $row['quantity']*$row_info['product_cost']; ?></td>
          <td colspan='10'><i class='fa fa-times' id='<?php echo $row['product_id']; ?>'></i></td>
       </tr>
       <?php
                endwhile;
                //no products in customer cart
              else:
        ?>
      <tr>
        <td colspan='54' rowspan='2' style="padding-top:10px;"><center>There are no items in your shopping cart</center></td>
      </tr>
        <?php
              endif;
            //session doesn't exist    
            else:
             //cookie set
              if(isset($_COOKIE['g_c'])):
          
                //product_id present
                $query = "Select * from `cart` where `customer_id`='$_COOKIE[g_c]'";
                $result = $obj->sql_select($query);
                if(mysqli_num_rows($result)!=0):
            
                while($row = mysqli_fetch_assoc($result)):
                  $query = "Select `main_image` from `product_images` where `product_id`='$row[product_id]'";
                  $result_image = $obj->sql_select($query);
                  $row_image = mysqli_fetch_assoc($result_image);
        ?>
        <tr style="height:260px;">
          <td colspan='20' style="padding-bottom:20px;"><img class="" width='140px' width='30px' src="<?php echo $row_image['main_image'];?>"/></td>
        <?php
        
                $query = "Select * from `product` where `product_id`='$row[product_id]'";
                $result_info = $obj->sql_select($query);
                $row_info = mysqli_fetch_assoc($result_info);
        ?>
          <td colspan='25'><center><?php echo $row_info['product_name'];?></center></td>
          <td colspan='18'><center><input type = 'text' value = '<?php echo $row['quantity']; ?>' style="width:30px;"/></center></td>
          <td colspan='9'><center>$<?php echo $row_info['product_cost'];?></center></td>
          <td colspan='70' style="padding-top:10px;">$3<br/>Delivery in 6 to 7 business days</td>
          <td colspan='18'>$<?php $total_price += $row['quantity']*$row_info['product_cost'];
                            echo $row['quantity']*$row_info['product_cost']; ?></td>
          <td colspan='10'><i class='fa fa-times' id='<?php echo $row['product_id']; ?>'></i></td>                            

       </tr>
       <?php
       
              endwhile;
               //no products in customer cart //cookie not set
            else:
        ?>
      <tr>
        <td colspan='54' rowspan='2'  style="padding-top:10px;"><center>There are no items in your shopping cart</center></td>
      </tr>
      <?php endif;//no rows
        endif;//cookie
        endif; //outermost
        if($total_price!=0):
      ?>
      <tr style="border-top: solid 2px black;">
        <td colspan='152' style='text-align:right;font-weight:bold'>Estimated total : </td>
        <td colspan='17' id="total">$<?php echo $total_price?></td>
      </tr>
      <tr style='border-top:solid 2px black;'>

        <td colspan='169'>
          <form method='post' action='Place_Order.php'>
            <button class='Place_Order pull-right' type='Submit' name='total' value='<?php echo $total_price?>'>Place Order</button></td>
      </tr>
    
    
    
     
       <?php endif;
       ?>
       </table> 
    <a href="<?php echo $_SERVER['HTTP_REFERER']?>" style="padding-top:10px;color:black;"><h4> << Continue Shopping</h4></a></td>
  </div>

<br/><br/>
<!-- ************************************************************************************************ -->

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

<script src='js/jquery.js'></script>
<script src='js/bootstrap.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src="js/zoomsl-3.0.min.js"></script>
<script type="text/javascript" src="js/Home.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/ValidateLogin.js"></script>
<script src="js/feedback_js.js"></script>
<!-- <script src="js/js/masonry.pkgd.min.js"></script> -->
<!-- <script src='js/fashionista_clothes_click_js.js'></script> -->
<!-- <script type="text/javascript">

// $(document).ready(function(){

//    // $('.Place_Order').click(function(){ 
//    //     window.location.href=("Place_Order.php");
//    $('.Place_Order').click(function(){ 
//    var total = $("#total").text().replace('$','');
//    console.log(total);
//        $.ajax("Place_Order.php",{total:total});       // window.location.href=("Place_Order.php");


//   })
// });

// </script>-->
<script type="text/javascript">

$(document).ready(function(){

   $('td i').click(function(){ 

       var product_id = $(this).attr('id');
       $.get('logout.php',{arg2:product_id},function(data,status){
        alert("The selected product has been removed");
        location.reload(true);

       });
   
  })
});


</script>
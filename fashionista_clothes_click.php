
<html>
  <head>
      <link type='text/css' rel='stylesheet' href='css/bootstrap.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'/> 
      <!-- <link rel="stylesheet" type="text/css" href="css/masonry-docs.css"> -->
     
      <link type='text/css' rel='stylesheet' href='css/fashionista_clothes_click_css.css'/>
       <link rel="stylesheet" type="text/css" href="css/header.css">
      <!-- <link rel="shortcut icon" href="http://localhost/finallll_s_k_m/favicon.ico" type="image/icon"> -->
      <link rel="icon" href="http://localhost/finallll_s_k_m/fashionista_favicon.png" type="image/png"> 
      <title>
        Fashionista | Clothes...Details
      </title>
      <meta name="viewport" content="width=device-width" />

<style type="text/css">

</style>

</head>

<body>   

  <?php
      include_once('Header.php');
    include_once('sign_in.html');
    include_once('feedback.php');

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

<div class="content-wrap">
   <div class="content">




<!-- ******************************************************** -->
<?php

  require_once('dbconnection.php');
  $obj = new DBConnect();
  $query="";
  $query_1="";
  $query_2="";
  $query_3="";
  $query_4="";

  // if(isset($_GET['prod_name']))
  // {
  
   
   

      //$product_id = base64_decode(urldecode($_GET['var']));
      $product_id=$_POST['var11'];
      echo "<input type='hidden' value='$product_id' id='pid'/>";

      $query = "Select `product_name`, `product_cost`, `product_description`
                from `product`
                where `product_id`='$product_id' ";

      if($result= $obj->sql_select($query))
      {
          $row = mysqli_fetch_assoc($result);
      }

      $query_1 = "Select `main_image`, `thumbnail_image_1`,  `thumbnail_image_2`, `thumbnail_image_3`, `zoomer_image_1`, `zoomer_image_2`, `zoomer_image_3`
                  from `product_images`
                  where `product_id`='$product_id' ";
      if($result_1= $obj->sql_select($query_1))
      {
          $row_1 = mysqli_fetch_assoc($result_1);
      }

  //}
?>

<div id="category-nav-wrap">
  <div id="category-nav"><br/><br/><br/>

    <div class="product-info">
        <div class="name">
            <h2><?php echo strtoupper($row['product_name']);?></h2>   <!-- SYCAMORE COVE PLAID SHIRT -->
        </div>
        <div class="price">
            <span class="offer-price"style='color:#9C2224;'>
                $<?php echo $row['product_cost'];?>      <!-- 27.97 -->
            </span>
            <del class=""><span class="list-price">$39.95</span></del>
        </div>
    </div>

    <div class="product__sizes">
        <div class="product-sizes__container">
            
            <ul >
              
                <li class="product-sizes__size-wrapper">
                    <div class="product-sizes__size">XS</div>
                </li>
                    
                <li class="product-sizes__size-wrapper">
                    <div class="product-sizes__size">S</div>
                </li>
                      
                <li class="product-sizes__size-wrapper">
                    <div class="product-sizes__size">M</div>
                </li>
                      
                <li class="product-sizes__size-wrapper">
                    <div class="product-sizes__size">L</div>
                </li>                                        

            </ul>            

        </div>       
    </div>
    <br/><br/><br/><br/><br/>
    <h4 style='font-size: 20px;'>Product Details</h4>
    <p><?php echo $row['product_description'];?></p>
    <br/><br/> 
     <button class='btn btn-success add_to_cart aage' onclick='add_cart()';>Add To Cart</button> <br/><br/>
        <!-- <button class='btn btn-success add_to_cart aage' name='cart' type='submit'
    onclick="<?php if(!isset($_SESSION))
                session_start();
              
              if(!isset($_SESSION['login'])){
                echo "
                alert('Please log in or Sign Up to continue shopping');";
              }
              else{
                echo "add_cart()";
              }
                ?>">Add To Cart</button>  -->
    <a href="fashionista_clothes.php"><h4> << Continue Shopping</h4></a>

  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

  <div class='clothes_pics'>
        <div id='prod_h2' class='active'>
               <h2 style='font-size:25px;margin-left: 35px;'>Just for You</h2><br/><br/>
               <ul>

<?php

      $query_2 = "Select `main_menu_category_id`, `category_id`
                  from `product`
                  where `product_id`='$product_id' ";
      if($result_2= $obj->sql_select($query_2))
      {
          $row_2 = mysqli_fetch_assoc($result_2);
      }

      $query_3 = "Select `product_id`, `product_name`, `product_cost`
                  from `product`
                  where `main_menu_category_id`='$row_2[main_menu_category_id]' AND `category_id`='$row_2[category_id]' AND `product_id`!='$product_id' ";
      if($result_3= $obj->sql_select($query_3))
      {
          $i=1;
          while(($row_3 = mysqli_fetch_assoc($result_3))&&($i<=3))
          {
              $query_4 = " select `main_image`
                           from `product_images`
                           where `product_id` = '$row_3[product_id]' ";
              if($result_4= $obj->sql_select($query_4))
              {
                  $row_4 = mysqli_fetch_assoc($result_4);
              }
?>

                  <li>
                      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                          <div class="front">
                            <a href="www.hollisterco.com" class="Products">
                              <img class="" src="<?php echo $row_4['main_image'];?>" style="display: block;"/>
                            </a>
                          </div>
                          <div class="back">
                            <center><div class="product-info">
                                <div class="name">
                                    <!-- <h2><a href="/shop/wd/bettys-shirts/seaside-reef-shirt-2621088_02"><?php echo strtoupper($row_3['product_name']);?></a></h2> -->
    <h4 id='hhh'><?php echo strtoupper($row_3['product_name']);?></h4>
                                </div>
                                <div class="price">
                                    <span class="offer-price">
                                        $<?php echo $row_3['product_cost'];?>
                                    </span>
                                    <del class=""><span class="list-price">$39.95</span></del>
    <br/><br/><br/>
    <form action='fashionista_clothes_click.php'  target="_blank" method='post'>    
      <input type='hidden' name='var11' id="var1" value='<?php echo $row_3['product_id'];?>'/>
      <button type='submit' target="_blank">Show Details</button>
    </form>
                                </div>
                            </div></center>
                          </div>
                        </div>
                      </div>
                  </li>

<?php
          $i=$i+1;
          }
      }


?>

<!--                   <li>
                      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                          <div class="front">
                            <a href="www.hollisterco.com/shop/bettys-sleeveless-tops/scripps-pier-cami" class="Products">
                              <img class="" src="images/prod1.jpg" style="display: block;"/>
                            </a>
                          </div>
                          <div class="back">
                            <div class="product-info">
                                <div class="name">
                                    <h2><a href="/shop/wd/bettys-shirts/seaside-reef-shirt-2621088_02">SYCAMORE COVE PLAID SHIRT</a></h2>
                                </div>
                                <div class="price">
                                    <span class="offer-price">
                                        $27.97
                                    </span>
                                    <del class=""><span class="list-price">$39.95</span></del>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </li>

                  <li>
                      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                          <div class="front">
                            <a href="www.hollisterco.com/shop/bettys-sleeveless-tops/scripps-pier-cami" class="Products">
                              <img class="" src="images/prod2.jpg" style="display: block;"/>
                            </a>
                          </div>
                          <div class="back">
                            <div class="product-info">
                                <div class="name">
                                    <h2><a href="/shop/wd/bettys-shirts/seaside-reef-shirt-2621088_02">JACK CREEK PLAID SHIRT</a></h2>
                                </div>
                                <div class="price">
                                    <span class="offer-price">
                                        $27.97
                                    </span>
                                    <del class=""><span class="list-price">$39.95</span></del>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </li>

                  <li>
                      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                          <div class="front">
                            <a href="www.hollisterco.com/shop/bettys-sleeveless-tops/scripps-pier-cami" class="Products">
                              <img class="" src="images/prod3.jpg" style="display: block;"/>
                            </a>
                          </div>
                          <div class="back">
                            <div class="product-info">
                                <div class="name">
                                    <h2><a href="/shop/wd/bettys-shirts/seaside-reef-shirt-2621088_02">JACK CREEK PLAID SHIRT</a></h2>
                                </div>
                                <div class="price">
                                    <span class="offer-price">
                                        $27.97
                                    </span>
                                    <del class=""><span class="list-price">$39.95</span></del>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </li> -->

</ul>

     </div>

   </div>

  </div>
</div>


<br/>


<!-- ********************************************************************************************* -->

<div class="hey">

<div class='r93'>
    <div class='clothes_pics11'>
      <ul id="h1">
        <div id='prod_h11' class='active'>
          
                <li>                    
                    <a href="www.hollisterco.com" class="Products11">
                        <img class="my-foto" src="<?php echo $row_1['thumbnail_image_1'];?>" data-large="<?php echo $row_1['zoomer_image_1'];?>">
                    </a>
                </li>
            
        </div>
        <div id='prod_h22' class=' '>
             
                <li>                    
                    <a href="www.hollisterco.com" class="Products11">
                        <img class="my-foto" src="<?php echo $row_1['thumbnail_image_2'];?>" data-large="<?php echo $row_1['zoomer_image_2'];?>" >
                    </a>
                </li>
            
        </div>
        <div id='prod_h33' class=' '>
               
                <li>                    
                    <a href="www.hollisterco.com" class="Products11">
                        <img class="my-foto" src="<?php echo $row_1['thumbnail_image_3'];?>" data-large="<?php echo $row_1['zoomer_image_3'];?>" >
                    </a>
                </li>
            
        </div>
      </ul>
    </div>
</div>

</div>


  <div id="category-nav11">
    <ul class="primary1"  > <!-- <br/><br/><br/><br/><br/> -->
        <li data-id="prod_h11" class=" active "><img class=" " data-id='1' src="<?php echo $row_1['thumbnail_image_1'];?>" width="100"/></li>
        <li data-id="prod_h22" class=" active "><img class=" " data-id='2' src="<?php echo $row_1['thumbnail_image_2'];?>" width="100"/></li>
        <li data-id="prod_h33" class=" active "><img class=" " data-id='3' src="<?php echo $row_1['thumbnail_image_3'];?>" width="100"/></li>
    </ul>
  </div>


<br/><br/>

<!-- ********************************************************************************************* -->

</div>


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
<script type="text/javascript" src='js/jquery.validate.min.js'></script>
<!-- <script src="js/js/masonry.pkgd.min.js"></script> -->
<script type="text/javascript" src='js/Home.js'></script>
<script type="text/javascript" src='js/jquery-ui.js'></script>
<script type="text/javascript" src='js/fly_to_cart.js'></script>
<script src="js/ValidateLogin.js"></script>
<script src="js/feedback_js.js"></script>
<script src='js/fashionista_clothes_click_js.js'></script>
<script type="text/javascript">

// $(document).ready(function(){

//    $('.aage').click(function(){ 
//        window.location.href=("add_to_cart.php");
//    });  

// });

</script>













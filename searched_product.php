<html>
  <head>
      <link type='text/css' rel='stylesheet' href='css/bootstrap.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'/> 
      <link rel="stylesheet" type="text/css" href="css/header.css">
      <link type='text/css' rel='stylesheet' href='css/fashionista_clothes_css.css'/>
      <!-- <link rel="shortcut icon" href="http://localhost/finallll_s_k_m/favicon.ico" type="image/icon"> -->
      <link rel="icon" href="http://localhost/finallll_s_k_m/fashionista_favicon.png" type="image/png"> 
      <title>
        Fashionista | Searched products...
      </title>
      <meta name="viewport" content="width=device-width" />

<style type="text/css">

.srch
{
    width: 900px;
    margin-left: 270px;
}

</style>

</head>

<body>

   <?php
    
  ?> 

<!-- ************************************************************************************************ -->

  <?php
    include_once('Header.php');
    include_once('feedback.php');
    include_once('sign_in.html');

    require_once('dbconnection.php');
    $obj = new DBConnect();
    $query="";
    $query_1="";
    $query_2="";
    $query_3="";

    $i=0;

    $search=$_POST['search_key'];
    if($search==="")
    {
        $search="1000";
    }

?>
      <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      <div class='srch'> 
          <?php 
              $query_2 = " Select `product_id` , `product_name` , `product_cost`
                           from `product`
                           where `search_keyword` LIKE '%$search%' ";
              if($result_2= $obj->sql_select($query_2))
              {
                  $i=0;
                  while($row_2 = mysqli_fetch_assoc($result_2))
                    $i=$i+1; 
                  if($i!=0)
                  {

          ?> 
          <h4>Showing <?php echo $i; ?> products as search results for ' <?php echo $search; ?> ' </h4><br/><br/>
          <?php
                  }
                  else if($i==0)
                  {
                    // if($search=="1000")
                    //     echo "<h4>Please type something to search.</h4>";
                    // else
                        echo "<h4>Sorry, no such product found.</h4>";
                  }
              }
          ?>

<?php

    $query = " Select `product_id` , `product_name` , `product_cost`
               from `product`
               where `search_keyword` LIKE '%$search%' ";
    if($result= $obj->sql_select($query))
    {
       
?>

      <ul class='clothes_pics_ul'>
<?php
      $j=1;
      while($row = mysqli_fetch_assoc($result))
      {
          
          $query_1 = " select `main_image`
                       from `product_images`
                       where `product_id` = '$row[product_id]' ";

          if($result_1= $obj->sql_select($query_1))
          {
              
              while($row_1 = mysqli_fetch_assoc($result_1))
              {
                  // $j=$j+1;echo $j;
?>          
                  <li style='display:inline-block;'>
                      <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                          <div class="flipper">
                              <div class="front">
                                  <a href="www.hollisterco.com/shop/bettys-sleeveless-tops/scripps-pier-cami" class="Products">
                                      <img class="" src="<?php echo $row_1['main_image'];?>" style="display: block;"/>
                                  </a>
                              </div>
                              <div class="back">
                                  <div class="product-info">
                                      <div class="name">
                                          <?php                                                
                                              // $var="$row_1[product_id]";
                                              // $var1=urlencode(base64_encode($var));
                                          ?>
                                          <!-- <h2><a href="fashionista_clothes_click.php?var=<?php echo $var1;?>"><?php echo strtoupper($row_1['product_name']);?></a></h2> -->
    <h4 id='hhh'><?php echo strtoupper($row['product_name']);?></h4>
    
                                      </div>
                                      <div class="price">
                                          <span class="offer-price">
                                              $<?php echo $row['product_cost'];?>
                                          </span>
                                          <del class=""><span class="list-price">$39.95</span></del>
    <br/><br/><br/>
    <form action='fashionista_clothes_click.php'  target="_blank" method='post'>    
      <input type='hidden' name='var11' id="var1" value='<?php echo $row['product_id'];?>'/>
      <button type='submit' target="_blank">Show Details</button>
    </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </li>
<?php                
              }
          }  
          if($j%3==0)
              echo "<br/><br/><br/><br/>";
          $j=$j+1;  //echo $j;
      }
?>
              </ul>

<?php
  if($i!=0)
      echo"<br/><br/><h4>Thats all...</h4>";
  }
$obj->sql_close();
?>

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


<!-- ************************************************************************************************ -->



</body>
</html>

<script src='js/jquery.js'></script>
<script src='js/jquery-1.10.2.min.js'></script>
<script src='js/bootstrap.js'></script>
<script src='js/bootstrap.min.js'></script>
<script type="text/javascript" src='js/jquery.validate.min.js'></script>
<!-- <script src="js/masonry.pkgd.min.js"></script> -->
<script type="text/javascript" src='js/Home.js'></script>
<script src="js/ValidateLogin.js"></script>
<script src="js/feedback_js.js"></script>
<!-- <script src='js/fashionista_clothes_js.js'></script> -->
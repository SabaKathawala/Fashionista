<html>
  <head>
      <link type='text/css' rel='stylesheet' href='css/bootstrap.css'/>
      <link rel="stylesheet" type="text/css" href="css/header.css">
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'/> 
      <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
      <link type='text/css' rel='stylesheet' href='css/owl.theme.css'/>
      <!-- <link rel="stylesheet" type="text/css" href="css/masonry-docs.css"> -->
      <link type='text/css' rel='stylesheet' href='css/fashionista_clothes_css.css'/>

      
      <!-- <link rel="shortcut icon" href="http://localhost/finallll_s_k_m/favicon.ico" type="image/icon"> -->
      <link rel="icon" href="http://localhost/finallll_s_k_m/fashionista_favicon.png" type="image/png"> 
      <title>
        Fashionista
      </title>
      <meta name="viewport" content="width=device-width" />
   <script>
     //var str_id_arr = "1";
   </script>

<style type="text/css">

/********************   owl  ***************/

#owl-example .item{
  margin: 3px;
}
#owl-example a
{
   width: 230px;
   height: 138px;
}
#owl-example .item img{
  display: block;
/*  width: 100%;
  height: auto;*/
}
.r_owl h2
{
    font-size: 22px;
    color: #38424b;
    letter-spacing: .5px;
    font-family: 'Oregon LDO Light Oblique';
    font-weight: bold;
}

/********************   owl  ***************/


/********************   loader    ******************/
 
#dvLoading 
{ 
    /*background:#000 url(images/ajax-loader-tr.gif) no-repeat center center; */
    background:url(images/ajax-loader-tr.gif) no-repeat center; 
    background-size: 70px 70px;
    /*height: 300px;*/     height: 70px;
    /*width: 300px; */     width: 70px;
    position: fixed; 
    z-index: 1000; 
    left: 50%; 
    top: 50%; 
    /*margin: -25px 0 0 -25px; */
} 

/********************   loader    ******************/

</style>

</head>

<body>



<!-- ************************************************************************************************ -->

  <?php
    include_once('Header.php');
    include_once('sign_in.html');
    //include_once('feedback.php');
    require_once('dbconnection.php');
    global $li_id;
    if(isset($_POST['li_id']))
    {
        $li_id=$_POST['li_id'];
        echo "hello".$li_id;
    }
    $obj = new DBConnect();
    $query="";

  ?>

<!-- **************       fash_clothes_rough.php   aur category name bhejo filter mein since jeans pe clk se bhi shirt hi ata baad main ***************** -->


    <!-- ******************************************************** -->
  <div class='container'>
    <div class='row offer'>
      <div class='col-md-8 top_image'>
        <img src='images/<?php echo $li_id?>.jpg' class='img-responsive' />
      </div>
      <div class='col-md-4 sale_image'>
        Upto 50% Off<br/>
        <button id='buy_now'>Buy Now</button>
      </div>
    </div>
  </div>
          <!-- <div class='col-md-12 col-xs-12'>                
                <br/><br/><img src="images/<?php echo $li_id?>.jpg" width='968' height='729' class='r1'/>         
          </div> -->
    
    
    <!-- *************************************************************************************** -->
    <div class='container'>
      <br/><br/><center><h1 id ='scroll' class='r2'><?php echo $li_id;?></h1></center>
      <div id="category-nav-wrap">
        <div id="category-nav"><br/><!-- <br/><br/> -->
            <ul class="primary">   
                <?php
                require_once('dbconnection.php');
                $obj = new DBConnect();
                $query="";
                $query = "Select `category_name`
                          from `category`
                          where `main_menu_category_id` = (select `main_menu_category_id`
                                                          from `main_menu_category`
                                                          where `main_menu_category_name` = '$li_id') ";
                if($result= $obj->sql_select($query))
                {
                    $i=1;
                    while($row = mysqli_fetch_assoc($result))
                    {
                      if($i==2)
                      {
                ?>
                         <li data-id="prod_h<?php echo $i;?>" class=" active "><?php echo $row['category_name'];?></li>
                      <?php     
                      }
                      else 
                      {  
                      ?>
                         <li data-id="prod_h<?php echo $i;?>" class="  "><?php echo $row['category_name'];?></li>
                      <?php
                      }
                      $i=$i+1;
                    }
                }
                $obj->sql_close();
                ?>         
            </ul>
        </div>
    </div><br/>
    <!-- ********************************************************************************************* -->

    <div class='row r3'>
        
        <br/><br/><!-- <br/><br/> -->

        <div class='clothes_pics'>
            <?php
            require_once('dbconnection.php');
            $obj = new DBConnect();
            $query="";
            $query_1="";
            $query_2="";
            $num=0;
            $query = " Select `category_id`
                       from `category`
                       where `main_menu_category_id` = (select `main_menu_category_id`
                                                        from `main_menu_category`
                                                        where `main_menu_category_name` = '$li_id') ";
            if($result= $obj->sql_select($query))
            {
              $i=1;
              while($row = mysqli_fetch_assoc($result))
              {
                if($i==2)
                {
            ?>
                  <div id='prod_h<?php echo $i;?>' class='active'>
                <?php     
                }  
                else 
                {  
                ?>
                  <div id='prod_h<?php echo $i;?>' class=' '>
                <?php
                }
                ?>

                    <ul class='clothes_pics_ul'>
                      
                        
                      
                      <?php 
                              



// ******************************       karoooun kya   ******************************************




              $query_1 = " Select `product_id` , `product_name` , `product_cost` 
                           from `product` 
                           where `category_id` = '$row[category_id]'";
              if($result_1= $obj->sql_select($query_1))
              {
                $j=1;
                while($row_1 = mysqli_fetch_assoc($result_1))
                {
                  $query_2 = " select `main_image`
                               from `product_images`
                               where `product_id` = '$row_1[product_id]' ";
                  if($result_2= $obj->sql_select($query_2))
                  {
                      while($row_2 = mysqli_fetch_assoc($result_2))
                      {
?>                            
                            <li class='clothes_pics_li'>
                                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                  <div class="flipper">
                                    <div class="front">
                                      <a href="#" class="Products">
                                        <img class="img-responsive" src="<?php echo $row_2['main_image'];?>" style="display: block;"/>
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
    <h4 id='hhh'><?php echo strtoupper($row_1['product_name']);?></h4>
    
                                          </div>
                                          <div class="price">
                                              <span class="offer-price">
                                                  $<?php echo $row_1['product_cost'];?>
                                              </span>
                                              <del class=""><span class="list-price">$39.95</span></del>
    <br/><br/><br/>
    <form action='fashionista_clothes_click.php'  target="_blank" method='post'>    
      <input type='hidden' name='var11' id="var1" value='<?php echo $row_1['product_id'];?>'/>
      <button type='submit' target="_blank">Show Details</button>
    </form>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </li>
<?php
                      $num=$num+1;
                      }
                  }
                  if($j%3==0)
                   {   echo "<br/><br/><br/><br/>";
      }
                  $j=$j+1;
              }
          }
         






                      ?>
                    </ul>
                  </div>   <!-- prod_h $i -->
            <?php
              $i=$i+1;
              }  // while line 191 
            }    // if line 188        
            $obj->sql_close();
            ?>
        </div>   <!-- clothes_pics -->
    </div>   <!-- row r3 -->
    <br/><br/>
    <!-- ***********************************    owl   ************************************** -->
    <div class='row r_owl'>
        <div class='col-md-12 col-xs-12'>
            <h2>Top Brands</h2><br/>
            <div id="owl-example" class="owl-carousel">
                <div><a href="www.fb1.com"><img src="images/b1.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb2.com"><img src="images/b5.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb3.com"><img src="images/b3.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb4.com"><img src="images/b4.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb5.com"><img src="images/b7.png" width='157' height='94'/></a></div>
                <div><a href="www.fb6.com"><img src="images/b2.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb7.com"><img src="images/b9.png" width='157' height='94'/></a></div>
                <div><a href="www.fb8.com"><img src="images/b8.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb9.com"><img src="images/b6.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb10.com"><img src="images/b10.jpg" width='157' height='94'/></a></div>
                <div><a href="www.fb11.com"><img src="images/b11.png" width='157' height='94'/></a></div>
                <div><a href="www.fb12.com"><img src="images/b12.jpg" width='157' height='94'/></a></div>
            </div>
        </div>
    </div>

<!-- ***********************************    owl   ************************************** --> 







    </div>    <!-- content -->
</div>   <!-- content-wrap-->

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
  <?php
    include_once('feedback.php');

  ?>
</body>
</html>

<script src='js/jquery.js'></script>
<script src='js/jquery-1.10.2.min.js'></script>
<script src='js/bootstrap.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/owl.carousel.js'></script>
<script type="text/javascript" src='js/jquery.validate.min.js'></script>
<!-- <script src="js/masonry.pkgd.min.js"></script> -->
<script type="text/javascript" src='js/Home.js'></script>
<script src="js/ValidateLogin.js"></script>
<script src="js/feedback_js.js"></script>
<script src='js/fashionista_clothes_js.js'></script>
<script type="text/javascript">


///////////////////////////////////////////////  owl  ///////////////////////////////////////

$(document).ready(function() {

  $("#owl-example").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds 
      items : 6,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });
});

$("#buy_now").click(function()
  {
    
     $('html, body').animate({
        scrollTop: $("#scroll").offset().top}, 1000);
  // $(".click").hide();
  }); 
///////////////////////////////////////////////  owl  ///////////////////////////////////////

</script>
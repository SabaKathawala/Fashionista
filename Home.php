<?php
   	require_once('dbconnection.php');
   	$obj = new DBConnect();
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'>
    <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'>   
    <script src="js/jquery.js"></script>

    <title>
        Fashionista | Home...
    </title>

</head>

<body>

	<style type="text/css">

.login_info{
	font-family:'Oregon LDO Vanishing Bold Oblique_0';
	font-size: 15px;
	font-weight: bold;
	text-align: center;
	word-spacing: 5px;
	text-transform: uppercase;
	color: rgb(146, 45, 101);
	display:none;
}


</style>
 <?php
    include_once('Header.php');
    ?>
	
	<div class='container'>	
		<div class='row'>
			<div class='col-md-12 quote'>
				<h3>if loving fashion is a crime, we plead guilty</h3>
			</div>
		</div>
	
<!--====================Kajal=====================================================-->


	<!-- <div class='row'>
          <div class='col-md-12 col-xs-12 r2'>                
    	       	<button  class='btn btn-button shop_now_1'>Shop Now<span class="glyphicon glyphicon-chevron-right"></span></button> 
                        <!-- <img src="images/myn_7.jpg" class='img-responsive'/>  -->         
         <!-- </div>
      </div> -->



    <div class='row r3'>
          <div class='col-md-11 col-md-offset-1 col-xs-12'>
              <div class='container-slider'>
<!--                     <button id='btn_r' class='butt' data-id='1'><span class="glyphicon glyphicon-chevron-right"></span></button>
                    <button id='btn_l' class='butt' data-id='2'><span class="glyphicon glyphicon-chevron-left"></span></button> -->
                    <ul id='slider-ul'>
                    	<a href='shoes.php'><button class='btn btn-button shop_now'>Shop Now<span class="glyphicon glyphicon-chevron-right"></span></button></a>
                    	<img class="logo_f" src="images/22.png" width='236' height='85'/> 
                        <li class='active1'><img src="images/myn_1.jpg" class='image1 img-responsive'></li>
                        <li><img src="images/myn_2.jpg"  class='image1 img-responsive'></li>
                        <li><img src="images/myn_8.jpg"  class='image1 img-responsive'></li>
                        <li><img src="images/myn_9.jpg"  class='image1 img-responsive'></li>
                        <li><img src="images/myn_5.jpg"  class='image1 img-responsive'></li>
                        <li><img src="images/myn_6.jpg"  class='image1 img-responsive'></li>
                    </ul>

              </div>               
          </div>
      </div>
  </div>
<!--========================================================================================-->
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-12' style='position:relative'>
				<img src='images/sale_bg.jpg' class='sale'/>
			</div>
			<a href='fashionista_clothes.php'><div class='sale_link'></div></a>
		</div>

		<div class='row'>
			<div class='col-md-12 end'>
				<h3>Make everyday<br/>a<br/>Fashion Statement</h3>
<!-- 				<span>Fashionista</span> -->
			</div>
		</div>
 	</div>

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
	
</div>
<?php
  	include_once("sign_in.html");
  	include_once('feedback.php');
  ?>

</body>
</html>



<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/Home.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="js/ValidateLogin.js"></script>
<script src="js/feedback_js.js"></script>
<script>
/////////////////////////////////////   autosuggest    /////////////////////////////////

function suggest(inputString)
{
    if(inputString.length == 0) 
    {
        $('#suggestions').fadeOut();
    } 
    else 
    {
        $.ajax({
            url: "search.php",
            data: 'act=autoSuggestUser&queryString='+inputString,
            success: function(msg){
                if(msg.length >0) 
                {
                    $('#suggestions').fadeIn();
                    $('#suggestionsList').html(msg);
                    $('#suggestions li').hover(function(e)
			        {
			            e.stopPropagation();
			            var target = e.target,
			            text = target.textContent || target.innerText;
			            $('#country').val(text);
                    });
                    $('#country').removeClass('load');
                }
                // else
                // 	alert("noooo");
            }
        });
    }
}


function fill(thisValue) 
{
    $('#country').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 600);
}

</script>
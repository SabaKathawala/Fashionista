<style type="text/css">

</style>
<script src='js/jquery.js'></script>

<header>
		<div class='container-fluid'>
			
			<div class='row'>
				<div class='col-md-12'>
					<!-- <div class='col-md-3 caption'> -->
					<label class='pull-left header-ul login_info' id='customer'></label>
					
				<!-- </div> -->
					<ul class='header-ul pull-right'>
					<?php if(!isset($_SESSION))
						  	session_start();
						  
							if(!isset($_SESSION['login'])){
						?>	
						<li class='main before'><i class='fa fa-share'></i><a href=''>Sign In</a>
						
							<ul class='sign-in'>
								<li><a id='sign'>Log In</a></li>
								<li><a id='cacc'>Create An Account</a></li>							
							</ul>
						</li>
						<?php }
						else {
						?>
						<li class='main after'><a href="#" id="customer">Hi <?php echo $_SESSION['customer_fname']; ?> :)</a>	
							<ul class='sign-in'>
								<li id='view_acc'><a href='sign_up.php'>View my account</a></li>
								<li id='logout'><a href='#'>Log Out</a></li>
								<script type="text/javascript">
									$("#logout").click(function(){
										$.get("logout.php",{arg1:'logout'},function(data,status){
											alert(data);
												// alert(status);
											if(data.trim() == "success"){
												alert(data);
												// alert(status);
												window.location.href=window.location.pathname;
												// $(".before").show();
												// $(".after").hide();
											}
										})
									});
								</script>
							</ul>
							</li>
					<?php } 
						
						?>
						<?php 
							$string ="<li class='cart'><a href='add_to_cart.php'><i class='fa fa-shopping-cart'></i>Cart";
							if(isset($_SESSION['cart_quantity']))
								if($_SESSION['cart_quantity']==0)
									echo $string;
								else echo "<li class='cart'><a href='add_to_cart.php'><i class='fa fa-shopping-cart'></i>Cart($_SESSION[cart_quantity])</a></li>";
							else if(isset($_COOKIE['cart_quantity']))
								if($_COOKIE['cart_quantity']==0)
									echo $string;
								else echo "<li class='cart'><a href='add_to_cart.php'><i class='fa fa-shopping-cart'></i>Cart($_COOKIE[cart_quantity])</a></li>";	
							else{
						?>	
						<li class='cart'><a href='add_to_cart.php'><i class='fa fa-shopping-cart'></i>Cart</a></li>
						<?php } ?>

					</ul>

				</div>
			</div>

			<div class='row'>
				<div class='col-md-7 logo'>
					<a href ='Home.php' class='pull-right'>Fashionista</a>
				</div>
			</div>

			<div class='row'>
				<div class='col-md-12 caption'>
					<label>Live With Fashion</label>
				</div>
			</div>

			<div class='row'>
				<div class='col-md-12'>
					<ul class='options'>
						<li><a href='Home.php'>Home</a></li>
					<form action='fashionista_clothes.php' method='post' target="blank">
						<li><button type='submit' name='li_id' value='Clothes'>Clothes</button></li>
						<li><button type='submit' name='li_id' value='Footwear'>Footwear</button></li>
						<li><button type='submit' name='li_id' value='Accessories'>Accessories</button></li>
					</form>
						<li class='quotes'>

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@   autosuggest  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<div id="suggest">
  <form action='searched_product.php'  method='post' id='search-form'>
    <input type="text" size="25" name='search_key' value="" id="country" autocomplete="off" placeholder='Search by product , category or brand name' onkeyup="suggest(this.value);" onblur="fill();" class="" />
    <button type='submit' class='quotes_but' name='quotes_but' style='background:transparent;border:none;' onblur="isEmpty();">
	 	<i class='fa fa-search' ></i>
	</button>
    <div id="suggestions" style="display: none;position: absolute;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;background-color: white;width: 300px;margin-left:5px;"> 
    	<div id="suggestionsList"> &nbsp; </div>
    </div>
  </form>
</div>
<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@   autosuggest  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->


						<li>
					</ul>
				</div>
			</div>

		</div><!--end of container-fluid-->
	</header>


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
// function fillId(thisValue) 
// {
//     $('#country_id').val(thisValue);
//     setTimeout("$('#suggestions').fadeOut();", 600);
// }


// function addVal(thisValue)
// {
//     $('#suggestions li').hover(function(){
//     	$('#country').val(thisValue);alert(thisValue);
//     });
// }


// function key_down()
// {



// 	$("#suggestionsList ul").keydown(function (e) {
// 	    switch (e.keyCode) {
// 	        case 40:
// 	            $('li:not(:last-child).focus').removeClass('focus').next().addClass('focus');
// 	            break;
// 	        case 38:
// 	            $('li:not(:first-child).focus').removeClass('focus').prev().addClass('focus');
// 	            break;
//	    }
 	// });



// $(".list-item").bind({
// 	keydown: function(e) {
// 		var key = e.keyCode;
// 		var target = $(e.currentTarget);
 
// 		switch(key) {
// 			case 38: // arrow up
// 				target.prev().focus();
// 				break;
// 			case 40: // arrow down
// 				target.next().focus();
// 				break;
// 		}
// 	},
 
// 	focusin: function(e) {
// 		$(e.currentTarget).addClass("selected");
// 	},
 
// 	focusout: function(e) {
// 		$(e.currentTarget).removeClass("selected");
// 	}
// });
// $(".list-item").first().focus();



// }



////////////////////////////////////   autosuggest    ///////////////////////////////// 

function isEmpty() 
{
    
    // if($('#country').val()=="")
    // {
    // 	alert("Please type something to search");
    // }



  // if($('#country').val()=="")
  // {
    // $("#search-form").validate({
    //             rules: {
    //                  search_key: "required",
    //             },
    //             messages: {
    //                  search_key: "Please type something to search",
    //             }
    //             ,
    //             submitHandler: function(form) {
    //                      if($('#country').val()!="")
    //                      {form.submit();}
    //             }
    //         });
  // }

// $.get("Home.php",
//       {is_empty:true},
//       function(data,status){
//         console.log(data);      
//     })

// if($('#country').val()=="")
// {
//     $.get("Home.php",{ is_empty:true },function(data,status){
//         alert(data);
//     });
// }

}


// $(".options>li").click(function(){
// 	var li_id = $(this).attr('data-id');
// 	console.log(li_id);
//     $.post("fashionista_clothes.php", {same_pg:true, li_id:li_id});
// });

// $(".options>li").click(function(){
// 	var li_id = $(this).attr('data-id');
// 	console.log(li_id);
// $.ajax({
// type: 'POST',
// url: "fashionista_clothes.php",
// data: {"same_pg":true, "li_id":li_id },
// success: function(){}
// });
// });


</script>
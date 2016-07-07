<html>
  <head>
      <link type='text/css' rel='stylesheet' href='css/bootstrap.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.css'/>
      <link type='text/css' rel='stylesheet' href='css/css/font-awesome.min.css'/> 
      <title></title>
      <meta name="viewport" content="width=device-width" />

<style type="text/css">

/****************************************************************************************************/

@font-face{
    font-family:'FontAwesome';
    src:url('fonts/fonts/FontAwesome.otf');
}
@font-face{
  font-family: 'Oregon LDO Vanishing Bold Oblique_0';
  src: url('fonts/fonts/Oregon LDO Vanishing Bold Oblique_0.ttf');
}
@font-face{
  font-family: 'Billy Argel Font';
  src: url('fonts/fonts/Billy Argel Font.ttf');
}

@font-face{
  font-family: 'Oregon LDO';
  src: url('fonts/fonts/Oregon LDO.ttf');
}
@font-face{
  font-family: 'Oregon LDO Light Oblique';
  src: url('fonts/fonts/Oregon LDO Light Oblique.ttf');
}
@font-face{
  font-family: 'ParkLaneNF';
  src: url('fonts/fonts/ParkLaneNF.ttf');
}
@font-face{
  font-family: 'Quikhand';
  src: url('fonts/fonts/Quikhand.ttf');
}
/***********************************************************************************************/


/***************************************    f/b     *****************************************************/

.fb2_inner_table
{
  color:rgb(146, 45, 101);
  font-family: 'Oregon LDO Light Oblique';
  font-size: 20px;
  letter-spacing: 1px;
  font-weight: bold;
}

.muku
{
  width:360px;
  height: 134px;
  position: fixed;
  right:-318px; 
  top:315px; 
  z-index: 100;
}
.muku div
{
   display: inline-block;
   height: 134px; 
   top:315px; 
   z-index: 100;
}
.fb_but
{
   width:40px;
   height: 134px;
   background:url('images/feedback1.jpg') no-repeat;
   border:none;
   z-index: 100;
   /*vertical-align: text-bottom;*/
}
.fb2
{
   background-color: white;
   width: 316px;
   z-index: 100;
}
.fb2_inner
{
   background-color: white;
   width: 316px;
   height:0;
   right: 0;
   top:185px;
   position: fixed;
   display: none;
   box-shadow: 0 0 50px black ;    /*box-shadow: 0 0 30px rgb(146, 45, 101) inset;*/
   z-index: 100;
}
.fb2_inner_table , #sub_fb
{
    font-size: 15px;
    color:rgb(9, 79, 146);
}
.fb2_inner_table h3 , .fb2_inner_table h5, #sub_fb
{
    font-weight: bold;
}
.fb2_inner_table input
{
    margin-bottom: 10px;
    height: 28px;
    width: 280px;
}
.fb2_inner_table input , #msg
{
    color: black;
    letter-spacing: 1px;
    font-size: 15px;
}
.fb2_inner_table td
{
    padding-left: 20px;
}
.fb2_inner_table a
{
  font-size: 40px;
  letter-spacing: 3px;
  color:rgb(252, 136, 136);
  font-family: 'Billy Argel Font';
  margin-left: 80px;
}

.fb2_inner_table a:hover
{
  text-decoration: none;
  color:rgb(253, 106, 106);

}
.fb_cross
{
    color: rgb(238, 6, 6);
    visibility: hidden; 
}

#sub_fb
{
    background-color: white;
    border-color: grey;
    letter-spacing: 2px;
    height: 24px;
    padding-top: 1px;
    margin-top: -15px;
}
#sub_fb:hover
{
    border:1px solid rgb(9, 79, 146);
}

/*****************************************    f/b      ************************************************/

</style>

</head>

<body>   



<!--*************************************   f/b    **************************************************-->

<div class='muku'>
    <div class='fb1'>
        <i class='fa fa-times fb_cross'></i><br/>
        <button class='fb_but'></button>
    </div>
    <div class='fb2'>
    </div>
</div>
<div id=" " class="fb2_inner">
  <form id='fb_form'>    <!-- <form action='feedback.php' method='post'> -->
    <table class="fb2_inner_table">
        <tr><td><h3>Tell us what you think.</h3></td></tr>
        <tr>
            <td><h5>Love us / have suggestions / ideas / <br/>feature requests? Tell us how we <br/>can improve our website.</h5></td>
        </tr>
        <tr><td><br/><label>Email *</label></td></tr>
        <tr><td><input type='text' class='form-control' name='c_email_id' id ='c_email_id'/></td></tr>
        <tr><td><label>Mobile Number</label></td></tr>
        <tr><td><input type='text' class='form-control' name='c_name' id='c_name'/></td></tr>   <!-- mob_no -->
        <tr><td><label>Message *</label></td></tr>
        <tr><td><textarea rows='5' cols='37' name='msg' id='msg'></textarea></td></tr>
        <tr>
            <td>
                <button class='btn btn-success' id='sub_fb' >Submit</button>
                <a href="Home.php">Fashionista</a>
            </td>           
        </tr>
    </table>
  </form>      
</div>

<!--***************************************   f/b    ************************************************-->

<?php
 
  require_once('dbconnection.php');
  $obj = new DBConnect();
  $query="";
  $cust_id=0;
  if(isset($_GET['fb']))
  {
    $c_email_id = $_GET['c_email_id'];
    $c_name = $_GET['c_name'];//$mob_no = $_GET['mob_no'];
    $msg = $_GET['msg'];
    if(isset($_SESSION['login']))
    {
        $cust_id=$_SESSION['customer_id'];
    }
    $query = "Insert into `feedback` (`feedback_message`, `customer_id`, `customer_name`, `email_id`) 
              values('$msg','$cust_id','$c_name','$c_email_id')";
    if($obj->sql_update($query))
    {
        $response = array("msg"=>"Thank you for your feedback");
        echo json_encode($response);
    }
    else
    {
        $response = array("msg"=>"There was some problem processing your request. Please try again later.");
        echo json_encode($response);
    }
  }

  // if(isset($_POST['fb']))
  // {
  //   $c_email_id = $_POST['c_email_id'];
  //   $c_name = $_POST['c_name'];//$mob_no = $_GET['mob_no'];
  //   $msg = $_POST['msg'];

  //   $query = "Insert into `feedback` (`feedback_message`, `customer_name`, `email_id`) 
  //             values('$msg','$c_name','$c_email_id')";

  // }
   
?>

</body>
</html>
<script type="text/javascript" src='js/jquery.validate.min.js'></script>
<script type="text/javascript">
 
  $("#sub_fb").click(function(){

      $("#fb_form").validate({
                rules: {
                     c_name: "required",
                     msg: "required",
                     c_email_id:{
                        required:true,
                        email:true
                     },
                     
                },
                messages: {
                     c_name: "Please enter your name",
                     msg: "Please enter the message",
                     c_email_id: "Please enter a valid email",
                    
                },
                submitHandler: function(form) {
                    //form.submit();
                    var c_email_id = $("#c_email_id").val();
                    var c_name = $("#c_name").val();    // mob_no
                    var msg = $("#msg").val();

                    $.getJSON("feedback.php",
                      {fb:true,c_email_id:c_email_id, c_name:c_name,msg:msg},      // mob_no
                      function(data,status){
                          alert(data.msg);
                          //console.log(data.msg);
                    });

                    document.getElementById("c_email_id").value=""; 
                    document.getElementById("c_name").value="";
                    document.getElementById("msg").value="";

                    $('.fb2_inner').animate({height: "0"},800);
                    $('.fb2_inner').css('display','none');
                    $('.fb_cross').css('visibility','hidden');
                    $('.muku').animate({right: "-318px"},800);

                }
            });           

  });

</script>
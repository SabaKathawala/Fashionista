$(document).ready(function(){

		 $("#login-form").validate({
                rules: {
                     email:{
                        required:true,
                        email:true
                     } ,
                     password: {
                         required: true,
                         minlength: 2
                     }                    
                },
                messages: {
                     email: "Please enter a valid email",
                    
                     password: {
                         required: "Please provide a password",
                         minlength: "Your password must be at least 8 characters long."
                     }
                    
                },
                submitHandler: function(form) {
                    var name = $("#email").val();
                    var password = $("#password").val();

                        console.log(name);
                        console.log(password);
                        // $("#login_btn").click(function(){
                        $.getJSON("http://localhost/Project/loginchecker.php",{username:name, userpass:password},function(data,status)
                        {
                            console.log("hello");
                            if(data.status=='failed')
                            {
                                $("#error").html(data.msg);
                            }
                            else if(data.status=='success')
                            {   
                                // $(".login_info").css("display","block");
                                // $('#customer').html("Hi "+data.msg+" :)");
                                $("#overlay").hide();
                                $("#1").hide();
                                $(".after").show();
                                console.log(window.location.pathname);
                                if(window.location.pathname=="/Project/Place_Order.php")
                                {
                                    window.location.pathname='/Project/Home.php';  
                                }
                                // console.log( $("#view_acc a").attr("href"));
                                // $(".before").hide();                          
                                else  
                                location.reload(true);
                            }
                            else
                               $("#error").html("There has been some problem processing your request. Please try again later");
                        })//end of $.get
                    // });
           
        }//end of submit handler
    })

         $("#sign_up").validate({
                rules: {
                     customer_fname:"required",
                     // customer_lname:"required",
                     customer_email_id: {
                         required: true,
                         email: true
                     },
                     customer_password: {
                         required: true,
                         minlength: 8
                     },
                     customer_street:"required",
                     customer_city:"required",
                     customer_state:"required",
                     customer_country:"required" ,
                      customer_pincode:"required",
                     customer_phone_no:"required"                                         
                                                    
                },
                messages: {
                     customer_fname:"This is a required field",
                     // customer_lname:"required",
                     customer_email_id: "Please enter a valid email",
                     customer_street:"This is a required field",
                     customer_city:"This is a required field",
                     customer_state:"This is a required field",
                     customer_country:"This is a required field",
                     customer_pincode:"This is a required field",
                     customer_phone_no:"This is a required field",                                         
                    
                     customer_password: {
                         required: "Please provide a password",
                         minlength: "Your password must be at least 8 characters long."
                     }
                    
                },
                submitHandler: function(form) {
                    form.submit();
                     // var customer_fname = 
                     // var customer_lname:"required",
                     // var customer_email_id: "Please enter a valid email",
                     // var customer_street:"This is a required field",
                     // var customer_city:"This is a required field",
                     // var customer_state:"This is a required field",
                     // var customer_country:"This is a required field"                                 
                    
                     // customer_password:

                     //    console.log(name);
                     //    console.log(password);
                        // $("#login_btn").click(function(){
                    //     $.getJSON("loginchecker.php",{'username':name, 'userpass':password},function(data,status)
                    //     {
                    //         console.log("hello");
                    //         if(data.status=='failed')
                    //         {
                    //             $("#error").html(data.msg);
                    //         }
                    //         else if(data.status=='success')
                    //         {   
                    //             console.log("lhlskghskl");
                    //             $('#customer').html("Logged In As "+data.msg);
                    //             $("#overlay").hide();
                    //             $("#1").hide();
                            
                    //         }
                    //         else
                    //            $("#error").html("There has been some problem preocessing your request. Please try again later");
                    //     })//end of $.get
                    // // });
           
        }//end of submit handler
    })

});
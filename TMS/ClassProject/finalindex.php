
<?php
include 'config.php';
include 'database.php';
include 'css.php';
include "connection.php"
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <!--Bootstrap css-->
	
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
       	 <link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: gray;
   color: white;
   text-align: center;
}
</style>
		<style>
		   .navbar-default {
               background-color: #1C245A;
                  border-color: #e7e7e7;
         }
		 .index{
			 background:#F1E5D4  ;  
		 }
		 
		</style>
    </head>
    <body class="index">
 <h1 style="color:black;">Tution Management System </h1>
    <nav class=" navbar navbar-default">
	
        <div class="container-fluid">
			 <div class="navbar-header">

                <a href="finalindex.php" class="navbar-brand" style="color:#3CD3C1;">Home</a>
            </div>
			<ul class="nav navbar-nav  navbar-left">
                        <li><a href="all_teachers.php" style="color:#E18A1B;">Teachers</a></li>
                       <li><a href="all_students.php" style="color:#E18A1B;">Students</a></li>
            </ul>
	    
            <ul class="nav navbar-nav  navbar-right">
                        <li><a href="login.php" style="color:#E18A1B;">Login</a></li>
                       <li><a href="registration.php" style="color:#E18A1B;">Register</a></li>
            </ul>
        </div>
    </nav>
	

	
	<div class="container">
	    <h3 style="color:gray;">Tution Career</h3>
		<p>If You are not a registered tutor on our site then register by providing your skill, schedule & location etc. on our site  </p>
		<p>Click On Register Button </p>
		<div class="jumbotron">
       <h3>Are You Looking For A Home Tutor</h3>      
        <span>Then Visit our site...Go to Home Page And Search what kind of tutor you want and choose among them u want..</span>
		<span>We have many finest teacher ,,Teachers may mention their demand that what kinds of students they want</span>
      </div>
	  
	  <div class="jumbotron">
       <h3>Are You Looking For A Students</h3>      
        <span>Then Visit our site...Go to Home Page And Search what kind of students you want and choose among them u want..</span>
		<span>We have many kinds of studens like science commerce and arts,..Students provide their demand that what they want......</span>
      </div>
	  
	  <div class="jumbotron">
       <h3>Important Query</h3>      
        <span>State : Unmanaged refers that the student is not able to manage his/her tutor yet...But manage refers opposite meaning...
		</span>
		<span>
		<span>Tutor : Interested refers that the tutor  want some students...And Not Interested refers opposite meaning...
		</span>
		</span>
      </div>
	</div>

	<br/><br/><br/>
	<div class="footer">
	 
	   <span>@Copy:All Rights Reserved</span>
	
	 
	</div>

	


		 
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		 <script src="js/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
       <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		

		
		
		
	 <script>
		
	$(document).ready(function(){
		$('.search').onkeyup(function(){
			var searchtxt = $(this).val();
			$.post(
			$('form').attr('action'),
			{'search' : searchtxt },
			function(){
				$('.show').html(data);
			}
			);
		});
	});
		
</script>	
		
		

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>

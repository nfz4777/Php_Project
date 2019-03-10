
<?php
include 'config.php';
include 'database.php';
include 'css.php';
include "connection.php"
?>
<?php

$db=new Database();
$query="";
$read="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$searchtxt = $_POST['search_text'];
	$select = $_POST['select'];
	
	if($select == "Location " ){
		$query="Select * from tbl_student where Location  LIKE '%$searchtxt%' ";
	}
	elseif($select == "Qualification" ){
		$query="Select * from tbl_student where Qualification LIKE '%$searchtxt%' ";
	}
   elseif ($select == "Graduation"){
		$query="Select * from tbl_student where Graduation LIKE '%$searchtxt%' ";
	}
	
	
	elseif ($select=="Experience"){
		$query="Select * from tbl_student where Experience LIKE '%$searchtxt%' ";
	}
	elseif($select == "Demand " ){
		$query="Select * from tbl_student where  	Demand  LIKE '%$searchtxt%' ";
	}
	
	elseif ($select=="Department"){
		$query="Select * from tbl_student where Department LIKE '%$searchtxt%' ";
	}
	elseif ($select==" " && $searchtxt==" "){
		$query="Select * from tbl_student ";
	}
	else{
	$query="Select * from tbl_student";
 }
	
	$read=$db->select($query);
}
else{
	$query="Select * from tbl_student";
}

$read=$db->select($query);
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
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		
		

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
			 <div class="navbar-header">

                <a href="index.php" class="navbar-brand">Tution System</a>
            </div>
	    
            <ul class="nav navbar-nav  navbar-right">
                        <li><a href="login.php">Login</a></li>
                       <li><a href="registration.php">Register</a></li>
            </ul>
        </div>
    </nav>
	<br/><br/><br/><br/>
<div class="container">
	  <form  class="form-group" width="120px" method="POST">
	    <div class="input-group">
          <span class="input-group-addon">Search</span>
         <input type="text" class="form-control search " id="search" placeholder="Search by location" name="search_text" />
		  
	    </div>
     </form>
</div>

<br/><br/>
<br/><br/><br/><br/>
<div class="show"></div>	
	


  



	


		 
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		 <script src="js/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
       <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		

		
	 <script>
		
	$(document).ready(function(){
		$('.search').keyup(function(){
			var searchtxt = $(this).val();
			alert(searchtxt);
			
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

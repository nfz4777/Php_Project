<?php
include 'config.php';
include 'database.php';
include 'css.php';
include 'connection.php';

?>
<?php

$db=new Database();
$searchtxt="";
if(isset($_POST['search_text']))
{
	$searchtxt = $_POST['search_text'];
	$query="Select * from tbl_student where Location LIKE '%$searchtxt%' And Qualification = 'Student' ";
}
elseif ( $searchtxt==" "){
		$query="Select * from tbl_student where Qualification = 'Student' ";
	}
else{
	$query="Select * from tbl_student where Qualification = 'Student' ";
}

$read=$db->select($query);
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>home</title>
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		
		

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
   <br/><br/><br/><br/>

   <div class="container">
	  <form  class="form-group"  method="POST">
	    <div class="input-group">
         <span class="input-group-addon">
		        
		  </span>
         <input type="text"  class="form-control search " id="search" placeholder="Search By Location" name="search_text">
       </div>
	   
     </form>
</div>

<br/><br/>
<br/><br/><br/><br/>
	
  


	

<?php
if(isset($_GET["msg"])){
	echo  "<span style='color:red'>".$_GET["msg"]."</span>";
}
?>
<br/><br/><br/><br/>	
	
<div class="row">

<div class="container" style=" width: 652px;">

<?php if($read) { ?>


<?php
 

    while($row=$read->fetch_assoc()) { ?>
	
	<div class="col-md-12">
	  <div  class="media">
        <div class="media-left">
       <img src="imgs/<?php echo $row['Images'];?>" class="image circle" style="height:270px;width:230px">
       </div>
      <div class="media-body" >
     
 

    <table  class=""  width="450px">
        <tr>
	     <td >Name</td>
		 <td><?php echo $row['Name'];?></td>
		</tr>
		
		<tr>
	     <td >Email</td>
		 <td><?php echo $row['Email'];?></td>
		</tr>
		
		<tr>
	     <td >Gender</td>
		 <td><?php echo $row['Gender'];?></td>
		</tr>
		
		<tr>
	     <td >Graduation</td>
		 <td><?php echo $row['Graduation'];?></td>
		</tr>
		
		<tr>
	     <td >Department</td>
		 <td><?php echo $row['Department'];?></td>
		</tr>
		
		<tr>
	     <td >Demand</td>
		 <td><?php echo $row['Demand'];?></td>
		</tr>
		
		<tr style="">
	     <td style="color:#0D3E6C">Qualification</td>
		 <td id="ql" style="color:#444517;font-size:20px;"><?php echo $row['Qualification'];?></td>
		</tr>
		<tr>
	     <td >Experience</td>
		 <td><?php echo $row['Experience'];?></td>
		</tr>
		
		<tr>
	     <td >Contact</td>
		 <td><?php echo $row['Contact'];?></td>
		</tr>
		
		<tr>
	     <td >Location</td>
		 <td><?php echo $row['Location'];?></td>
		</tr>
		
		<tr style="background:gray;">
	     <td style="color:Red">State</td>
		 <td style="color:white"><?php echo $row['State'];?></td>
		</tr>
		
		<tr style="background:gray; border:1px solid white;">
	     <td style="color:#391161">Tutor</td>
		 <td style="color:white"><?php echo $row['Tutor'];?></td>
		</tr>
		
		
		
	
		<tr style="background:gray; border:1px solid #F2F3B8;">
	     <td style="color:#C4E618">Date</td>
		 <td style="color:white"><?php echo $row['Today'];?></td>
		</tr>
		
</table>
 </div>

<br/><br/><br/>
</div>
 </div>

<?php } ?>


</div>
<?php } else {?>

<p>Data Is not available</p>

<?php } ?>

</div>


<div class="footer">
	 
	   <span>@Copy:All Rights Reserved</span>
</div>
 	 
		 
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
       <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script type="text/javascript"   src="js/script.js"></script>

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

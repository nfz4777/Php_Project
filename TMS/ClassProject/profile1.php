<! Doctype html>
<html>
<head>
<?php
include 'config.php';
include 'database.php';
include 'css.php';
include 'connection.php';

?>
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
</head>
</body>

<?php

$id = $_GET['id'];

$query="Select * from tbl_student where id= $id ";
$result = mysqli_query($con,$query);


?>

<?php
if(isset($_GET["msg"])){
	echo  "<span style='color:red'>".$_GET["msg"]."</span>";
}

?>



    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
			 <div class="navbar-header">

                <a href="#" class="navbar-brand">Tution System</a>
            </div>
	    
            <ul class="nav navbar-nav  navbar-right">
                        
                        <li><a href="login.php">Log Out</a></li>
                      
            </ul>
        </div>
    </nav>
<br/><br/><br/><br/><br/><br/>
	
<div class="container">
<?php   if($result) {?>
<?php 

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) { ?>

<div class="panel panel-info">
    <div class="panel-heading" style="margin:0 auto;">
	     <img src="imgs/<?php echo $row['Images'];?>"  class="image-circle" style="height:250px;width:200px;">
	</div>
    <div class="panel-body" style="padding:30px;">
	
	
	  <table class=""  width="320px">
        <tr>
	     <td >Name</td>
		 <td></td>
		 <td><?php echo $row['Name'];?></td>
		</tr>
		
		<tr>
	     <td >Email</td>
		 <td></td>
		 <td><?php echo $row['Email'];?></td>
		</tr>
		
		<tr>
	     <td >Password</td>
		 <td></td>
		 <td><?php echo $row['Password'];?></td>
		</tr>
		
		<tr>
	     <td >Gender </td>
		 <td></td>
		 <td><?php echo $row['Gender'];?></td>
		</tr>
		
		<tr>
	     <td >Qualification</td>
		 <td></td>
		 <td><?php echo $row['Qualification'];?></td>
		</tr>
		<tr>
		
		<tr>
	     <td >Graduation</td>
		 <td></td>
		 <td><?php echo $row['Graduation'];?></td>
		</tr>
		
		<tr>
		<td >Contact Info</td>
		 <td></td>
		 <td><?php echo $row['Contact'];?></td>
		</tr>
		
		<tr>
		<td >Experience</td>
		 <td></td>
		 <td><?php echo $row['Experience'];?></td>
		</tr>
		
		<tr>
		<td >Location</td>
		 <td></td>
		 <td><?php echo $row['Location'];?></td>
		</tr>
		
		<tr>
		<td >Demand</td>
		 <td></td>
		 <td><?php echo $row['Demand'];?></td>
		</tr>
		
		<tr>
		<td >Department</td>
		 <td></td>
		 <td><?php echo $row['Department'];?></td>
		</tr>
		<tr>
		<td >State</td>
		 <td></td>
		 <td><?php echo $row['State'];?></td>
		</tr>
		
		<td >Today</td>
		 <td></td>
		 <td><?php echo $row['Today'];?></td>
		</tr>
		
		<td >Tutor</td>
		 <td></td>
		 <td><?php echo $row['Tutor'];?></td>
		</tr>
		<td >Hired By</td>
		 <td></td>
		 <td>
		 <?php echo $row['Hire_Count'];?>
		  <?php echo $row['Hire_Members'];?>
		 </td>
		</tr>
		
		<tr>
         <td>
		<a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a>
		 </td>
		</tr>
		<tr>
         <td>
		   <a href="home.php?id=<?php echo urlencode ($id) ; ?>">Back</a>
		 </td>
		</tr>
</table>
		 
 </div>   
<br/><br/>
 </div>
<?php } ?>


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













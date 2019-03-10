<! Doctype html>
<html>
<head>
<?php
include 'config.php';
include 'database.php';
include 'css.php';;

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
</head>
</body>

<?php
$db=new Database();
$query="Select * from tbl_student";
$read=$db->select($query);
?>

<?php

?>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
			 <div class="navbar-header">

                <a href="index.php" class="navbar-brand">Login & Register System</a>
            </div>
	    
            <ul class="nav navbar-nav  navbar-right">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="#">Log Out</a></li>
                        <li><a href="registration.php">Register</a></li>
            </ul>
        </div>
    </nav>
</div>
	
<table class="" border="2px solid black" width="900px">
    <tr>
	     
		 <th > Name</th>
		 <th>Email</th>
		 <th>Actions</th>
    </tr>
<?php if($read) { ?>
<?php 

while($row=$read->fetch_assoc()) { ?>
	 <tr>
	    
	 
	     <td><?php echo $row['Name'];?></td>
		<td><?php echo $row['Email'];?></td>
		 
		 <td>
		 <a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a>
		    
		 </td>
    </tr>
<?php } ?>
<?php } else {?>

<p>Data Is not available</p>
<?php } ?>

</table>
<br>



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













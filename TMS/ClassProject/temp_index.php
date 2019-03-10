<?php
$db=new Database();
if(isset($_POST['search_text']))
{
	$searchtxt = $_POST['search_text'];
	$query="Select * from tbl_student where Name LIKE '%$searchtxt%' And Qualification = 'Student' ";
}
else{
	$query="Select * from tbl_student where Qualification = 'Student' ";
}

$read=$db->select($query);
?>
<?php
include 'config.php';
include 'database.php';
include 'css.php';
?>
<?php
$db=new Database();
$query="Select * from tbl_student";
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
	  <div class="form-group" width="120px">
	    <div class="input-group">
          <span class="input-group-addon">Search</span>
         <input type="text" class="form-control" id="search" placeholder="Search by location" name="search_text">
	    </div>
     </div>
</div>
<br/><br/>
<div id = "result"></div>	
<br/><br/><br/><br/>	
	
<div class="container">

<?php if($read) { ?>


<?php
 

    while($row=$read->fetch_assoc()) { ?>
	
	
	  <div class="media">
        <div class="media-left">
       <img src="imgs/<?php echo $row['Images'];?>" class="image circle" style="height:150px;width:120px">
       </div>
      <div class="media-body">
     
 

    <table class=""  width="220px">
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
	     <td >Qualification</td>
		 <td><?php echo $row['Qualification'];?></td>
		</tr>
		<tr>
	     <td >Experience</td>
		 <td><?php echo $row['Experience'];?></td>
		</tr>
		<tr>
	     <td >Contact</td>
		 <td><?php echo $row['Contact'];?></td>
		</tr>
</table>
 </div>

<br/><br/><br/>
</div>
 

<?php } ?>


</div>
<?php } else {?>

<p>Data Is not available</p>

<?php } ?>

  

	
	<div class="well">
	  <h3>My first project
	   <span class="pull-right">Like us on Fb</span>
	  </h3>
	 
	</div>

	
	<script>
	     $(document).ready( function()){
			 $('search_text').keyup(function(){
				 var txt = $(this).val();
				 if(txt != '')
				 {
					  $.ajax({
						 url    : 'fetch.php',
						 method : 'post',
						 data   :{search:txt},
					   dataType : 'text',
					   success  : function(data)
					   {
						    $("#result").html("data");
					   }
					   
					 });
					 
				 }
				 else{
					 $("#result").html("");
					 $.ajax({
						 url    : 'fetch.php',
						 method : 'post',
						 data   :{search:txt},
					   dataType : 'text',
					   success  : function(data)
					   {
						    $("#result").html("data");
					   }
					   
					 });
				 }
			 });
		 });
	</script>
 	 
		 
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

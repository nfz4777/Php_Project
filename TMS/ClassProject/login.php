<!doctype html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.12.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<html>	
<body style="background:#F1E5D4">
<div class="container">
 
  <div class="panel panel-default" style="margin-top:100px;">
    <div class="panel-heading" style="text-align:center;color:gray;font-size:30px;" >Log IN</div>
    <div class="panel-body">
	   <form action="#" method="POST">
	  
             <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" name="useremail"  placeholder="Email" >
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" name="userpassword"  placeholder="Password" >
        </div>
		<input  value="Log In" type="submit" class="btn btn-danger" onsubmit="profilefunction()" class="btn btn-primary"/>
   
        
    </form>
	</div>
  </div>
</div>

	   
           
	
	
	<?php
include 'config.php';
include 'database.php';
include 'css.php';
include 'connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email  =  $_POST["useremail"];
	$password   = $_POST["userpassword"];
		$query="Select * from tbl_student where Email= '$email' and Password = '$password' ";
		
		
		$result = mysqli_query($con,$query);
		$find_id=mysqli_fetch_assoc($result);
		$get_id=$find_id['id'];
		if(mysqli_num_rows($result)==1)
		{
			echo "<script>
			
			
                   alert ('Successfully Logged in'); 
                                
				 window.location.href ='home.php?id=$get_id'; 
             </script>";
		  
			 
          
			
		}
		
		
	
}
?>


</body>
</html>



    
		 
		

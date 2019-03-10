<?php
$id = $_GET['id'];
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}

	else

	{
		if($reg_user->register($uname,$email,$upass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						I will like to start a conversation with you...<br/>
						<br /><br />
						Thanks,";
						
			$subject = "TSM";
						
			$reg_user->send_mail($email,$message,$subject);	
			
			$msg = " Mail Successfully sent";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Send Email</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.12.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
  <body style="background:#F1E5D4">
    
				<?php if(isset($msg)){
					echo $msg;
				}   ?>
				
<div class="container">
	  
	  
	  <div class="panel panel-default" style="margin-top:100px;">
    <div class="panel-heading" style="text-align:center;color:gray;font-size:30px;" >Send Mail</div>
    <div class="panel-body">
	   <form action="#" method="POST">
	  
             <div class="form-group">
            <label>Username</label>
			<input type="text" class="form-control" placeholder="Username" name="txtuname" required />
        </div>
		<div class="form-group">
            <label for="inputEmail">To</label>
			<input type="email" class="form-control" placeholder="Email address" name="txtemail" required />
        </div>
        
		<button type="submit" name="btn-signup" class="btn btn-primary" >Send</button>
		<a href="home.php?id=<?php echo urlencode ($id) ; ?>" style="">Back</a> 
   
        
    </form>
	</div>
  </div>
</div>
    
  </body>
</html>
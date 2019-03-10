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
						I am interested to hire you...<br/>
						<br /><br />
						Thanks,";
						
			$subject = "TSM";
						
			$reg_user->send_mail($email,$message,$subject);	
			
		$msg = " Mail Successfully sent;";
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.12.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Send Email</title>
    </head>
  <body>
    <div>
		<?php echo $msg ; ?>		
      <form method="post">
        <h2>Send Email</h2><hr />
        <input type="text" placeholder="Username" name="txtuname" required /><br>
        <input type="email" placeholder="Email address" name="txtemail" required /><br>
        <input type="password" placeholder="Password" name="txtpass" required />
     	<hr />
      
        <button type="submit" name="btn-signup">Send</button>
		<a href="home.php?id=<?php echo urlencode ($id) ; ?>">Back</a>
      </form>

    </div> 
  </body>
</html>
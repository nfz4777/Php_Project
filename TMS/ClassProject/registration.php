<! doctype html>


<?php
include 'config.php';
include 'database.php';
include 'css.php';
include 'connection.php';
?>
<?php
$db=new Database();

$name=$email=$password =$gender =$c_pass=$err_img =$qlty =$graduation=$contact=$location=$experience=$dept=$demand = $state=$tutor="";
$err_Name= $err_Email=$err_Password=$err_gender="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$name          =     mysqli_real_escape_string($db->linked,$_POST["name"]);
	$email         =     mysqli_real_escape_string($db->linked,$_POST["email"]);
	$password      =     mysqli_real_escape_string($db->linked,$_POST["password"]);
	$c_pass        =     mysqli_real_escape_string($db->linked,$_POST["c_password"]);
	$quality       =     $_POST["quality"];
	$demand        =     mysqli_real_escape_string($db->linked,$_POST["demand"]);
	$graduation    =     $_POST["graduation"];
	$dept          =     $_POST["department"];
	$contact       =     mysqli_real_escape_string($db->linked,$_POST["contact"]);
	$location      =     mysqli_real_escape_string($db->linked,$_POST["location"]);
	$experience    =     mysqli_real_escape_string($db->linked,$_POST["experience"]);
	$state         =     $_POST["state"];
	$tutor         =     $_POST["tutor"];
	
	
	$permited = array('jpg','jpeg','gif');
	$img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$img_tmp_name = $_FILES['image']['tmp_name'];
	$img_extension = explode('.',$img_name);
	$img_path ="imgs/". $img_name;
	move_uploaded_file ($img_tmp_name,$img_path );
	
	if(empty($_POST["gender"])){
		$err_gender  ="<span>Gender field is required</span>";
	}
	else{
		$gender     = $_POST["gender"];
	}
	
	if ($password == $c_pass){
		$query="Select * from tbl_student where Password = '$password' ";
        $read = mysqli_query($con,$query);
		   if(mysqli_num_rows( $read) > 0){
		   
           echo "<script>
		     alert ('Email already exist');
		  
		     window.location.href = 'registration.php';
		   </script>";		   
		   }
		  
		   
		   else
	           {
		$query="insert into tbl_student
		(Name,Email,Password,Images,Gender,Qualification,Demand,Graduation,Department,Experience,Tutor,Location,Contact,State,Today) values('$name ','$email','$password','$img_name', '$gender','$quality','$demand','$graduation','$dept','$experience','$tutor','$location','$contact','$state',NOW()) ";
		$insert=$db->insert($query);
	    }
	}
	
}	
?>

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
.err{
	color:red;
}
.index{
			 background:#F1E5D4  ;  
		 }
</style>
</head>
<html>
<body class="index">
<div class="container">
 
  <div class="panel panel-default" style="margin-top:40px;">
    <div class="panel-heading" style="text-align:center;color:gray;font-size:30px;" >Registration</div>
    <div class="panel-body">
	  <form style = "margin: 0 auto;" action="registration.php" method="POST" enctype="multipart/form-data">
     <table>
	      <tr>
		      <td>Name</td>
			  <td>
			  <input type="text" name="name" value="" required />
			  <span id="name" class="err"><?php echo $err_Name ; ?></span>
			  </td>
		  </tr>
		  <tr>
		      <td>Email</td>
			  <td><input type="text" name="email" value=""  required />
			  <span  class="err"><?php echo $err_Email ; ?></span>
			  </td>
		  </tr>
		  <tr>
		      <td>Password</td>
			  <td>
			  <input type="password" name="password" value="" required />
			  </td>
		  </tr>
		   <tr>
		      <td>Confirm Password</td>
			  <td>
			  <input type="password" name="c_password" value="" required />
			  </td>
		  </tr>
		   <tr>
		      <td>Today </td>
			  <td>
			 
			       <input required type="text" name="date" value="<?php 
			       date_default_timezone_set("Asia/Dhaka");
			       echo date("y.m.d.");?>" />
             </td>
		  </tr>
		  
		  <tr>
		      <td>Gender</td>
			  <td>
			  <input type="radio" name="gender" value="Male" required />Male
			  <input type="radio" name="gender" value="Female"  />Female
			  <span  class="err"><?php echo $err_gender ; ?></span>
			 </td>
		  </tr>
		  
		  <tr>
		      <td>Qualification</td>
			  <td>
			  <input type="radio" name="quality[]" value="Teacher" required />Teacher
			  <input type="radio" name="quality[]" value="Student"  />Student
			  </td>
		  </tr>
		  
		  <tr>
		      <td>Photo</td>
			  <td>
			  <input type="file" name="image" value="" required />
			   <span  class="err"><?php echo $err_img ; ?></span>
			  
			  </td>
		  </tr>
		  <tr>
		      <td>Graduation</td>
			  <td>
		       <select required name="graduation">
                    <option value="" selected >Select One</option>
                    <option value="SSC">SSC</option>
                    <option value="HSC">HSC</option>
                    <option value="BSC">BSC</option>
                    <option value="MSC">MSC</option>
					<option value="BBA">BBA</option>
                    <option value="MBA">MBA</option>
					<option value="CA">CA</option>
              </select>
			  </td>
		  </tr>
		  
		  <tr>
		     <td>Demand</td>
			 <td>
			 <textarea required rows='3' cols='10' type="text" name="demand" value=""  /></textarea>
			 
			 </td>
		  </tr>
		  
		  <tr>
		      <td>Department</td>
			  <td>
		       <select required name="department">
                    <option value="" selected >Select One</option>
                    <option value="Science">Science</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Arts">Arts</option>
              </select>
			  </td>
		  </tr>
		  
		  <tr>
		     <td>Contact No.</td>
			 <td><input type="text" name="contact" value="" required /></td>
		  </tr>
		  
		   <tr>
		     <td>Experience</td>
			 <td><input type="text" name="experience" value=""  /></td>
		  </tr>
		  
		   <tr>
		      <td>Tutor</td>
			  <td>
			  <input type="radio" name="tutor" value="Interested"/>Interested
			  <input type="radio" name="tutor" value="Not_Interested"/>Not Interested
			  <input type="radio" name="tutor" value="None"/>None
			 </td>
		  </tr>
		  
		  <tr>
		     <td>Location</td>
			 <td>
			 <textarea  rows='3' cols='10' type="text" name="location" value="" required /></textarea>
			 
			 </td>
		  </tr>
		  
		  <tr>
		      <td>State</td>
			  <td>
			  <input type="radio" name="state" value="Managed"  />Managed
			  <input type="radio" name="state" value="Unmanaged"  />Unmanaged
			  <input type="radio" name="state" value="None"/>None
			 
			  </td>
		  </tr>
		  
		   <tr>
		      <td></td>
			  <td><input type="submit" class="btn2" name="submitted" value="Submit" />
			  <input type="reset"  value="Reset" /></td>
		  </tr>
		  
	 </table>
</form>
	</div>
  </div>
</div>
<?php
if(isset($_GET["msg"]))
{
	echo "<span style='color:green'>".$_GET["msg"]."<span>";
}
?>
<?php
if(isset($error))
{
	echo "<span style='color:red'>".$error."<span>";
}
?>

<a href="finalindex.php" border="2px solid black" style=" background:white; padding:10px;color:gray; text-decoration:none;">Back</a>
<br/><br/>
<div class="footer">
	 
	   <span>@Copy:All Rights Reserved</span>
	
	 
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
       <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

</body>
</html>
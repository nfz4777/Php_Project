<! Doctype html>
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
<html>
<?php
include 'config.php';
include 'database.php';
include 'css.php';
include 'connection.php';

?>

<?php
$id = $_GET['id'];
$db=new Database();
$query="Select * from tbl_student where id= $id ";
$update_data=$db->select($query)->fetch_assoc();
$img_name=$count="";
$name=$email=$password =$gender =$c_pass=$err_img =$qlty =$graduation=$contact=$location=$experience=$dept=$demand = $state=$tutor=$gender=$data=$members="";

if(isset($_POST["submited"])){
	$name          =     mysqli_real_escape_string($db->linked,$_POST["name"]);
	$email         =     mysqli_real_escape_string($db->linked,$_POST["email"]);
	$password      =     mysqli_real_escape_string($db->linked,$_POST["password"]);
$qualification     =     $_POST["qualification"];
	$demand        =     mysqli_real_escape_string($db->linked,$_POST["demand"]);
	$graduation    =     $_POST["graduation"];
	$dept          =     $_POST["department"];
	$contact       =     mysqli_real_escape_string($db->linked,$_POST["contact"]);
	$location      =     mysqli_real_escape_string($db->linked,$_POST["location"]);
	$experience    =     mysqli_real_escape_string($db->linked,$_POST["experience"]);
	$state         =     $_POST["state"];
	$tutor         =     $_POST["tutor"];
	$gender        =     $_POST["gender"];
	$date          =     $_POST["date"];
	$count         =     mysqli_real_escape_string($db->linked,$_POST["count"]);
	$members       =     $_POST["hire_Members"];
	
	$img_name =$_FILES['image1']['name'];
	$img_size = $_FILES['image1']['size'];
	$img_tmp_name = $_FILES['image1']['tmp_name'];
	$img_extension = explode('.',$img_name);
	$img_path ="imgs/". $img_name;
	$query1="Select * from tbl_student where id = '$id' ";
    $read1 = mysqli_query($con,$query);
	$data = mysqli_fetch_array($read1);
	$old_img = $data['Images'];
	unlink("imgs/".$old_img);
	move_uploaded_file ($img_tmp_name,$img_path );
  
	
	
	
	
	
		$query="UPDATE tbl_student SET Images='$img_name',Name='$name',Email='$email',Password='$password', Gender='$gender', Graduation='$graduation', Demand='$demand',Contact='$contact', Qualification='$qualification', Experience='$experience', Location='$location', Department='$dept', State='$state', Tutor='$tutor', Today='$date', Hire_Count='$count' , Hire_Members='$members' WHERE id= '$id' ";
	    $update=$db->update($query);
	
}


?>
</head>
<body>
<?php
if(isset($error)){
	echo  "<span style='color:red'>".$error."</span>";
}
?>
<?php
if(isset($_POST["deleted"])){
	$query="Delete from tbl_student  WHERE id= $id ";
		
		$update=$db->deleted($query);
}
?>
<?php
if(isset($_GET["msg"]))
{
	echo "<span style='color:green'>".$_GET["msg"]."<span>";
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
	
	<br/><br/><br/><br/>
<div class="container">
<form action="update.php?id=<?php echo $id ;?>" method="POST" enctype="multipart/form-data">
<table>
      <tr>  
	      <td>
		   <img src="imgs/<?php echo $update_data['Images'];?>"  class="image-circle" style="height:250px;width:200px;">
		   <input type="file" name="image1" value="" />
		  </td>
	  </tr>
	  <tr>
	   <td><br/><br/><br/></td>
	  </tr>
	
    
	
	
    <tr>
	    <td> Name</td>
		<td></td>
		<td><input type="text" name="name" value="<?php  echo $update_data['Name']; ?> " /></td>
	</tr>
	<tr>
	   <td><br/></td>
	</tr>
	 <tr>
	    <td>Email</td>
		<td></td>
		<td><input type="text" name="email" value="<?php  echo $update_data['Email']; ?> " /></td>
	</tr>
	<tr>
	   <td><br/></td>
	</tr>
	<tr>
	    <td>Password</td>
		<td></td>
		<td><input type="text" name="password" value="<?php  echo $update_data['Password']; ?> " /></td>
	</tr>
	<tr>
	   <td><br/></td>
	</tr>
	    <tr>
		      <td>Gender</td>
			  <td></td>
			  <td>
			  <input type="radio" name="gender" value="Male" required
			   <?php
			  if($update_data["Gender"] == "Male")
				  echo "Checked";
			  ?>
			  />Male
			 
			  <input type="radio" name="gender" value="Female" 
			   <?php
			  if($update_data["Gender"] == "Female")
				  echo "Checked";
			  ?>
			  />Female
			  
			
			 </td>
		  </tr>
		  
          <tr>
	        <td><br/></td>
	      </tr>
	      <tr>
	       <td><br/></td>
	     </tr>
	
	 <tr>
		      <td>Qualification</td>
			  <td></td>
			  <td>
			  <input required type="radio" name="qualification" value="Teacher" 
			  <?php
			           if($update_data["Qualification"] == "Teacher")
					   {
						   echo "Checked";
					   }
				       
			   ?>/>Teacher
			  <input type="radio" name="qualification" value="Student"
			  <?php
			           if($update_data["Qualification"] == "Student")
				       echo "Checked";
			   ?>
			   
			  />Student
			 
			  </td>
	</tr>
	
	<tr>
	   <td><br/></td>
	</tr>
	
	<tr>
		      <td>Graduation</td>
			  <td></td>
			  <td>
		       <select required name="graduation">
                    <option value="" >Select One</option>
                    <option value="SSC"
					<?php
			           if($update_data["Graduation"] == "SSC")
					   {
						   echo "Selected";
					   }
				       
			        ?>
					>SSC
					</option>
                    <option value="HSC"
					<?php
			           if($update_data["Graduation"] == "HSC")
				       {
						   echo "Selected";
					   }
			        ?>
					>HSC</option>
                    <option value="BSC"
					<?php
			           if($update_data["Graduation"] == "BSC")
				       {
						   echo "Selected";
					   }
			        ?>
					>
					BSC</option>
                    <option value="MSC"
					<?php
			           if($update_data["Graduation"] == "MSC")
					   {
						   echo "Selected";
					   }
				       
			        ?>>MSC</option>
					<option value="BBA"
					<?php
			           if($update_data["Graduation"] == "BBA")
					   {
						   echo "Selected";
					   }
				       
			        ?>
					>BBA</option>
                    <option value="MBA"
					<?php
			           if($update_data["Graduation"] == "BBA")
					   {
						   echo "Selected";
					   }
				       
			        ?>>MBA</option>
					<option value="CA"
					<?php
			           if($update_data["Graduation"] == "BBA")
					   {
						   echo "Selected";
					   }
				       
			        ?>
					>CA</option>
              </select>
			  </td>
		  </tr>
	<tr>
	
	   <td><br/></td>
	</tr>
	
	<tr>
		      <td>Department</td>
			  <td></td>
			  <td>
		       <select required name="department">
                    <option value="" >Select One</option>
                    <option value="Science"
					<?php
			           if($update_data["Department"] == "Science")
					   {
						   echo "Selected";
					   }
				       
			        ?>>Science
					</option>
                    <option value="Commerce"
					<?php
			           if($update_data["Department"] == "Commerce")
				       {
						   echo "Selected";
					   }
			        ?>>Commerce</option>
                    <option value="Arts"
					<?php
			           if($update_data["Department"] == "Arts")
				       {
						   echo "Selected";
					   }
			        ?>
					>
					Arts</option>
                    
              </select>
			  </td>
		  </tr>
	<tr>
	
	   <td><br/></td>
	</tr>
	
	<tr>
	    <td>Contact</td>
		
		<td></td>
		<td><input required type="text" name="contact" value="<?php  echo $update_data['Contact']; ?> " /></td>
	</tr>
	
	<tr>
	   <td><br/></td>
	</tr>
	
	<tr>
	    <td>Experience</td>
		<td></td>
		<td><input type="text" name="experience" value="<?php  echo $update_data['Experience']; ?> " /></td>
	</tr>
	
	<tr>
	   <td><br/></td>
	</tr>
	
	<tr>
	    <td>Location</td>
		<td></td>
		<td><input required type="text" name="location" value="<?php  echo $update_data['Location']; ?> " /></td>
	</tr>
	
	<tr>
	   <td><br/></td>
	</tr>
	
	<tr>
	    <td>Demand</td>
		<td></td>
		<td>
		<input type="text"  name="demand" value="<?php  echo $update_data['Demand']; ?>" />
		</td>
	</tr>
	<tr>
	    <td><br/><br/></td>
	</tr>
	
	 <tr>
		      <td>State</td>
			  <td></td>
			  <td>
			  <input type="radio" name="state" value="Managed" 
			  <?php
			           if($update_data["State"] == "Managed")
					   {
						   echo "Checked";
					   }
				       
			   ?> />Managed
			  <input type="radio" name="state" value="Unmanaged"
			  <?php
			           if($update_data["State"] == "Unmanaged"){
						   echo "Checked";
					   }
			 ?> />Unmanaged
			 <input type="radio" name="state" value="None"
			  <?php
			           if($update_data["State"] == "None"){
						   echo "Checked";
					   }
			 ?> />None
			 
			  </td>
	</tr>
	<tr>
	    <td><br/><br/></td>
	</tr>
	
	 <tr>
		      <td>Tutor </td>
			  <td></td>
			  <td>
			  <input type="radio" name="tutor" value="Interested" 
			  <?php
			           if($update_data["Tutor"] == "Interested")
					   {
						   echo "Checked";
					   }
				       
			   ?>/>Interested
			  <input type="radio" name="tutor" value="Not_Interested"
			  <?php
			           if($update_data["Tutor"] == "Not_Interested")
				       echo "Checked";
			   ?>/>Not Interested
			   <input type="radio" name="tutor" value="None"
			  <?php
			           if($update_data["Tutor"] == "None"){
						   echo "Checked";
					   }
			 ?> />None
			 
			 
			  </td>
	</tr>
	
	<tr>
	    <td><br/><br/></td>
	</tr>
	
	 <tr>
		      <td>Today </td>
			  <td></td>
			  <td>
			 
			       <input required type="text" name="date" value="<?php 
			       date_default_timezone_set("Asia/Dhaka");
			       echo date("y.m.d.");?>" />
             </td>
		  </tr>
		  
	<tr>
	    <td><br/><br/></td>
	</tr>
	<tr>
		      <td>
			     Hired By
			  </td>
			 <td></td>
			  <td>
			 
			   <input required id="myNumber" type="number" name="count" value="<?php  echo $update_data['Hire_Count']; ?>" />
				   
		       <select required name="hire_Members">
                    <option value="" >Select One</option>
                    <option value="Teachers"
					<?php
			           if($update_data["Hire_Members"] == "Teachers")
					   {
						   echo "Selected";
					   }
				       
			        ?>>Teachers
					</option>
					
                    <option value="Students"
					<?php
			           if($update_data["Hire_Members"] == "Students")
				       {
						   echo "Selected";
					   }
			        ?>>
					Students</option>
                    
              </select>
			 
             </td>
		  </tr>
		  
	<tr>
	    <td><br/><br/></td>
	</tr>
	 <tr>
	 <td></td>
	 <td></td>
	     <td><input type="submit" name="submited" value="Update" />
		 <input type="submit" name="deleted" value="Delete" />
		 </td>
      </tr>
</table>
</form>


</div>
<br/></br>
<a href="profile1.php?id=<?php echo urlencode ($id) ; ?>">Back</a>
<br/><br/>
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
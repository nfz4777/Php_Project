<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "classproject_db";

$con = mysqli_connect($host,$user,$pass) or die("Connection Failed");
mysqli_select_db($con,$db_name);
$output='';
$search =$_POST['search_text'];
$qry = "Select * from tbl_student where Name LIKE '%$search%'";
$result = mysqli_query($con,$qry);

if(mysqli_num_rows($row) > 0)
{
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
	{
	$output ="<table class='table-responsive'  width='220px'>
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
</table>"
	}
	echo "$output" ;
}

else{
	echo "Data not found";
}

?>
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

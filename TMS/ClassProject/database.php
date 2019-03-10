<?php
class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $db_name = DB_NAME;
	public $linked;
	public $error;

	public function  __construct(){
		$this->Database_link();
	}
	 private function Database_link(){
		$this->linked = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
		if(!$this->linked){
			$this->error="Connection Failed".$this->linked->connect_error;
			return false;
		}
	}
	// Select or read data
	public function select($query){
		$result=$this->linked->query($query) or die($this->linked->error.__LINE__);
		if($result->num_rows>0){
			return $result;
		}
		else{
			return false;
		}
	}
	
	
	// Insert data
	public function insert($query){
		$insert_value=$this->linked->query($query) or die($this->linked->error.__LINE__);
		if($insert_value){
			header("Location:registration.php?msg=".urlencode('Data Inserted Successfully'));
			exit();
		}
		else{
			die("Error  :(".$this->linked->errno.")".$this->linked->error);
		}
	}
	
	// Update data
	public function update($query){
		$id = $_GET['id'];
		$update_value=$this->linked->query($query) or die($this->linked->error.__LINE__);
		if($update_value){
			echo "<script>alert('Data Updated succssfully');
			      window.location.href ='profile1.php?id=$id';
			</script>";
			exit();
		}
		else{
			die("Error :(".$this->linked->errno.")".$this->linked->error);
		}
	}
	
	// Delete data
	public function deleted($query){
		$id = $_GET['id'];
		$delete_value=$this->linked->query($query) or die($this->linked->error.__LINE__);
		if($delete_value){
			echo "<script>alert('Data Deleted succssfully');
			      window.location.href ='profile1.php?id=$id';
			</script>";
			exit();
		}
		else{
			die("Error  :(".$this->linked->errno.")".$this->linked->error);
		}
	}
	
}
?>
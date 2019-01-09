<?php 

	$connect_db = mysqli_connect("localhost","root","","phonebook");
	
	if($connect_db == FALSE){
		die("Error " . $sql . mysqli_connect_errno());
	}
	

?>
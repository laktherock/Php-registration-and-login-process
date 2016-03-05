<?php
	function connect(){
	$host="localhost:8000";
	$uname="";
	$pword="";
	$dbase="lakshmi";

	$conn=mysqli_connect($host,$uname,$pword,$dbase);

	if($conn){
		//echo "Ready to use SQL";
		return $conn;
	}
	else{
		echo "Please connect properly".mysqli_error($conn);
	}
	mysqli_close($conn);
	return connect;
}
?>

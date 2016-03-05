<?php 
session_start();
?><html>
<head>
<title>Login page</title>
<style>
	h1{
		font-size: 36px;
		font-weight: bold;
		text-align: center;
	}
	#container {
	    border: 4px solid #000;
	    margin-left: 467px;
   		margin-top: 62px;
	    padding: 40px;
	    padding-bottom: 20px;
	    padding-top: 42px;
	    text-align: center;
	    width: 400px;
	}
	input[type="text"]{
		margin:20px;
		padding: 10px;
		font-size: 20px;
	}
	input[type="submit"]{

    background-color: #8db7f4;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    padding: 0.7em 1.5em;
}
h1{
			padding-top: 50px;
			color: #CE261A;
		}
</style>
</head>
<body>
<?php
require 'connect.php';
$conn=connect();
?>
<?php

print_r($_SESSION['login']);?>
<?php
 if(!empty($_POST)){
 	if(empty($_POST['uname'])){
 		$error['uname']="Please enter your username";
 	}	
 	else{
 		$uname = $_POST['uname'];
 	}
 	if(empty($_POST['pword'])){
 		$error['pword']="Please enter password";
 	}
 	else{
 		$pwor = $_POST['pword'];
 	}
 	if(empty($error)){
 		$db=mysqli_select_db($conn,"lakshmi");
 		$sql="select * from register where username = '$uname' and password = '$pwor' ";
 		
 		if($query=mysqli_query($conn,$sql)){
 		//print_r($sql);exit;
 				while($result=mysqli_fetch_array($query,MYSQL_ASSOC)){
				$res_result[]=$result;

			}
			$_SESSION['login']=$res_result;//print_r($res_result);exit;
			if(!empty($res_result)){
 					header("Location:details.php?" . http_build_query($res_result));
 			}else{
 				echo "username or password wrong";
 			}
 					//header('location:details.php');
 		}
 		else{
					echo "username or password error".mysqli_error($conn);
				}
 	
 	
 }
}
// else{
 //	echo "values are empty";
 //}

?>
<h1>Login page</h1>
<div id="container">
<form name="login" action="" method="post">
<input type="text" name="uname" id="uname" placeholder="Username"/><span style="color:red;"><?php if(!empty($error['uname'])) echo $error['uname'];?></span><br>
<input type="text" name="pword" id="pword" placeholder="Password"/><span style="color:red;"><?php if(!empty($error['pword'])) echo $error['pword'];?></span><br>
<input type="submit" name="submit" value="submit" id="submit">
</form>
</div>
</body>
</html>
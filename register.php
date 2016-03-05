<html>
<head>
<title>Registration page</title>
<style>
	h1{
		 font-size: 36px;
		 font-weight: bold;
		 text-align: center;
		}
	#container {
	      border: 4px solid #000;
		  margin-left: 394px;
		  margin-top: 61px;
		  padding: 30px 30px 7px;
		  text-align: center;
		  width: 560px;
		}
	input[type="text"]{
		  margin:20px;
		  padding: 10px;
		  font-size: 20px;
		}
	input[type="submit"]{

    	  background-color: #C36767;
    	  border: 1px solid #ccc;
   		  border-radius: 4px;
    	  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    	  padding: 0.7em 1.5em;
		}
		h1{
			color: #CE261A;
		}
		input[type="radio"]{
			padding: 30px;
		}
		select{
			padding: 10px;
			margin: 20px;
			font-size: 20px;
		}
</style>
</head>
<body>
<?php
require 'connect.php';
$conn=connect();
?>
<?php
	if(!empty($_POST)){
		if(empty($_POST['fname'])){
			$error['fname']="Enter your Fullname";
			}
		else{
			$fname=$_POST['fname'];
		}			
		if(empty($_POST['uname'])){
			$error['uname']="Enter your Username";
			}
		else{
			$uname=$_POST['uname'];
		}	
		if(empty($_POST['pword'])){
			$error['pword']="Enter your Password";
			}
				
		elseif(empty($_POST['pword1'])){
			$error['pword1']="Enter your Password";
			}
		
		elseif($_POST['pword']!=$_POST['pword1']){
			$error['match']="password do not match";
		}
		else{
			$pword=$_POST['pword'];
		}			
		if(empty($_POST['age'])){
			$error['age']="Enter your Age";
			}
		else{
			$age=$_POST['age'];
		}			
		if(empty($_POST['work'])){
			$error['work']="Enter your Work";
			}
		else{
			$work=$_POST['work'];
		}			
		if(empty($_POST['college'])){
			$error['college']="Enter your College";
			}	
		else{
			$college=$_POST['college'];
		}		
		if(empty($_POST['mobile'])){
			$error['mobile']="Enter your Mobile";
			}
		else{
			$mobile=$_POST['mobile'];
		}	
		if(empty($_POST['country'])){
			$error['country']="select any country";
			}else{
				$country=$_POST['country'];
			}
		if(empty($_POST['radio'])){
			$error['radio']= "please check your gender";
			}
			else{
				$radio=$_POST['radio'];
			}
		if(empty($_POST['check'])){
			$error['check']="please tick your favourite sports";
			}
			else{
				$check=$_POST['check'];
				//print_r($check);exit;
			}	

				

			if(empty($error)){
				$db=mysqli_select_db($conn,"lakshmi");
				$sql="insert into register (fullname,username,password,age,work,college,mobile) values('".$fname."','".$uname."','".$pword."',$age,'".$work."','".$college."',$mobile)";
				if(mysqli_query($conn,$sql)){
					echo "Thankyou for Registering";
				}
				else{
					echo "not inserted successfully".mysqli_error($conn);
				}	
				mysqli_close($conn);
				}
			}
			
	?>
<h1> Registration </h1>
<div id="container">
<form name="register" action="" method="post">
<input type="text" name="fname" id="fname" placeholder="Enter your Fullname" value="<?php if(!empty($fname)){echo $fname;}?>"/>
<span style="color: red;"><?php if(!empty($error['fname']))echo $error['fname'];?> </span><br>
<input type="text" name="uname" id="uname" placeholder="Choose Username" value="<?php if(!empty($uname)){echo $uname;}?>"/>
<span style="color: red;"><?php if(!empty($error['uname']))echo $error['uname'];?> </span><br>
<input type="text" name="pword" id="pword" placeholder="Password" value="<?php if(!empty($pword)){echo $pword;}?>"/>
<span style="color: red;"><?php if(!empty($error['pword']))echo $error['pword'];?> </span><br>
<input type="text" name="pword1" id="pword1" placeholder="Confirm password" value="<?php if(!empty($pword1)){echo $pword1;}?>"/>
<span style="color: red;"><?php if(!empty($error['pword1']))echo $error['pword1'];?> </span><br>
<input type="text" name="age" id="age" placeholder="Whats ur Age" value="<?php if(!empty($age)){echo $age;}?>"/>
<span style="color: red;"><?php if(!empty($error['age']))echo $error['age'];?> </span><br>
<input type="text" name="work" id="work" placeholder="Where you Work at ?" value="<?php if(!empty($work)){echo $work;}?>"/>
<span style="color: red;"><?php if(!empty($error['work']))echo $error['work'];?> </span><br>
<input type="text" name="college" id="college" placeholder="Which college are you from ?" value="<?php if(!empty($college)){echo $college;}?>"/>
<span style="color: red;"><?php if(!empty($error['college']))echo $error['college'];?> </span><br>
<input type="text" name="mobile" id="mobile" placeholder="Enter your mobile number" value="<?php if(!empty($mobile)){echo $mobile;}?>"/>
<span style="color: red;"><?php if(!empty($error['mobile']))echo $error['mobile'];?> </span><br>
<select name="country">
	<option value="">Select your country</option>
	<option value="1" <?php if(!empty($country)){if($country==1){echo 'selected';}}?>>Australia</option>
	<option value="2" <?php if(!empty($country)){if($country==2){echo 'selected';}}?>>America</option>
	<option value="3" <?php if(!empty($country)){if($country==3){echo 'selected';}}?>>Bangaladesh</option>
	<option value="4" <?php if(!empty($country)){if($country==4){echo 'selected';}}?>>Brazil</option>
	<option value="5" <?php if(!empty($country)){if($country==5){echo 'selected';}}?>>Canada</option>
	<option value="6" <?php if(!empty($country)){if($country==6){echo 'selected';}}?>>India</option>
	<option value="7" <?php if(!empty($country)){if($country==7){echo 'selected';}}?>>Malaysia</option>
</select><span style="color: red;"><?php if(!empty($error['country']))echo $error['country'];?> </span><br><br>
Select Gender:
<input type="radio" name="radio" id="radio" value="male" <?php if(!empty($radio)){if($radio=="male"){echo 'checked';}}?>>Male
<input type="radio" name="radio" id="radio" value="female" <?php if(!empty($radio)){if($radio=="female"){echo 'checked';}}?>>Female<span style="color: red;"><?php if(!empty($error['radio']))echo $error['radio'];?> </span><br><br>
Your favourite sports:<br>
<input type="checkbox" name="check[]" id="check" value="1" <? if(!empty($check)){if(in_array('1',$check)){ echo 'checked';}}?> >Cricket<br>
<input type="checkbox" name="check[]" id="check" value="2" <? if(!empty($check)){if(in_array('2',$check)){ echo 'checked';}}?>>Volleyball<br>
<input type="checkbox" name="check[]" id="check" value="3" <? if(!empty($check)){if(in_array('3',$check)){ echo 'checked';}}?>>Football<br>
<input type="checkbox" name="check[]" id="check" value="4" <? if(!empty($check)){if(in_array('4',$check)){ echo 'checked';}}?>>Hockey<br>
<input type="submit" name="submit" value="submit" id="submit">
</form>
</div>
</body>
</html>
<?php 
	Class login{
		public function info($username,$conn){

			$res_result=array();

			if(!empty($username)){
				$sql="select username,fullname,age,work,college,mobile from register where username=$username";
			}
			//else{
			//	$sql= "select * from register";
			//}

			$query=mysqli_query($conn,$sql);
			while($result=mysqli_fetch_array($query,MYSQL_ASSOC)){
				$res_result[]=$result;
			}

			return $res_result;
			

		}
	}
?>
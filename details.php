<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Details Page</title>
</head>
<body>

<?php
print_r($_SESSION['login']);
?>
<div id="container">
   <h1> User details</h1>
   <a href="logout.php">Logout</a>
  <table>
   		<tr>
   			<th>Fullname</th>
   			<th>Age</th>
   			<th>Work</th>
   			<th>College</th>
   			<th>Mobile</th>
   		</tr>

 		<tr>
   			<td><?php echo $_GET['0']['username'] ?></td>
   			<td><?php echo $_GET['0']['fullname'] ?></td>
   			<td><?php echo $_GET['0']['mobile'] ?></td>
   			<td><?php echo $_GET['0']['age'] ?></td>
   			<td><?php echo $_GET['0']['college'] ?></td>
   		</tr>
        
   </table>
   </div>
</body>

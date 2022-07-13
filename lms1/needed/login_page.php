<?php
   include("config.php");
   session_start();
   if(isset($_POST['Login'])){	
   
	$user_id =  $_POST['user_id'];
	$password =  $_POST['password']; 
	
	$sql = "SELECT user_id FROM lms.staff WHERE user_id = '$user_id' and password = '$password'";
	
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);    // this returns boolean value
        if($row){
            echo " existing user and password.";
		}else {
         echo "Your Login Name or Password is invalid";
		}
	$result1=mysqli_query($db,"SELECT user_type FROM lms.staff WHERE user_id = '$user_id'");

	$row1= mysqli_fetch_array($result1);

	$name = $row1['user_type'];

	echo $name;
	if($name=='staff')
	{
			header("Location: ../staff/leave_request.html");

	}
	else if($name=='pc')
	{
			header("Location: ../pc/pc.html");

	}
   }
?>
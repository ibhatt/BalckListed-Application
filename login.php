<?php
session_start(); // Starting Session
if (isset($_POST['login'])){
	
	$servername = "localhost";
	$username = "ibhatt";
	$password = "*********";
	$database = "hotelLogins";
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	
	if (!$conn) {
		die("Connection failed: ". mysqli_connect_error());
	}

		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);		
		
		$sql2 = "SELECT * FROM `hotelRepresentative` where username = '$username' and password = '$password' ";
		$result2 = mysqli_query($conn,$sql2);		
		$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result2);
				
		if (!$result2) {
			die('Error reported' . mysqli_error($conn) . mysqli_errno($conn));
		}
		
		if ($count == 1){
			$_SESSION['login_user']=$username;
			header( "refresh:5;url=welcome.php" );
			echo "Logging in...";
		}else{
			header( "refresh:5;url=Loginform2.php" );
			echo "Username or Password is invalid";
		}
	}

?>

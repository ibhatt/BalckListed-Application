<?php
	
	if (isset($_POST['register'])){
		$servername = "localhost";
		$username = "ibhatt";
		$password = "ektasumit2628";
		$database = "hotelLogins";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		
		if (!$conn) {
			die("Connection failed: ". mysqli_connect_error());
		}		
		
		// Check if the "Sender's Email" input field is filled out
		$uname = $_POST['usrname'];
		// Sanitize E-mail Address
		$uname =filter_var($uname, FILTER_SANITIZE_EMAIL);
		// Validate E-mail Address
		$uname= filter_var($uname, FILTER_VALIDATE_EMAIL);
		if (!$uname){
			header( "refresh:5;url=Loginform2.php" );
			echo "Invalid Sender's Email";
		}else {
			
			$pwrd = $_POST['psw'];
			$confirmpsw = $_POST['confirmpsw'];
			if ($pwrd != $confirmpsw) {
				header( "refresh:5;url=Loginform2.php" );
				echo("Error... Passwords do not match");			
			}else{
				
				$hotelname = $_POST['hotelname'];
				$hotellocation = $_POST['hotelloc'];
				
				
				$sql2 = "SELECT * FROM `hotelRepresentative` where username = '$uname' and hotelName = '$hotelname' ";
				$result2 = mysqli_query($conn,$sql2);
				$row = mysqli_fetch_array($result2,MYSQLI_ASSOC);
				
				if(mysqli_num_rows($result2) == 1)
				{
					header( "refresh:5;url=Loginform2.php" );
					echo "Sorry... This email already exist.. Please Log In";
				}
				else
				{
				
					$sql = "Insert into hotelRepresentative(username, password, hotelName, hotelCity, time) values('$uname','$pwrd','$hotelname','$hotellocation', NOW())";
					$result = mysqli_query($conn,$sql);
					if (!$result) {
						die('Error reported' . mysqli_error($conn) . mysqli_errno($conn));
					}
					
					header( "refresh:5;url=Loginform2.php" );
					echo("Your registration is Successful");
					
					$subject = "Thank you ". $hotelname ;
					$message = "Thank you for your registration. Please Login to start using your services.";

					$headers = 'From: ibhatt@mail.ccsf.edu'. "\r\n"; // Sender's Email
					$headers .= 'Cc: rinkiraval@gmail.com'. "\r\n"; // Carbon copy to Sender
					// Message lines should not exceed 70 characters (PHP rule), so wrap it
					$message = wordwrap($message, 70);
					// Send Mail By PHP Mail Function
					mail($uname, $subject, $message, $headers);
				}
				}
		
		}
		
	}
mysqli_close($conn);	
?>
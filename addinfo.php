<?php
	
	if (isset($_POST['register'])){
		$servername = "localhost";
		$username = "ibhatt";
		$password = "ektasumit2628";
		$database = "guestInfo";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		
		if (!$conn) {
			die("Connection failed: ". mysqli_connect_error());
		}		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$idtype = $_POST['idtype'];
		$idnumber = $_POST['idno'];
		$gender = $_POST['gender'];
		$reason = $_POST['reason'];
		
		$sql = "SELECT * FROM `infomation` WHERE idnumber = '$idnumber'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		
		if($count == 1)
		{
			header( "refresh:5;url=welcome.php" );
			echo "Sorry... This name already exists in database.";
		}else{
		
			$sql2 = "INSERT INTO `infomation`(`firstname`, `lastname`, `idtype`, `idnumber`, `gender`, `reason`, `create`) VALUES ('$firstname','$lastname','$idtype','$idnumber', '$gender', '$reason', NOW())";
			
			$result2 = mysqli_query($conn,$sql2);
			if (!$result2) {
				die('Error reported' . mysqli_error($conn) . mysqli_errno($conn));
			}
		
			header( "refresh:5;url=welcome.php" );
			echo("Information is added");						
			}
	}
?>
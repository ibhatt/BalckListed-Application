<?php	
	if (isset($_POST['submit'])){
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
		$idnumber = $_POST['idno'];
		
		$sql = "SELECT * FROM `infomation` WHERE idnumber = '$idnumber'";
		$result = mysqli_query($conn,$sql);
		
		$count = mysqli_num_rows($result);
		
		if($count == 1)
		{
			header( "refresh:5;url=welcome.php" );
			while ($row = mysqli_fetch_assoc($result)){
				$reason = $row["reason"];
				#echo $reason;
				print "<script type='text/javascript'>"; 
				print "alert('Do not rent to ".$firstname." ".$lastname."\\nReason: ".$reason."')"; 				
				print "</script>";				
			}			
		}else
		{
			header( "refresh:5;url=welcome.php" );
			echo "<script type='text/javascript'> alert('You can rent to ".$firstname." ".$lastname."'); </script>";
		}
	}
?>
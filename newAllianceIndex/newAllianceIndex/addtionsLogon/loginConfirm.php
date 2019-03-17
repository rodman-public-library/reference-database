<?php
	session_start();
	
	include 'connect.inc.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$key = "RPLAI";
	$hashedPass = sha1($key.$username.$password);
	
	if (strlen($username) == 0){
		echo 'No user name listed!';
	}
	else{
		if (strlen($password) == 0){
			echo 'No password!';
		}
		else{
			$sql = "Select * from Users Where Username = '".$username."' AND Password = '".$hashedPass."';";
			$conn = OpenCon();
			$results = $conn->query($sql);
			$i = 0;
			while ($row = mysqli_fetch_array($results)) {
				for($i = 0; $i < 1; $i++){
					$usernameCleared = $row['Username'];
					$passwordCleared = $row['Password'];
					$fname = $row['FName'];
					$lname = $row['LName'];
				}
			}
			if (strlen($usernameCleared) == 0){
				header('Location: login.php?userorpassincorect=true');
			}
			else{
				if (strlen($passwordCleared) == 0){
					header('Location: login.php?userorpassincorect=true');
				}
				else{
					$_SESSION["usernamePassing"]=$usernameCleared;
					$_SESSION["fnamePassing"]=$fname;
					$_SESSION["lnamePassing"]=$lname;
					header('Location: recordCreater.php');
				}
			}
		}
	}
?>
<?php
	require_once 'connection.php';
	session_start();
	if(ISSET($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$query = mysqli_query($conn, "SELECT * FROM patient WHERE email = '$email' AND password = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['patient_id']=$fetch['patient_id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='patient.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='Patientlogin.html'</script>";
		}
		
	}

?>
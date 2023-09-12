<?php
	require_once 'connection.php';
	session_start();
	if(ISSET($_POST['login'])){
		$email = $_POST['email'];
		$password =$_POST['upassword'];
    
	
		@$query = mysqli_query($conn, "SELECT * FROM doctor WHERE email = '$email' AND upassword = '$password'") or die(mysqli_error());
		$fetchd = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){
			$_SESSION['Doctor_Id']=$fetchd['Doctor_Id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='Doctor.php'</script>";
		}else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='login.html'</script>";
		}
		
	}

?>
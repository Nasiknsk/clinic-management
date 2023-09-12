<?php
	require_once 'connection.php';
	session_start();
	if(ISSET($_POST['submit']))
    {
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		@$query = mysqli_query($conn, "SELECT * FROM employee WHERE email = '$email' AND passwords = '$password'") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0){

			$_SESSION['employee_id']=$fetch['employee_id'];

			$q1 =mysqli_query($conn,"SELECT type FROM employee WHERE email='$email'");
			$res = mysqli_fetch_array($q1);
            $type=$res['type'];

            if($type=="Admin")
            {
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='Admin1.php'</script>";
		    }

		     else{
		     	echo "<script>alert('Login Successfully!')</script>";
			    echo "<script>window.location='employee.php'</script>";
		     }
		}
		else{
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='employeelogin.html'</script>";
		}
		
	}

?>
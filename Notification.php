<?php
    if(isset($_POST['submit']))
	{
	@$empId = $_POST['id'];
	$message = $_POST['message'];
	@$date = $_POST['date'];
	@$time = $_POST['time'];
	//database connection
	$conn = new mysqli('localhost', 'root', '','cli');
	
	if($conn->connect_error){
		die('Connection Faild : ' .$conn->connect_error);
	} else{
		$sql="INSERT INTO notification(empId,message,date,time)VALUES('$empId','$message','$date','$time')";
		$query=mysqli_query($conn,$sql);
		if($sql)
		{
			header('location:send.php');
		}
	}
}
?>
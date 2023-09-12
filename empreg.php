<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','cli');


if($con==TRUE)
{
   
}
if(isset($_POST['submit']))
{

    $Fullname = $_POST['fullname'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    

    $query=mysqli_query($con,"SELECT email FROM employee WHERE email='$email' or Nic='$nic'");
    
    $count = mysqli_num_rows($query);
    if($count>0)
    {
        echo '<script>alert("You have already an account with this email or NIC")</script>';
        
    }
    
    else
    {
     
    
      $sql = "INSERT INTO employee (fullname,Nic,adress,city,phone,email,passwords,type)
      VALUES ('$Fullname', '$nic', '$address', '$city', '$phone', '$email', '$password','$type')";
      $rs = mysqli_query($con, $sql);
      if($rs)
      {
          header('Location:displayemp.php');
       
      }
      else
      {
          echo "not inserted";
      }
    }
}



?>
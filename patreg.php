<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','cli');


if($con==TRUE)
{
   
}
if(isset($_POST['submit']))
{

    $Fullname = $_POST['fullname'];
    $DOB = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $mobile = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['upassword'];
    $date2=date('y/m/d');

    $query=mysqli_query($con,"SELECT email FROM patient WHERE email='$email'");
    $count = mysqli_num_rows($query);
    if($count>0)
    {
        echo '<script>alert("You have already an account with this email")</script>';
        
    }
    
    else
    {

    
      $sql = "INSERT INTO patient(patientname,dob,address,city,phone,email,password)
      VALUES ('$Fullname', '$DOB', '$address', '$city', '$mobile', '$email', '$password')";
      $rs = mysqli_query($con, $sql);
      if($rs)
      {
          header('Location:displaypat.php');
        
      }
      else
      {
        echo "not inserted";
      }
    }
}



?>
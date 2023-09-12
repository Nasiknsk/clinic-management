<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','cli');


if($con==TRUE)
{
   
}
if(isset($_POST['submit']))
{

    $Fullname = $_POST['fname'];
    $slmc = $_POST['slmcid'];
    $special1 = $_POST['specialist1'];
    $special2 = $_POST['specialist2'];
    $hospital = $_POST['hospital'];
    $email = $_POST['email'];
    $password = $_POST['upassword'];
    $nic = $_POST['nic'];
    $adress = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $room = $_POST['room'];

    

    
    $query=mysqli_query($con,"SELECT email FROM doctor WHERE email='$email' or slmc='$slmc' or nic='$nic'");
    
    $count = mysqli_num_rows($query);
    
    if($count>0)
    {
        echo '<script>alert("You have already an account with this email or slmc id")</script>';
        
    }
    

    else
    {
        $sql = "INSERT INTO doctor (Fullname,slmc,special1,special2,hospital,email,upassword,nic,adress,city,Gender,Fee)
        VALUES ('$Fullname', '$slmc', '$special1', '$special2', '$hospital', '$email', '$password','$nic','$adress','$city','$gender','$room')";
        $rs = mysqli_query($con, $sql);
        if($rs)
         {
           header('location:displaydoc.php');
         }
        else
           {
             echo "not inserted";
           }
    }
}
?>
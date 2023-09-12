<?php
 
 session_start();
 $conn = mysqli_connect('localhost', 'root', '','cli');
 if(!ISSET($_SESSION['patient_id'])){
    header('location:hme1.php');
}
if(!ISSET($_SESSION['Doctor_Id'])){
    header('location:hme1.php');
}
 

  $sql="SELECT p.['patientname'] from patient p INNER JOIN booking b ON p.['patient_id']=b.['patient']";
  $query=mysqli_query($conn,$sql);

  
    echo $query;
   
 

?>
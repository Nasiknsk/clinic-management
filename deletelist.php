<?php 
$conn=mysqli_connect('localhost','root','','cli');
@$userid=$_GET['data'];
     if(isset($_GET['data']))
     

       

         
        // $query = "DELETE FROM doctor WHERE Doctor_Id = $userid"; 
         $delete_query= mysqli_query($conn,"DELETE FROM doctor WHERE Doctor_Id = $userid");
         header("Location: displaydoc.php");
         echo "<script>alert('You have successfully update the data');</script>";
     
 ?>




<?php
require'connection.php';
session_start();
if(!ISSET($_SESSION['Doctor_Id'])){
    header('location:login.html');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Doctor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="doctor.css">
  
</head>
<body>

<h1 align="center">
  Doctor
</h1>
 
 
  
  <ul style="background-color: lightblue;padding:0px;margin-top:-9px;margin-left: -12px;margin-right: -12px;">
  	   
        <li>
          <a  href="hme2.php" name="hme2.php">Home</a>
        </li>

        <li >
          <a  href="Notificationpat.php">Notification</a>
        </li>
       

        <li >
          <a  href="change_password.php" tabindex="-1" >Profile</a>
        </li>
        
      </ul>
      <?php
				
			
				
				$query = mysqli_query($conn, "SELECT Doctor_ID,Fullname FROM doctor WHERE Doctor_Id='$_SESSION[Doctor_Id]'");
				$fetch = mysqli_fetch_array($query);
				
				
			?>
           
            
			Name<input type=text name="uname" value="<?php echo $fetch['Fullname'];?> " disabled>
      

<br>





<?php
 
 
 



$today = date('y/m/d');
//@$idd=$_SESSION[Doctor_Id];

@$sql="SELECT A.patientname, A.patient_id,B.token_no,B.appointment_date,B.status,B.booking_id FROM patient A , booking B where A.patient_id=B.patient and B.appointment_date='$today'and B.booking_status='Booked' and B.doctor='$_SESSION[Doctor_Id]' ";


$results=mysqli_query($conn,$sql);


				


?>


<head>
	<title>Booking Details (Doctor Page)</title>
	<link rel="stylesheet" href="DrBook.css">
</head>

    <form action="Doctor.php" method="post">
  

	
    <label for="date">To Day</label>
	<input type="text"  value="<?php echo $today ;?>"  disabled>
    <br>
    <label for="date">Date</label>
	<input type="date" name="sdate" >
    <input type="submit" name="search" value="search"><br>

    
	
    
    </form>
	
	<center>
	<section>
      
        <table>
            <tr>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Treatment</th>
                <th>Status</th>
                
               
                
            </tr>
            <?php
while ($rows = $results->fetch_assoc()) {
    $Pid = $rows['patient_id'];
    //@$id=$_SESSION['patient_id'];
?>

<tr>
    <td><?php echo $rows['patient_id']; ?></td>
    <td><?php echo $rows['patientname']; ?></td>
    <td>Add treatment
        <a href="treatment.php?data=<?php echo $Pid; ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
        <a href="Displaytreatment.php?data1=<?php echo $Pid; ?>" class="mr-3" title="view Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
    </td>
    <td>
        <?php echo $rows['status']; ?>
        <a href="Doctor.php?data=<?php echo $rows['booking_id']; ?>" class="mr-3" title="update record" data-toggle="tooltip" onclick="return confirm('Do you really want to complete ?');"><span class="fa fa-pencil"></span></a>
    </td>
</tr>

<?php
}
?>

        </table>
    </section>
</body>
</html>
<?php
if(isset($_GET['data']))
{
  require'connection.php';
    $rid=intval($_GET['data']); 
    $sq="UPDATE booking set status='complete' where booking_id=$rid";
    $sql=mysqli_query($conn,$sq);
    echo "<script>alert('session completed');</script>"; 
    echo "<script>window.location.href = 'Doctor.php'</script>"; 
}
?>
<?php
  if(isset($_POST['search']))
  {
    @$sdate=$_POST['sdate'];
    $sql3="SELECT A.patientname, A.patient_id,B.token_no,B.appointment_date,B.status,B.booking_id FROM patient A , booking B where A.patient_id=B.patient and B.appointment_date='$today'and B.booking_status='Booked' and B.doctor='$_SESSION[Doctor_Id]' ";
    $results2=mysqli_query($conn,$sql3);

    ?>
    <center>
	<section>
      
        <table>
            <tr>
                <th>Patient Id</th>
                <th>Patient Name</th>
                <th>Treatments</th>
                <th>Status</th>
                
               
                
            </tr>
        
            <?php
            echo $sdate;
            
                while(@$rows2=mysqli_fetch_array($results2))
                {
                   $Pid=$rows2['patient_id'];
                  // $id=$_SESSION['patient_id'];
               

            ?>
            <tr>
                <form action="Doctor.php" method="post">

                <td><?php echo $rows2['patient_id'];?></td>
                <td><?php echo $rows2['patientname'];?></td>
                <td>Add treatment
                
                <a href="Displaytreatment.php?data1='<?php echo $Pid; ?>'" class="mr-3" title="view Record" data-toggle="tooltip"><span class="fa fa-eye" target="_self"></span></a>
                </td>
                <td>
                <?php echo $rows2['status'];?>
               
                </td>
                
                </form>

                
                
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
    
  <?php
  }
  ?>


	
	



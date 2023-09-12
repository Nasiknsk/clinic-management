<?php
session_start();
if(!ISSET($_SESSION['patient_id'])){
    header('location:patientlogin.html');
}
$conn=mysqli_connect('localhost','root','','cli');
$name="SELECT * FROM DOCTOR ORDER BY Fullname ASC";
$result=mysqli_query($conn,$name);

$name1="SELECT * FROM booking ";
$result1=mysqli_query($conn,$name1);



if(isset($_GET['data2']))
{
    $rid1=intval($_GET['data2']);
    $q1==mysqli_query($conn,"SELECT  booking_status FROM booking  WHERE booking_id='$rid1'");
    $res=mysqli_fetch_array($q1);
    $st=$res['booking_status'];

    
      $rid=intval($_GET['data2']);
       $sql=mysqli_query($conn,"UPDATE  booking set booking_status='canceled' WHERE booking_id=$rid");

       echo "<script>alert(' Booking Cenceled sucsessfully');</script>"; 
       echo "<script>window.location.href = 'bookingpat.php'</script>"; 
    
}


$query1 = mysqli_query($conn, "SELECT * FROM patient WHERE patient_id='$_SESSION[patient_id]'") or die(mysqli_error());
$fetch = mysqli_fetch_array($query1);
$date=$fetch['dob'];
$today = date("y-m-d");
$day=date("d/m/y");
$diff = date_diff(date_create(@$date), date_create($today));


?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>PatientBooking</title>
  <link rel="stylesheet" href="register2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Booking</div>
    <div class="content">
      <form action="bookingpat.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">
              Full Name</span>
            <input type="text" placeholder="Enter your name" name="fullname" pattern="[A-Za-z\s]+" value="<?php echo $fetch['patientname'];?> " disabled required>
          </div>
          <div class="input-box">
            <span class="details">
             Age</span>
            <input type="text"  name="age" value="<?php echo $diff->format('%y');?>" disabled
              required>
           </div>
          <div class="input-box">
            <span class="details">
              Select Doctor</span>
            <select name="doctor" required>
               <?php
               while($row=mysqli_fetch_array($result))
               {
                ?> 
              <option  value="<?php echo $row['Doctor_Id']; ?>"><?php echo $row['Fullname']; ?></option>
              <?php
               }
               ?>
            </select>
          </div>
          <div class="input-box">
            <span class="details">
              Date</span>
            <input type="date"name="date" min="<?php echo $day;?>" required>
         
            


          <div class="button">
            <input type="submit" value="Book" name="submit"><br><br>
            
          </div>
      </form>
    </div>
  </div>


<?php
if(isset($_POST['submit']))
{
  $pat_id=$fetch['patient_id'];
  $doc_id=$_POST['doctor'];
  $date1=$_POST['date'];
  $date2=date('y/m/d');
  $status="incomplete";
  $status2="Booked";

  $d1=date('y.m.d');
  $date_time1=date_create($d1);
  $date_time2=date_create($date1);
  $interval=date_diff($date_time1,$date_time2);
  
  $date_dif=$interval->format('%R%a');




   
  $query=mysqli_query($conn,"SELECT * FROM booking WHERE appointment_date='$date1' and patient='$pat_id' and doctor='$doc_id'");
    
  $count = mysqli_num_rows($query);

 
  
  if($count>0)
  {
      echo '<script>alert("You have already a booking on that date")</script>';
      
  }
  
  if($date_dif>=7 ||$date_dif<=-1)
  {
    echo '<script>alert("invalid booking date")</script>';

  }


  else
  {


  
  $sql="INSERT INTO booking (token_no,date,appointment_date,patient,	doctor,status,booking_status )VALUES('$counts','$date2','$date1','$pat_id',' $doc_id','$status','$status2')";
  $rs = mysqli_query($conn, $sql);

  $sql1="INSERT INTO payment (date,adate,patient,doctor,status,pstatus )VALUES('$date2','$date1','$pat_id',' $doc_id','$status','$status')";
  $rs1 = mysqli_query($conn, $sql1);
  if($rs1)
  {
    echo "ok";
  }
  else
  {
    echo "not";
  }

  

  
  
        if($rs)
         {
          echo '<script>alert("Your booking is added")</script>';
           header('location:bookingpat.php');
         }
        else
           {
             echo "your booking is not added";
           }
 
 }
}
  $sql2=mysqli_query($conn,"SELECT * FROM booking where patient='$_SESSION[patient_id]'");

?>

 
<head>
<meta charset="UTF-8">
    <title>Booking View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            border :2;
        }
        h1{
             font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: rgb(111, 97, 97);
         }
 
        
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            text-align: center;
            padding:5px;
        }
 
        td {
            font-weight: lighter;
        }
        
    </style>
     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
 
<body>
    
    <section>
       <h1>
        Booking Updates
    </h1>
   
        <table>
            <tr>
                <th>Booking Id</th>
                <th>Patient Name</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Status</th>
                <th>Booking Status</th>
                <th>Action</th>
                
            </tr>
        
            <?php
            
                while($rows=$sql2->fetch_assoc())
                {
                $B_id     = $rows['booking_id'];
                $B_Name    = $fetch['patientname'];
                $B_doctor    = $rows['doctor'];
                @$B_date   = $rows['appiontment_date'];
                $Book_status   = $rows['booking_status'];
                $B_status   = $rows['status'];
                



            ?>
            <tr>
                
                <td><?php echo $rows['booking_id'];?></td>
                
                <td><?php echo $fetch['patientname'];?></td>
                <td><?php echo $rows['doctor'];?></td>
                <td><?php echo $rows['appointment_date'];?></td>
                <td><?php echo $rows['booking_status'];?></td>
                <td><?php echo $rows['status'];?></td>

                <td>

               
                
                <a href="bookingpat.php?data2=<?php echo ($rows['booking_id']);?>" class="cancell" title="cancell" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">cancell <span class="fa fa-trash"></span></a>
                
                </td>
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
  </body>
</html>


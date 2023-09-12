<?php
 
 session_start();
 $con = mysqli_connect('localhost', 'root', '','cli');
 
 
 if($con==TRUE)
 {
    
 }

$sql = " SELECT * FROM patient ORDER BY patient_id  DESC ";
$result = mysqli_query($con,$sql);
if(isset($_GET['data']))
{
    $rid=intval($_GET['data']); 
    $sql=mysqli_query($con,"delete from patient where patient_id =$rid");
    echo "<script>alert('Data deleted');</script>"; 
    echo "<script>window.location.href = 'displaypat.php'</script>"; 
}

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
    <title>listView</title>
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
        }
 
        td {
            font-weight: lighter;
        }
        input
        {
            background-color:red;
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
        User List
    </h1>
    <a href="patientregister.html">Add Users</a>
        <table>
            <tr>
                <th>Patient_ID</th>
                <th>Full Name</th>
                <th>DOB</th>
                <th>Address</th>
                <th>City</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
               
            </tr>
        
            <?php
            
                while($rows=$result->fetch_assoc())
                {
                $P_id     = $rows['patient_id'];
                $P_Name    = $rows['patientname'];
                $P_dob    = $rows['dob'];
                $P_address   = $rows['address'];
                $P_city   = $rows['city'];
                $P_Phone   = $rows['phone'];
                $P_email     = $rows['email'];
                $P_password = $rows['password'];
                




            ?>
            <tr>
                
                <td><?php echo $rows['patient_id'];?></td>
                <td><?php echo $rows['patientname'];?></td>
                <td><?php echo $rows['dob'];?></td>
                <td><?php echo $rows['address'];?></td>
                <td><?php echo $rows['city'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['password'];?></td>
                
                <td>

                <a href="updatepatient.php?data='<?php echo $P_id ; ?>'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                
                <a href="displaypat.php?data=<?php echo ($rows['patient_id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><span class="fa fa-trash"></span></a>
                
                </td>
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
  </body>
</html>




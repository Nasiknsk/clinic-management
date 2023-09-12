<?php
 
 session_start();
 $con = mysqli_connect('localhost', 'root', '','cli');
 
 
 if($con==TRUE)
 {
    
 }

$sql = " SELECT * FROM doctor ORDER BY Doctor_Id DESC ";
$result = mysqli_query($con,$sql);
if(isset($_GET['data']))
{
    $rid=intval($_GET['data']); 
    $sql=mysqli_query($con,"delete from doctor where Doctor_Id=$rid");
    echo "<script>alert('Data deleted');</script>"; 
    echo "<script>window.location.href = 'displaydoc.php'</script>"; 
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
    <a href="register.html">Add new doctor</a>
        <table>
            <tr>
                <th>Doctor_ID</th>
                <th>Full Name</th>
                <th>SLMC NO</th>
                <th>Special 1</th>
                <th>Special 2</th>
                <th>Hospital</th>
                <th>Email</th>
                <th>NIC</th>
                <th>Address</th>
                <th>City</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Fee</th>
                <th>Edit</th>
            </tr>
        
            <?php
            
                while($rows=$result->fetch_assoc())
                {
                $D_id     = $rows['Doctor_Id'];
                $D_Name    = $rows['Fullname'];
                $D_slmc    = $rows['slmc'];
                $D_Spcl1   = $rows['special1'];
                $D_Spcl2   = $rows['special2'];
                $D_hsptl   = $rows['hospital'];
                $D_email   = $rows['email'];
                $D_Nic     = $rows['nic'];
                $D_address = $rows['adress'];
                $D_city    = $rows['city'];
                $D_upass   = $rows['upassword'];
                $D_Gender  = $rows['Gender'];
                @$D_room  = $rows['room'];




            ?>
            <tr>
                
                <td><?php echo $rows['Doctor_Id'];?></td>
                <td><?php echo $rows['Fullname'];?></td>
                <td><?php echo $rows['slmc'];?></td>
                <td><?php echo $rows['special1'];?></td>
                <td><?php echo $rows['special2'];?></td>
                <td><?php echo $rows['hospital'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['nic'];?></td>
                <td><?php echo $rows['adress'];?></td>
                <td><?php echo $rows['city'];?></td>
                <td><?php echo $rows['upassword'];?></td>
                <td><?php echo @$rows['Gender'];?></td>
                <td><?php echo @$rows['room'];?></td>
                <td>

                <a href="updateDetails.php?data='<?php echo $D_id; ?>'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil" target="_self"></span></a>
                
                <a href="displaydoc.php?data=<?php echo ($rows['Doctor_Id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><span class="fa fa-trash"></span></a>
                
                </td>
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
  </body>
</html>




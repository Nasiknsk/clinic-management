<?php
session_start();
$conn=mysqli_connect('localhost','root','','cli');

$query=mysqli_query($conn,"SELECT * FROM doctor");
$today=date('y/m/d');





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
        
    </style>
     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
  
</head>
<body>






    <form action="#" method="post">
    <label for="date">To Day</label>
	<input type="text"  value="<?php echo $today ;?>"  disabled>
    <br>
    <label for="doctor">Doctor</label>
    <select name="doctor" required>
               <?php
               while($row=mysqli_fetch_array($query))
               {
                $Did=$row['Doctor_Id'];
                ?> 
              <option  value="<?php echo $row['Doctor_Id']; ?>"><?php echo $row['Fullname']; ?></option>
              <?php
               }
               ?>
    </select>
	
	
    <input type="submit" name="search" value="search"><br>
    </form>
	<?php
     @$results=mysqli_query($conn,"SELECT * FROM payment where doctor=112 and adate='$today'");
    ?>
	<center>
	<section>
      
        <table>
            <tr>
                <th>Doctor Id</th>
                <th>Patient ID</th>
                <th>Treatment</th>
                <th>Payment</th>
                <th>Amount</th>
                
               
                
            </tr>
        
            <?php
            
                while(@$rows=mysqli_fetch_array($results))
                {
                   @$Pid=$rows['booking'];
                   @$dc=$rows['doctor'];
                   @$id=$_SESSION['booking'];
               

            ?>
            <tr>
                <form action="Pay.php" method="post">

                <td><?php echo $rows['doctor'];?></td>
                <td><?php echo $rows['patient'];?></td>
                
                <td>
                <?php echo $rows['status'];?></td>
                <td>
                <?php echo @$rows['pstatus'];?>
                <a href="Pay.php?data=<?php echo ($rows['payment_id']);?>" class="mr-3" title="update record" data-toggle="tooltip" onclick="return confirm('Do you really want to complete ?');"><span class="fa fa-pencil"></span></a>
                </td>
                <td>
                <?php echo $rows['amount'];?></td>
                <td>
                
                </form>

                
                
                
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
    
    $Qry="select room from doctor where Doctor_Id='$dc'";
    $qty=mysqli_connect($conn,$Qry);
    $rid=intval($_GET['data']); 
    $sq="UPDATE payment set pstatus='complete' ,amount=2500 where payment_id='$rid'";
    $sql=mysqli_query($conn,$sq);
    echo "<script>alert('payment success');</script>"; 
    echo "<script>window.location.href = 'payment.php'</script>"; 
}
?>


	



<?php
session_start();
if(!ISSET($_SESSION['employee_id'])){
    header('location:employeelogin.html');
}
$conn=mysqli_connect('localhost','root','','cli');
$sql = " SELECT * FROM notification ORDER BY date DESC ";
@$result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="Admin.css">
  <title>Patients Page</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="patientsStyle.css">
	<title>list</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <style>
        a{
        text-decoration:none ;
        display:inline-block;
        padding:8px 16px;
    }
    a:hover{
       background-color:#ddd;
       color:black;
    }
    .back{
        background-color: lightblue;
        color:black;
    }
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            border :;
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
			font: size 20px;
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


 
 
  
  <ul style="background-color: lightblue;padding:0px;margin-top:-9px;margin-left: -12px;margin-right: -12px;">
  	    <a class="navbar-brand" href="#" style="margin: 20px; color:blue ; text-decoration:none; font-family: fantasy;" >CLINIC</a>
        <li>
          <a  href="hme2.php" >Home</a>
        </li>
        <li>
          <a href="send.php">Notification</a>
        </li>
        <li >
          <a  href="payment.php">Payment </a>
        </li>
        <li >
          <a  href="update.html" >Add</a>
        </li>
        <li >
          <a  href="#" tabindex="-1" >Profile</a>
        </li>
        <li >
          <a  href="graph.php" tabindex="-1" >graph</a>
        </li>
       
        <li>
          <a href="VideoUpload.php" tabindex="-1"> Video</a>
      </li>
      </ul>
      <?php
				require'connection.php';
			
				
				$query = mysqli_query($conn, "SELECT * FROM employee WHERE employee_id='$_SESSION[employee_id]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
				
				
			?>
           
            
		

<br>
<center>
<img src="clinicdoc\img\adminImage.jpg"   height="600px" width="75%" style="border-radius:3%" > </center>
<section>
       <h1>
        Notification List
    </h1>
    
        <table width = "50%">
        
            <?php
            
                while(@$rows=mysqli_fetch_assoc($result))
                {
                
                
               
         
            ?>
            <tr>
                
                <td><?php 
               
               
                echo $rows['message']."<br>";?></td>
               
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>


</body>
</html>

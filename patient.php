<?php
session_start();
if(!ISSET($_SESSION['patient_id'])){
    header('location:patientlogin.html');
}
$conn = new mysqli('localhost', 'root', '','cli');
?>
<html>
<head>
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
<body align="left">
	<h1 align="center">
		Patients
	</h1>
	<div class="menu-bar" >
		<ul>
			<li><a href="hme2.php">Home</a></li>
			<li><a href="Notificationpat.php">Notification</a></li>
			<li><a href="bookingpat.php">Appoinment</a>
			</li>
			<li><a href="#">Profile</a></li>
			<li><a href="Displaytreatment.php">treatments</a></li>
           
			</ul>
            </div>
            <?php
				require'connection.php';
			
				
				$query = mysqli_query($conn, "SELECT * FROM patient WHERE patient_id='$_SESSION[patient_id]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
				
				$results = mysqli_query($conn, "SELECT * FROM notification ");
			?>
           
            
		   <img src="clinicdoc\img\patient1.jpg"   height="600px" width="100%" style="border-radius:3%">

		   

    <section>
       <h1>
        Notification List
    </h1>
    
        <table width = "50%">
        
            <?php
            
                while(@$rows=mysqli_fetch_assoc($results))
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
<?php

?>

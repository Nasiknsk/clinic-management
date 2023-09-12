<?php
 
 session_start();
 @$con = mysqli_connect('localhost', 'root', '','cli');
 

 

$sql = " SELECT * FROM notification ORDER BY date DESC ";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
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
    <a href = "patient.php" class="back" width=10px>&laquo;Back</a>
    <section>
       <h1>
        Notification List
    </h1>
    
        <table width = "50%">
        
            <?php
            
                while($rows=$result->fetch_assoc())
                {
                
                
               
                $E_Message   = $rows['message'];
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

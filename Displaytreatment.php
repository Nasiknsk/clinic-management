<?php
 
 session_start();
 $con = mysqli_connect('localhost', 'root', '','cli');
 
 
 if($con==TRUE)
 {
    
 }





?>

<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
    <title>Treatment</title>
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
        
    </style>
     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
 <?php
   if(isset($_GET['data1']))
   {
     require'connection.php';
       $rid=intval($_GET['data1']); 
       @$sql = " SELECT * FROM treatment WHERE patient=38 ";
       $result = mysqli_query($con,$sql);
       
   }

?>
<body>
    
    <section>
     
        <table>
            <tr>
                <th>Treatments</th>
                
            </tr>
        
            <?php
            
                while($rows=$result->fetch_assoc())
                {
                $T_date     = $rows['date'];
                $T_treat    = $rows['treatments'];
                $T_doc    = $rows['doctor'];
                




            ?>
            <tr>
                
                <td><input type="text" name="date" value="<?php echo $T_date; ?>" disabled><br>
                <textarea  name="treat" rows="10" cols="50" disabled><?php echo $rows['treatments'];?>" </textarea><br>
                <input type="text" name="date" value="<?php echo $T_doc; ?>" disabled><br>
            
            
            
            </td>
              
                
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
  </body>
</html>




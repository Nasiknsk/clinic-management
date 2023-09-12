<?php session_start();?>
<html>
<head>
    <title>Chnage Password </title>
</head>
<body>
    <?php include_once('connection.php');
    if(isset($_POST['Submit'])){
        $email=$_POST['useremail'];
        $opwd=$_POST['opwd'];
        $npwd=$_POST['npwd'];
        $cpwd=$_POST['cpwd'];

        $query=mysqli_query($conn,"SELECT email,upassword from doctor where email='$email' AND upassword='$opwd'");
        $num=mysqli_fetch_array($query);
        
        if($num>0){
            $con=mysqli_query($conn, "UPDATE doctor set upassword='$npwd' Where email='$email'");
            $_SESSION['msg1']="Password Change Successfuly";
            header('location:Doctor.php');
        }else{
            $_SESSION['msg1']="Password does not match";
        }
    }
    
    ?>
    
    <form name="chngpwd" action="" method="post" onSubmit="return valid();">
    <table align="center">
        <tr height="50">
            <td>Email   :</td>
            <td><input type="text" name="useremail" id="useremail"></td>
        </tr>
        <tr height="50">
            <td>Old Password</td>
            <td><input type="password" name="opwd" id="opwd"></td>
        </tr>
        <tr height="50">
            <td>New Password</td>
            <td><input type="password" name="npwd" id="npwd"></td>
        </tr>
        <tr height="50">
            <td>Confirm Password</td>
            <td><input type="password" name="cpwd" id="cpwd"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" onclick="myFunction()" value="Change Password"/> </td>
        </tr>
    </table>
    <center><p style="color:red;"><?php echo $_SESSION['msg1'];?><?php $_SESSION['msg1']="";?></p></center>
    <script>
        function myfunction()
        {
        var x=document.getElementById("npwd");
        var y=document.getElementById("npwd");
         if(x==y)
         {
            alert('password matched');
         }
         else
         {
            alert('password doesnot matched');
         }
        }
</body>
</html>
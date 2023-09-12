<?php
   
    // Connection Created Successfully
    $conn = mysqli_connect('localhost' , 'root' , '' , 'cli') or die("Connection Failed");
    session_start();

    // Store All Errors
    $errors = [];

    // if forgot button will clicked
    if (isset($_POST['forgot'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM doctor WHERE email = '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        // if query run
        if ($emailCheckResult) {
            // if email matched
            if (mysqli_num_rows($emailCheckResult) > 0) {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE doctor SET code = $code WHERE email = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery);
                if ($updateResult) 
                {
        

                    $sender = 'nasiknsk38@gmail.com';
 
                    $fromName = 'Healthy clinic center'; 
                     
                    $subject = "Clinic Management System OTP Verification"; 
                     
                    $message = ' 
                        <html> 
                        
                        <body> 
                        Dear User,<br>
                        Please use the following verification code to Reset Your Password . 
                           <center> 
                                
                                <p> <h3><font size="4px" face="Arial">your verification code is :</font><br> <font color="Blue" size="5px" face="Arial"><b> ' .$code. ' </b></font> </h3></p>
                                 
                           </center>
                        </body> 
                        </html>'; 
                     
                    // Set content-type header for sending HTML email 
                    $headers = "MIME-Version: 1.0" . "\r\n"; 
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                     
                    // Additional headers 
                    $headers .= 'From: '.$fromName.'<'.$sender.'>' . "\r\n"; 

                     
                    if (mail($email, $subject, $message, $headers)) 
                    {
                      
                        echo "<script>alert('We've sent a verification code to your Email')</script>";

                       
                        header('location:otpdoc.html');
                    } 
                    else 
                    {
                        $errors['otp_errors'] = 'Failed while sending code!';
                    }
                } 
                else 
                {
                    $errors['db_errors'] = "Failed while inserting data into database!";
                }
            }
            else
            {
                $errors['invalidEmail'] = "Invalid Email Address";
            }
        }
        else 
        {
            $errors['db_error'] = "Failed while checking email from database!";
        }
    }

if(isset($_POST['verify']))
{
    $_SESSION['message'] = "";
    @$OTPverify = mysqli_real_escape_string($conn, $_POST['otp']);
    $verifyQuery = "SELECT * FROM doctor WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);
    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            $newQuery = "UPDATE doctor SET code = 0";
            $run = mysqli_query($conn,$newQuery);
            header("location:npassdoc.html");
        }else{
            $errors['verification_error'] = "Invalid Verification Code";
        }
    }else{
        $errors['db_error'] = "Failed while checking Verification Code from database!";
    }
}
if(isset($_POST['newpassword'])){
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];
    
    if (strlen($_POST['password']) < 8) {
        $errors['password_error'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['cpassword']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE doctor SET upassword = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            session_unset($email);
            session_destroy();
            header('location: login.html');
        }
    }
}
?>
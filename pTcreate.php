<?php
// Include config file
require_once "pTconfig.php";
$con = mysqli_connect('localhost', 'root', '','cli');
 
// Define variables and initialize with empty values
$name = $address = $mobail = $city = $password = $dob =  $email = "";
$name_err = $address_err = $mobail_err = $city_err = $dob_err = $password_err =  $email_err = "";

//$query=mysqli_query($con,"SELECT email FROM patient WHERE email='$Email'");
//$count = mysqli_num_rows($query);
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["fname"]);
    if(empty($input_name)){
        $name_err = "Please enter a Full Name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        @$address = $input_address;
    }

    //Email validation
    @$input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err  ="Please enter email"; 
      }
      
      else{
        $email = $input_email;
      }

      //mobail validation
       @$input_mobail = trim($_POST["mobail"]);
    if(empty($input_mobail)){
        $mobail_err ="Please enter email"; 

    }elseif(!ctype_digit($input_mobail)){
        $mobail_err = "Please enter valid mobail.";
      }
      else{
        @$mobail =$input_mobail;
      }

      // Validate city
    @$input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter the citys.";     
    } else{
        $city = $input_city;
    }

      // Validate dob
    @$input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter your date of birth.";     
    } else{
        $dob = $input_dob;
    }

    // Validate password
    @$input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter a password.";     
   
    } else{
        $password = $input_password;
    }
    

    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($dob_err) && empty($city_err) && empty($mobail_err) && empty($email_err) && empty($assword_err)) {
        // Prepare an insert statement
 
        $sql = "INSERT INTO patient (patientname ,dob ,address,city,phone,email,password) 
             VALUES ('$name','$dob' ,'$address', '$city', '$mobail ', '$email', '$password')";
  
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            /*mysqli_stmt_bind_param($stmt, "ssssiss", $param_name,$param_dob ,$param_address, $param_city,$param_mobail,$param_email,$param_password);
            
            // Set parameters
            $param_name = $name;
            $param_dob = $dob;
            $param_address = $address;
            $param_city = $city;
            $param_mobail = $mobail;
            $param_email = $email;
            $param_password = $password;*/

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: pTindex.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
 }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>criate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Patient Registration</h2>
                    <p>Please fill this form and submit to login.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
                        <div class="form-group">
                            <label> Full Name</label>
                            <input type="text" name="fname" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label> Adress</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="Date" name="dob" class="form-control <?php echo (!empty($bob_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dob; ?>">
                            <span class="invalid-feedback"><?php echo $dob_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                            <span class="invalid-feedback"><?php echo $city_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Mobail Number</label>
                            <input type="number" name="mobail" class="form-control <?php echo (!empty($mobail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobail; ?>">
                            <span class="invalid-feedback"><?php echo $mobail_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="Password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="pTindex.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form >
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
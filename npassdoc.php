<?php
    
?>
<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> New Password</title>
    <link rel="stylesheet" href="register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">New Password</div>
        <div class="content">

            <form action="#" method="post">
            <?php
            if (@$errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">New Password</span>
                        <input type="password" placeholder="Enter your new password" name="password" required><br>
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm your password" name="cpassword" required><br>
                    </div>
                </div>

                <div class="button">

                    <input type="submit" value="Reset" name="newpassword"><br><br>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
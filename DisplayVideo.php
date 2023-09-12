<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    </head>
<body>
        
        <hr style="border-top:3px solid #ccc;"/>
        <?php
            require 'conn.php';
 
            $query = mysqli_query($conn, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_error());
            while($fetch = mysqli_fetch_array($query)){
        ?>
       
            <div class="col-md-12" style="border: solid 1px;padding:8px;border-radius:5px">
            <div class="col-md-4" style="word-wrap:break-word;">
                <br />
                <h4>Video Name</h4>
                <h5 class="text-primary"><?php echo $fetch['video_name']?></h5>
            </div>
            
            
                <div class="col-md-8" style="margin-top:67px">
                <video width="50%" height="240" controls>
                    <source src="<?php echo $fetch['location']?>">
                </video>
            </div>
            
            <br style="clear:both;"/>
            <hr style="border-top:1px groovy #000;"/>
        </div>
        <?php
            }
        ?>
   
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
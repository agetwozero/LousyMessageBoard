<?php
session_start();
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
?>

<html>
    <head>
                    <meta http-equiv="refresh" content="0.1;URL=index.php" />

    </head>
    <body>

         <?php

            if($_POST){


                $date = date('Y-m-d H:i:s');

                $subName = strip_tags($_POST['subName']);

                $subName = preg_replace('/\s+/', '', $subName);

                $query = "INSERT INTO sub(subname, creationdate, slug)  VALUES('$subName','$date', '$subName')";
                $mysqli->query($query);
                echo "You created a sub";

            }
         ?>
    
    </body>
</html>
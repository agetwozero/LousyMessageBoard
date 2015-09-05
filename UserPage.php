<?php
session_start();
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$userName = $_GET['name'];
$getuserid = $mysqli->query("SELECT user_id FROM user WHERE username = '$userName'");
$userId = null;
while($row = mysqli_fetch_array($getuserid)){
    $userId = $row[0];
}
?>

<html>
<head>
  <base href="<?php echo $domain ?>>" />
    <?php if(!isset($userName)){
    echo"<meta http-equiv='refresh' content='0.1;URL=index.php' />";
}?>
    <title><?php echo $userName; ?></title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <?php include "bar.php";?>

    <div id="user_info">
        <?php echo $_SESSION['username'] ?>
        </div>

<div id="user_messages">
    messages posted:
    <?php

    $result = $mysqli->query("SELECT * FROM message WHERE user_id = '$userId' ORDER BY posttime DESC ");

    while ($row = mysqli_fetch_array($result)) {
            echo "<div class='message'>";
            echo "<a href='ThreadPage.php?id=$row[2]'>".$row[1]."<br>";
            echo $row[3];
            echo "</a>";
            echo "</div>";

    }

    ?>
</div>
<br>
</body>
</html>

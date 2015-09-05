<?php
session_start();
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$subName = $_GET['name'];
?>

<html>
<head>
    <?php if(!isset($subName)){
    echo"<meta http-equiv='refresh' content='0.1;URL=index.php' />";
}?>
    <title><?php echo $subName; ?></title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <?php include "bar.php";?>

<div id="threads">
    <?php

    $result = $mysqli->query("SELECT * FROM thread WHERE subname = '$subName' ORDER BY lastupdate DESC ");

    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='thread'>";
        echo "<div class='thread-head'><p>Thread:</p>" . " <a class='thread-link' href='ThreadPage.php?id=" . $row[0] . "'>" . $row[1] . "</a></div>";
        echo "<div class='thread-content'> Messages: ", $row[3] . "<br>";
        echo "<p class='last-message'>Last Message: " . $row[2] . "<br> </p></div>";
        echo "</div>";
    }

    ?>
</div>
<br>
<?php

if(isset($_SESSION['username'])&& isset($_SESSION['userid']) && isset($_SESSION['rights']) && $_SESSION['rights'] >= 2){
echo "<form class='new-thread-form' action='input.php' method='post' autocomplete='off'>
    Thread name: <input type='text' name='threadName'><br>
    <input type='hidden' name='subname' value=$subName><br>
    <input type='submit'  value='Create thread'>
</form>";
}
?>
</body>
</html>
<?php
session_start();
include_once"config.php";
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$threadId = $_GET['id'];
$userid = null;
$username = null;
$result = $mysqli->query("SELECT * FROM message WHERE thread_id = '$threadId' ORDER BY posttime DESC ");
$result2 = $mysqli->query("SELECT name FROM thread WHERE thread_id = '$threadId'");
while ($row = mysqli_fetch_array($result2)) {
    $threadTitle =  $row[0];
}

?>

<html>
<head>
      <?php if(!isset($threadId)){
    echo"<meta http-equiv='refresh' content='0.1;URL=index.php' />";
}?>
    <title><?php echo $threadTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <?php include "bar.php";?>
<?php

echo "<h3>" .$threadTitle . "</h3>". "<br>";



while ($row = mysqli_fetch_array($result)) {
    $userid = $row[4];
    $result3 = $mysqli->query("SELECT username FROM user WHERE user_id = '$userid'");
    while($row1 = mysqli_fetch_array($result3)){
        $username = $row1[0];
    }
    echo "<div class='message'>";
    echo "<div id='messagehead'>";
    echo    $username." "."id: ".$row[0]. " ".$row[3];
    echo "</div>";
    echo "<div id='messagecontent'>";
    echo  $row[1];
    echo "</div>";
    echo "</div>";
}

if (isset($_SESSION['username'])&& isset($_SESSION['userid']) && isset($_SESSION['rights']) && $_SESSION['rights'] >= 2){
     if(isset($error)){echo $error. "<br>";}
    echo "<form id='messageform' action='MessageAction.php' method='post' autocomplete='off'>
Enter your comment here: <br>
<textarea  name='message' cols='50' rows='5'  autofocus='true' ></textarea><br>
<input type='hidden' name='threadId' value='$threadId'><br>
    <input type='hidden' name='userid' value='{$_SESSION['userid']}'>
    <input type='submit' value='Submit'>
    </form>";
}
?>
<br>

</body>
</html>
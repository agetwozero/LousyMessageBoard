<?php
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);

$username = $_POST['username'];
$password = $_POST['password'];

$result = $mysqli->query("SELECT user_id ,password, rights FROM user WHERE username = '$username';");

$savedpassword = "";
$userId = null;
$rights = null;

while ($row = mysqli_fetch_array($result)) {
   $savedpassword = $row[1];
    $userId = $row[0];
    $rights = $row[2];
}
if(password_verify($password, $savedpassword)){
session_start();
$_SESSION['username'] = $username;
$_SESSION['userid'] = $userId;
$_SESSION['rights'] = $rights;

}else{
    header("location:LoginPage.php?error=".urlencode("Password Incorrect"));
}
?>
<html>
<head>
    <meta http-equiv="refresh" content="0.1;URL=LoginPage.php" />
</head>
</html>


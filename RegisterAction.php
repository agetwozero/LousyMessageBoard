<?php
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($mysqli,$username);
$password = mysqli_real_escape_string($mysqli,$password);

$resultcheck = $mysqli->query("SELECT username FROM user where username = '$username'");
$resultcheckresult = "";

while ($row = mysqli_fetch_array($resultcheck)) {
    $resultcheckresult = $row[0];
}

if($resultcheckresult == null || $resultcheckresult == "" || !$resultcheckresult) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = ("INSERT INTO user(username, password, rights) VALUES ('$username', '$password', 3)");
    $mysqli->query($query);
    $result = $mysqli->query("SELECT user_id FROM user WHERE username = '$username'");
    $userId = null;
    while ($row = mysqli_fetch_array($result)) {
        $userId = $row[0];
    }
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $userId;
    $_SESSION['rights'] = 2;
}else{
    header("location:LoginPage.php?error=".urlencode("Username Already Taken"));
}
?>
<html>
    <head>
        <meta http-equiv="refresh" content="0.1;URL=LoginPage.php" />
    </head>
</html>
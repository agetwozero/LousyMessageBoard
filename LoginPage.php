<?php
    session_start();
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
<body>

<br>
<?php if(isset($error)){
    echo "<div class='login-message'>" .$error. "<br></div>";
}
    ?>
<br>
<?php if(isset($_SESSION['username'])){
    echo "<div class='login-message'>Hello ".$_SESSION['username'];
}
?>

<?php if(isset($_SESSION['username'])){
echo "<a href='LogoutAction.php'>Logout</a></div>";
}?>
<div class='login-box'>
<h1>Login</h1>
<form class="login-form" action="LoginAction.php" method="post">
    <div class="note-holder">
    <div class="note">
    Username:<br>
    Password:<br>
    </div>
    <div class="note-input">
    &nbsp;<input type="text" name="username"><br>
    &nbsp;<input type="password" name="password"><br>
    </div> 
    </div>
    <div class="form-button">
        <input type="submit" value="Login">
    </div>
</form>
</div><div class='login-box'>
<h1>Register</h1>
<form class="login-form" action="RegisterAction.php" method="post">
    <div class="note-holder">
    <div class="note">
    Username:<br>
    Password:<br>
    </div>
    <div class="note-input">
    &nbsp;<input type="text" name="username"><br>
    &nbsp;<input type="password" name="password"><br>
    </div> 
    </div>
    <div class="form-button">
        <input type="submit" value="Register">
    </div>
</form>
</div>
</body>


</html>
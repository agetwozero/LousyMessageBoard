<?php
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$getsubnames = $mysqli->query("SELECT subname, slug FROM sub");
?>

<div class="bar">
    <div id="bar">
       <ul>
           <?php if(isset($_SESSION['username'])){echo "<a href='UserPage.php?name={$_SESSION['username']}'><li><h6> ".$_SESSION['username']."</h6></li></a>";}?>
           <a href="index.php"><li>Home</li></a>
           <?php
                while($row = mysqli_fetch_array($getsubnames)){
                    echo "<a href=$row[1]><li>$row[0]</li></a> ";
}
           ?>
           <?php if(isset($_SESSION['username'])){
echo "<a href='LogoutAction.php'><li>Logout</li></a>";
}else{
    echo "<a class='login' href='LoginPage.php'>Login/Register</a><br>";
}
?>
       </ul>
    </div>


</div>
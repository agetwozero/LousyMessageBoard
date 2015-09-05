<?php
session_start();
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
<?php include"bar.php" ?>

<div id="subs">
    <?php

        $subResult = $mysqli->query("SELECT * FROM sub ORDER BY creationdate");
    if(!$subResult){
        echo "No subs where found :o";
    }else{
        while ($row = mysqli_fetch_array($subResult)) {
            echo "<div class='subs'>";
            echo "Sub:" . " <a href='" . $row[1] . "'>" . $row[1] . "</a><br>";
            echo "</div>";
        }
    }


    ?>
</div>

<?php if(isset($_SESSION['rights']) && $_SESSION['rights'] == 10) {
    echo "<form class='sub-form' action = 'SubAction.php' method = 'post' autocomplete = 'off' >
        Sub Name: <input type = 'text' name = 'subName' ><br><br>
    <input type = 'submit' >
</form >";
}?>

</body>
</html>
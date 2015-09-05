<?php
session_start();
    include_once"config.php";
    require_once "MyThread.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$subName = $_POST['subname'];
$resultlastrow = $mysqli->query("SELECT thread_id FROM thread ORDER BY thread_id DESC LIMIT 1");
while($row = mysqli_fetch_array($resultlastrow)){
    $lastthreadid = $row[0];
}
$lastthreadid++;

            if($_POST){

                $thread1 = new MyThread(mysqli_real_escape_string($mysqli, $_POST['threadName']));


                $threadName = strip_tags($thread1->getName());

                $date = $date = date('Y-m-d H:i:s');

                $query = " INSERT INTO thread(name, subname, lastupdate) VALUES ('$threadName', '$subName', '$date');";

                $mysqli->query($query);
                echo "You created a thread";

            }
?>

<html>
    <head>

        <meta http-equiv="refresh" content="0.1;URL=ThreadPage.php?id=<?php echo $lastthreadid; ?>" />


    </head>
    <body>
    
    </body>
</html>
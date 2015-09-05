<?php
session_start();
    require_once "Message.php";
include_once"config.php";
$mysqli = new mysqli($dbhost, $dbusername, $dbpassword, $dbdatabase);
$messageThreadId = $_POST['threadId'];
?>

<html>
    <head>
        <meta http-equiv="refresh" content="0.1;URL=ThreadPage.php?id=<?php echo $_POST['threadId']?>" />

    </head>
    <body>

         <?php

            if($_POST){
                if($_POST['message'] != null) {


                    $message = new Message(mysqli_real_escape_string($mysqli, $_POST['message']), $_POST['threadId']);
                    $postedby = $_POST['userid'];
                    $date = date('Y-m-d H:i:s');

                    $messageContent = strip_tags($message->getContent());
                    $messageThreadId = $message->getThread();
                    if(!ctype_space($messageContent) || !strstr($messageContent, PHP_EOL)) {
                        $query = " INSERT INTO message(content, thread_id, posttime, user_id)  VALUES ('$messageContent', '$messageThreadId', '$date', '$postedby')";
                        $query2 = "UPDATE thread SET lastupdate = '$date' WHERE thread_id= '$messageThreadId'";
                        $query3 = "UPDATE thread SET messageamount = messageamount+1 WHERE thread_id= '$messageThreadId'";
                        $mysqli->query($query);
                        $mysqli->query($query2);
                        $mysqli->query($query3);
                        echo "You created a thread";
                    }else{
                        header("location:ThreadPage.php?id=".$messageThreadId."&error=".urlencode("Can't send a empty message you twat!"));
                    }
                }

                else{
                    header("location:ThreadPage.php?id=".$messageThreadId."&error=".urlencode("Can't send a empty message you twat!"));
                }
            }
         ?>
    
    </body>
</html>
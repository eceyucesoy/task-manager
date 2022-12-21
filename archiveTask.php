<?php

include "db.php";

if($_POST){
    $unique = $_POST["hidden2"];
    $sql = "UPDATE task SET status='Archived' WHERE task_id=$unique";
    $result= mysqli_query($db, $sql);

}
?>

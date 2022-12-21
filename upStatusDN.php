<?php

include "db.php";

if($_POST){
    $id2 = $_POST["task_id"];
    $sql = "UPDATE task SET status='Done' WHERE task_id=$id2";
    $result= mysqli_query($db, $sql);

}

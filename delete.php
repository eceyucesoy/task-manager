<?php

include "db.php";

if($_POST){
    $unique = $_POST["hidden3"];
    $sql = "DELETE FROM task WHERE task_id= $unique ";
    $result= mysqli_query($db, $sql);

}

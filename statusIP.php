<?php
include "db.php";

if($_POST){
    $id2= $_POST["draggableId"];

    $sql ="UPDATE task SET status='In Progress' WHERE task_id= '$id2'";
    $result = mysqli_query($db, $sql);
}
?>




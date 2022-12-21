<?php
include "db.php";

if($_POST){
    $id2= $_POST["hidden"];
    $updateStaff=$_POST["updateStaff"];
    $updateTask=$_POST["updateTask"];
    $updateStatus=$_POST["updateStatus"];
    $sql ="UPDATE task SET staff_id='$updateStaff', task_name='$updateTask', status='$updateStatus' WHERE task_id= '$id2'";
    $result = mysqli_query($db, $sql);

}

?>

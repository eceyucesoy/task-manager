<?php
include "db.php";

if($_POST){
    $id2= $_POST["hidden1"];
    $status=$_POST["changeStatus"];

    $sql ="UPDATE task SET status='$status' WHERE task_id= '$id2'";
    $result = mysqli_query($db, $sql);
}
?>

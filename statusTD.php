<?php
include "db.php";

if($_POST){
    $id2= $_POST["statusid"];
    $sql ="UPDATE task SET status='To Do' WHERE task_id= '$id2'";
    $result = mysqli_query($db, $sql);
}
?>



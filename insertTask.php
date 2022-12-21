<?php
include "db.php";

if($_POST) {
    $staff_id = $_POST["staff_id"];
    $task_name = $_POST["task_name"];
    $status = $_POST["status"];
    $result = $db->query("INSERT INTO task (staff_ID, task_name, status) VALUES ('$staff_id','$task_name', '$status')");
}
?>


<?php
include "db.php";

if($_POST){
    $id= $_POST["deleteid"];
    $sql = "SELECT * FROM task WHERE task_id=$id ";
    $result= mysqli_query($db, $sql);
    $response=array();
    while ($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}


?>

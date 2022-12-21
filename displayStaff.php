<?php
include "db.php";

if($_POST){
    $select = "SELECT * FROM staff ";
    $result = mysqli_query($db, $select);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $task_id= "SELECT task_id FROM task";
    echo '<option>Select Staff</option>';
 foreach ($data as $dt) {
 echo'<option name="staffName" id="'.$dt['staff_name'].'" value="'.$dt['staff_id'].'">'.$dt['staff_name'].'</option>';
 }
}

<?php
include "db.php";



if($_POST){
    $select = "SELECT staff_name, task_id, task_name, status, task_date FROM task INNER JOIN staff ON task.staff_ID=staff.staff_id WHERE status='Archived'";
    $result = mysqli_query($db, $select);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo '<table class="table" style="font-size: small">
  <thead>
    <tr>
      <th scope="col">Task ID</th>
      <th scope="col">Staff Name</th>
      <th scope="col">Task Name</th>
      <th scope="col">Date</th>
      <th scope="col"></th>
    </tr>
  </thead><tbody>';
    $i=0;
    foreach ($data as $dt) {
        $i++;
    }
    echo" <h2 style='color: green; text-align: center'>".$i." Archived Task"; if($i>1){echo "s";}
    echo"</h2>";
    echo"<hr>";
    foreach ($data as $dt) {
        echo '<tr>
      <th scope="row">'.$dt["task_id"].'</th>
      <td>'.$dt["staff_name"].'</td>
      <td>'.$dt["task_name"].'</td>
      <td>'.$dt["task_date"].'</td>
      <td><button class="btn btn-success btn-sm" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" onclick="editStatus('.$dt['task_id'].')">Change Status</button></td>
    </tr>';
    }
    echo '</tbody></table>';
    echo "<hr>";
    echo"<div style='text-align: center'>". $i. "</div>";
}
?>

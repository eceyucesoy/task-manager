<?php
include "db.php";

if($_POST) {
    $select = "SELECT staff.staff_id, staff_name, status, task_date FROM task INNER JOIN staff ON task.staff_ID=staff.staff_id WHERE status='Done' OR status='Archived' GROUP BY staff.staff_id HAVING COUNT(staff.staff_id) > 0 ORDER BY COUNT(staff.staff_id) DESC LIMIT 5";
    $result = mysqli_query($db, $select);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo '<br><br><table class="table" style="font-size: small" >';
    echo'<tr>
    <th style="font-size: medium; text-align: center; color: gold">TOP 5 ★<th>
    </tr>';
    foreach ($data as $dt) {
        echo '<tr>
      <td style="text-align: center">'.$dt["staff_name"].'</td>
      </tr>';}
    echo '</table>';
}

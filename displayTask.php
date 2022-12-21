<?php
include "db.php";
switch($_GET['mode']) {

    case 'displayTD':
        if($_POST){
            $select = "SELECT staff_name, task_id, task_name, status, task_date FROM task INNER JOIN staff ON task.staff_ID=staff.staff_id WHERE status='To Do' ORDER BY task_id DESC ";
            $result = mysqli_query($db, $select);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $i=0;
            foreach ($data as $dt) {
                $i++;
            }
            echo" <h2 style='text-align: center; margin-top: 15px'>To Do <small style='color: green'>".$i."</small></h2>";
            echo"<hr>";
            echo "<div class='droppableTD'>";
            foreach ($data as $dt) {
                echo"<div class='card shadow container draggable' id='" .$dt['task_id']."' style='width: 18rem;'>
<div class='card-body'>
<div class='btn-group' style='float: right'>
<button id='btn1' onclick='editTask( " .$dt['task_id']." )' style='color: green;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
  <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
</svg></button>
<button id='btn2' onclick='confirmDelete( " .$dt['task_id']." )' style='color: red;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
</svg></button>
<button id='btn3' title='cannot be archived' style='color: gray;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-archive-fill' viewBox='0 0 16 16'>
  <path d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'/>
</svg></button></div>

<h5 class='card-title'>".$dt['staff_name']."</h5>
<p class='card-text'>".$dt['task_name']."</p>
<h6 style='text-align: right'>".$dt['task_date']."</h6>
</div></div> <br>";
            }
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>";
        }
        break;

    case 'displayIP':
        if($_POST){
            $select = "SELECT staff_name, task_id, task_name, status, task_date FROM task INNER JOIN staff ON task.staff_ID=staff.staff_id WHERE status='In Progress' ORDER BY task_id DESC";
            $result = mysqli_query($db, $select);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $i=0;
            foreach ($data as $dt) {
                $i++;
            }
            echo" <h2 style='text-align: center; margin-top: 15px'>In Progress <small style='color: green'>".$i."</small></h2>";
            echo"<hr>";
            echo "<div class='droppableIP'>";
            foreach ($data as $dt) {
                echo"<div class='card shadow container draggable' id='" .$dt['task_id']."' style='width: 18rem;'>
<div class='card-body'>
<div class='btn-group' style='float: right'>
<button id='btn1' onclick='editTask( " .$dt['task_id']." )' style='color: green;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
  <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
</svg></button>
<button id='btn2' onclick='confirmDelete( " .$dt['task_id']." )' style='color: red;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
</svg></button>
<button id='btn3' title='cannot be archived' style='color: gray;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-archive-fill' viewBox='0 0 16 16'>
  <path d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'/>
</svg></button></div>
<h5 class='card-title'>".$dt['staff_name']."</h5>
<p class='card-text'>".$dt['task_name']."</p>
<h6 style='text-align: right'>".$dt['task_date']."</h6>
</div></div><br>";
            }
            echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>";
        }
        break;

    case 'displayDN':
        if($_POST){
            $select = "SELECT staff_name, task_id, task_name, status, task_date FROM task INNER JOIN staff ON task.staff_ID=staff.staff_id WHERE status='Done' ORDER BY task_id DESC";
            $result = mysqli_query($db, $select);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $i=0;
            foreach ($data as $dt) {
                $i++;
            }
            echo" <h2 style='text-align: center; margin-top: 15px'>Done <small style='color: green'>".$i."</small></h2>";
            echo"<hr>";
            echo "<div class='droppableDN'>";
            foreach ($data as $dt) {
                echo"<div class='card shadow container draggable' id='" .$dt['task_id']."' style='width: 18rem;'>
<div class='card-body'>
<div class='btn-group' style='float: right'>
<button id='btn1' onclick='editTask( " .$dt['task_id'].")' style='color: green;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
  <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
</svg></button>
<button id='btn2'  onclick='confirmDelete( " .$dt['task_id']." )' style='color: red;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
  <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
</svg></button>
<button id='btn3' title='archive' data-bs-target='#exampleModalToggle5' data-bs-toggle='modal' onclick='confirmArchive( " .$dt['task_id']." )' style='color: blue;' class='btn'><svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='currentColor' class='bi bi-archive-fill' viewBox='0 0 16 16'>
  <path d='M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z'/>
</svg></button></div> 
<h5 class='card-title'>".$dt['staff_name']."</h5>
<p class='card-text'>".$dt['task_name']."</p>
<h6 style='text-align: right'>".$dt['task_date']."</h6>
</div></div> <br>";
            }
            echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>";
        }
        break;
}
?>
<script>
    /* TO DO */
    $( function() {
        $( ".draggable" ).draggable();
        $( ".droppableTD" ).droppable({
            drop: function(event, ui) {
                var task_id = ui.draggable.attr("id");
                $.post("upStatusTD.php", { task_id: task_id}, function (data) {
                    displayStaff();
                    displayIP();
                    displayDN();
                    displayTD();
                    displayTop5();
                });
            }
        });
    } );

    /* IN PROGRESS */
    $( function() {
        $( ".draggable" ).draggable();
        $( ".droppableIP" ).droppable({
        drop: function(event, ui) {
            var task_id = ui.draggable.attr("id");
            $.post("upStatusIP.php", { task_id: task_id}, function (data) {
                displayStaff();
                displayIP();
                displayDN();
                displayTD();
                displayTop5();
            });
    }
    });
    } );

    /* DONE */
    $( function() {
        $( ".draggable" ).draggable();
        $( ".droppableDN" ).droppable({
        drop: function(event, ui) {
           var task_id = ui.draggable.attr("id");
            $.post("upStatusDN.php", { task_id: task_id}, function (data) {
                displayStaff();
                displayIP();
                displayDN();
                displayTD();
                displayTop5();
            });
    }
    });
    } );
</script>

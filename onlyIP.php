<?php
include "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Manager</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img alt="Task Manager" src="https://img.icons8.com/ios/50/000000/event-management.png"/></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" style="color:white;" aria-current="page" href="index.php">Task Manager</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: white" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tasks</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="onlyTD.php">To Do</a></li>
                        <li><a class="dropdown-item" href="onlyIP.php">In Progress</a></li>
                        <li><a class="dropdown-item" href="onlyDN.php">Done</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<?php

$select = "SELECT staff_name, task_id, task_name, status, task_date FROM task INNER JOIN staff ON task.staff_ID=staff.staff_id WHERE status='In Progress'";
$result = mysqli_query($db, $select);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$i=0;
foreach ($data as $dt) {
    $i++;
}
echo" <h2 style='text-align: center; margin-top: 15px'>In Progress <small style='color: green'>".$i."</small></h2>";
echo"<hr>";
foreach ($data as $dt) {
    echo"<div class='card shadow container draggable' id='" .$dt['task_id']."' style='width: 18rem;'>
<div class='card-body'>
<h5 class='card-title'>".$dt['staff_name']."</h5>
<p class='card-text'>".$dt['task_name']."</p>
<h6 style='text-align: right'>".$dt['task_date']."</h6>
</div></div> <br>";
}
?>
</body>
</html>


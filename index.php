<?php
include "displayStaff.php";
include "displayStaff4edit.php";
?>
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
<div class="row">
    <div class="col-lg-2" style="margin-left: 15px">
        <!-- Modal Update-->
        <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                    </div>
                    <div class="modal-body">

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="updateStaff" class="form-label">Staff Name:</label>
                                <select class="form-select form-select" id="updateStaff" name="updateStaff" aria-label=".form-select-sm example"></select>
                            </div>
                            <div class="mb-3">
                            <label for="updateTask" class="form-label">Task Name:</label>
                            <textarea class="form-control" name="updateTask" id="updateTask" rows="3" maxlength="100"></textarea>
                            </div><br>
                            <div class="mb-3">
                            <label for="updateStatus" class="form-label">Select Status:</label>
                            <select class="form-select" name="updateStatus" id="updateStatus" aria-label="Default select example">
                                <option name="updateStatus" id="ip" value="In Progress" selected>In Progress</option>
                                <option name="updateStatus" id="td" value="To Do">To Do</option>
                                <option name="updateStatus" id="dn" value="Done">Done</option>
                            </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="confirmEdit()" id="update" class="btn btn-success" name="update">Update</button>
                        <input type="hidden" id="hidden">

                    </div>
                </div>

            </div>
        </div>


        <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel4" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel4">Change Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="confirmEdit">
                        <div class="mb-3">
                            <h2>Do You Want To Edit?</h2>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="update()" name="updateStatus">Update</button>
                        <input type="hidden" id="hidden1">
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel5" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel5">Do You Want To Archive This Task?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="confirmEdit">
                        <div class="mb-3">
                                <label for="displayArchive" class="form-label">Task Name:</label>
                                <textarea disabled class="form-control" name="displayArchive" id="displayArchive" rows="3" maxlength="100"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="archiveTask()" name="updateStatus">Archive</button>
                        <input type="hidden" id="hidden2">
                    </div>
                </div>
            </div>
        </div>








        <form action="" method="post" style="margin-top: 55px">
            <label for="select" class="form-label">Select Staff:</label>
            <select class="form-select form-select" id="select" name="select" aria-label=".form-select-sm example"></select>
            <label for="taskName" class="form-label">Task Name:</label>
            <textarea class="form-control" name="taskName" id="taskName" rows="3" maxlength="100"></textarea>
            <label for="selectStatus" class="form-label">Select Status:</label>
            <select class="form-select" name="selectStatus" id="selectStatus" aria-label="Default select example">
                <option name="status" id="1" value="In Progress" selected>In Progress</option>
                <option name="status" id="2" value="To Do">To Do</option>
                <option name="status" id="3" value="Done">Done</option>
            </select>
            <button style="margin-top: 10px" type="button" class="btn btn-success" id="add" onclick="addTask()" name="add">Save</button>
        </form>
        <br><hr><br>
        <form action="" method="post" >
            <label for="name" class="form-label">Add New Staff:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Type name & surname..." required>
            <button style="margin-top: 10px" type="button" class="btn btn-success" id="add" onclick="addStaff()" name="add">Save</button>
        </form>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col">
                <div class="to_do"></div>
            </div>
            <div class="col">
                <div class="in_progress"></div>
            </div>
            <div class="col">
                <div class="done"></div>
            </div>
    </div>
    </div>
    <div class="col-lg-1" style="margin-top: 70px; margin-left: 65px ">
        <!-- Button trigger modal -->
        <button type="button" onclick="displayArchive()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#archiveModal">Show Archive</button>

        <!-- Modal -->
    <div class="modal fade" id="archiveModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Archived</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="archiveModal1">
                </div>
                <div class="modal-footer">
                     </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="statusChanger">
                    <div class="mb-3">
                        <label for="changeStatus" class="form-label">Select Status:</label>
                        <select class="form-select" name="changeStatus" id="changeStatus" aria-label="Default select example">
                            <option class="changeStatus" name="changeStatus" id="ip" value="In Progress" selected>In Progress</option>
                            <option class="changeStatus" name="changeStatus" id="td" value="To Do">To Do</option>
                            <option class="changeStatus" name="changeStatus" id="dn" value="Done">Done</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="confirmChange()" name="updateStatus">Update</button>
                    <input type="hidden" id="hidden1">
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel3">Change Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="confirmChange">
                        <div class="mb-3">
                            <h2>Do You Want To Change The Status?</h2>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="changeStatus()" name="updateStatus">Update</button>
                        <input type="hidden" id="hidden1">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalToggle6" aria-hidden="true" aria-labelledby="exampleModalToggleLabel6" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel3">Do You Want To Delete This Task?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="displayDelete" class="form-label">Task Name:</label>
                        <textarea disabled class="form-control" name="displayDelete" id="displayDelete" rows="3" maxlength="100"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="deleteTask()" name="updateStatus">Delete</button>
                        <input type=hidden id="hidden3">
                    </div>
                </div>
            </div>
        </div>

        <div id="top5"></div>
</div>
</div>
</body>
<script>

    $(document).ready(function(){
        displayStaff();
        displayIP();
        displayDN();
        displayTD();
        displayTop5();
    });

    function addStaff(){
        var name= $("input[name=name]").val();
        $.ajax({
            type: "POST",
            url: "insertStaff.php",
            data: { name: name
            },
            success: function (){
                $("input[name=name]").val("");
                displayStaff();
            },
            error: function (){
                alert("AJAX is not executed!");
            }
        });
    }

    function displayStaff(){
        var displayStaff='true';
        $.ajax({
            url: "displayStaff.php",
            type: "POST",
            data: {
                displayStaff: displayStaff
            },
            success: function (data){
                $('#select').html(data);

            }
        });
    }

    function displayStaff4edit(){
        var displayStaff4edit='true';
        $.ajax({
            url: "displayStaff4edit.php",
            type: "POST",
            data: {
                displayStaff4edit: displayStaff4edit
            },
            success: function (data){

                $('#updateStaff').html(data);

            }
        });
    }

    function addTask(){
        var staff_id = $("option[name=staffName]:selected").val();
        var task_name = $("textarea[name=taskName]").val();
        var status = $("option[name=status]:selected").val();
        $.ajax({
            type: "POST",
            url: "insertTask.php",
            data: {
                staff_id: staff_id,
                task_name: task_name,
                status: status
            },
            success: function (){
                $("option:selected").prop("selected", false); //solution 2
                $("textarea[name=taskName]").val("");

                displayIP();
                displayDN();
                displayTD();
                displayTop5();
            }
        });
    }

    function displayIP(){
        var displayStaff='true';
        $.ajax({
            url: "displayTask.php?mode=displayIP",
            type: "POST",
            data: {
                displayStaff: displayStaff
            },
            success: function (data){
                $('.in_progress').html(data);
                displayTop5();
            }
        });
    }

    function displayTD(){
        var displayStaff='true';
        $.ajax({
            url: "displayTask.php?mode=displayTD",
            type: "POST",
            data: {
                displayStaff: displayStaff
            },
            success: function (data){
                $('.to_do').html(data);
                displayTop5();
            }
        });
    }

    function displayDN(){
        var displayStaff='true';
        $.ajax({
            url: "displayTask.php?mode=displayDN",
            type: "POST",
            data: {
                displayStaff: displayStaff
            },
            success: function (data){
                $('.done').html(data);
                displayTop5();
            }
        });
    }

    function editTask(editid){
        $("#hidden").val(editid);
        $.post("edit.php", {editid:editid}, function (data){
            var aa= JSON.parse(data);
            $("#updateTask").val(aa.task_name);
            $("#updateStatus").val(aa.status);

        });
        displayStaff4edit();
        $("#updateModal").modal('show');
    }

    function confirmEdit(){
        $("#exampleModalToggle4").modal('show');
    }

    function update(){
        var updateStaff = $("option[name=updateName]:selected").val();
        var updateTask = $("textarea[name=updateTask]").val();
        var updateStatus = $("option[name=updateStatus]:selected").val();
        var hidden=$("#hidden").val();
        $.post("update.php",{
                updateStaff:updateStaff,
                updateTask:updateTask,
                updateStatus:updateStatus,
                hidden: hidden
            }, function (data,status){
                $("#updateModal").modal("hide");
            $("#exampleModalToggle4").modal('hide');
            displayIP();
            displayDN();
            displayTD();
            displayTop5();
        });
    }

    function confirmDelete(deleteid) {
        $("#hidden3").val(deleteid);
        $.post("displayDelete.php", {deleteid: deleteid}, function (data) {
            var aa = JSON.parse(data);
            $("#displayDelete").val(aa.task_name);
        });
        $("#exampleModalToggle6").modal('show');
    }

    function deleteTask(){
        var hidden3=$("#hidden3").val();
        $.post("delete.php",{
            hidden3: hidden3
        }, function (data,status){
            $("#exampleModalToggle6").modal('hide');
            displayIP();
            displayDN();
            displayTD();
            displayTop5();
        });
    }

    function confirmArchive(archiveid){
        $("#hidden2").val(archiveid);
        $.post("archive.php", {archiveid: archiveid}, function (data) {
            var aa = JSON.parse(data);
            $("#displayArchive").val(aa.task_name);
        });
        $("#exampleModalToggle5").modal('show');
    }

    function archiveTask(){
        var hidden2=$("#hidden2").val();
        $.post("archiveTask.php",{
            hidden2: hidden2
        }, function (data,status){
            $("#exampleModalToggle5").modal('hide');
            displayIP();
            displayDN();
            displayTD();
            displayTop5();
        });
    }

    function displayArchive(){
        var displayStaff='true';
        $.post({
            url: "displayArchive.php",
            type: "POST",
            data: {
                displayStaff: displayStaff
            },
            success: function (data){
                $('#archiveModal1').html(data);
            }
        });
    }

    function editStatus(editSt){
        $("#hidden1").val(editSt);
        $.post("editStatus.php", {editSt:editSt}, function (data){
        });
        $("#exampleModalToggle2").modal('show');
    }

    function confirmChange(){
        $("#exampleModalToggle3").modal('show');
    }

    function changeStatus(){
        var changeStatus = $("option[name=changeStatus]:selected").val();
        var hidden1=$("#hidden1").val();
        $.post("updateStatus.php", {
            changeStatus:changeStatus,
            hidden1:hidden1
        }, function (data){
            $("#exampleModalToggle2").modal('hide');
            $("#exampleModalToggle3").modal('hide');
            displayIP();
            displayDN();
            displayTD();
            displayTop5();
        });
    }

    function displayTop5(){
        var displayTop5='true';
        $.post({
            url: "displayTop5.php",
            type: "POST",
            data: {
                displayTop5: displayTop5
            },
            success: function (data){
                $('#top5').html(data);
            }
        });
    }

    </script>
</html>

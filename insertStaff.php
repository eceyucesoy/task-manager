<?php
include "db.php";

if($_POST) {
    $name = $_POST["name"];
    if($name!=""){
    $result = $db->query("INSERT INTO staff (staff_name) VALUES ('$name')");
}}
?>


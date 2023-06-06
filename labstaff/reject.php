<?php


$server = "localhost";
$user = "root";
$pass = "";
$database = "leave_management";

$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Failed to connect with MySQL.')</script>");
}

require('view.php');

$id = $_GET['id'];

$q = "UPDATE apply_leave SET lab_status ='Rejected', lab_remark ='Check Due' WHERE id = $id ";

mysqli_query($con, $q);
die("<script>alert('Rejected!!');window.location.href='view.php';</script>");


?>
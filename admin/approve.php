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

$q = "UPDATE apply_leave SET admin_status ='Approved', admin_remark ='None' WHERE id = $id ";

mysqli_query($con, $q);
die("<script>alert('Approved!!');window.location.href='view.php';</script>");



?>
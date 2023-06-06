<?php

 
    session_start();     
    $host = "127.0.0.1";  
    $user = "root";  
    $password = "";  
    $db_name = "leave_management";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    
    if(!$con) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
 include('lc.php');

$name=$_POST["name"];
$last_name=$_POST["lastname"];
$department=$_POST["department"];
$roll_no=$_POST["id"];


$sql="insert into leave(id,name,lastname,department) values ('$roll_no','$name','$last_name','$department')";

mysqli_query($con,$sql);

?>

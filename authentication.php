<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>login</title>
</head>
<body>
<?php 
    
    include('connection.php');  
    $ID = $_POST['id'];  
    $Password = $_POST['Pass']; 
    $name=$_POST['name'];
      
        $ID = mysqli_real_escape_string($con, $ID);  
        $Password = mysqli_real_escape_string($con, $Password);  
        
      
        $sql = "select *from students where id = '$ID' and password = '$Password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
             header("location:/admin/admin.php");
    }  
        else{  
            ?>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed!',
                text: 'Invalid Id or Password!'
              })
              </script>
              <?php
        }  
        ?>
        
    </html>
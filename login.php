<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>login</title>
</head>
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
  if(isset($_POST['id']) && isset($_POST['Pass']))
{
	$id=mysqli_real_escape_string($con,$_POST['id']);
	$password=mysqli_real_escape_string($con,$_POST['Pass']);
	$res=mysqli_query($con,"select * from students where id='$id' and password='$password'");
	$count=mysqli_num_rows($res);
	if($count>0)
    {
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
        $_SESSION['Class']=$row['Class'];
        $_SESSION['email']=$row['Email_Id'];
        $_SESSION['Phoneno']=$row['Phone_No'];
        $_SESSION['DOB']=$row['birthday'];
        $_SESSION['LN']=$row['lastname'];
        $_SESSION['dp']=$row['department'];
        
        
        if($row['role']=='admin')
        {
			header('/admin/admin.php');
			die();
		}
        elseif($row['role']=='student')
        { 
			header('location:student/index.php');
			die();
		}
	     else
         {
            die("<script>alert(' Login Failed!! Invalid Id or Passoword');</script>");
            header('login.php');
	    }
    }
}
?>

<body>
    

    <div class="container" id="container">
        <div class="form-container staff-container">
            <form method="POST" action="stafflogin.php">
                <h1>Staff </h1>
        
                <input type="email" name="email" placeholder="Enter your Email Id"  required />
                <input type="password" name="password" placeholder="Enter your Password" required  />
                <!-- <a href="#">Forgot your password?</a> -->
                <!-- <a href="register/register.html">Register</a> -->
                <button name="login">Login</button>
            </form>
      </div>

        <div class="form-container student-container">
            <form method="POST" >
                <h1>Student</h1>
                <input type="ID" name= "id" placeholder="Enter your Id" required />
                <input type="password" name= "Pass" placeholder="Enter your Password" required  />
                <!-- <a href="#">Forgot your password?</a> -->
                <!-- <a href="register/register.html">Register</a> -->
                <button type="submit">Login</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Go back to student login</p>
                    <button class="ghost" id="signIn">Student</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Welcome!</h1>
                    <p>Only staff can login from here</p>
                    <button class="ghost" id="signUp">Staff</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script  src="login.js"></script>
</html>
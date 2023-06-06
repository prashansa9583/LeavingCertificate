
<?php
require('connection.php');
if(isset($_POST['email']) && isset($_POST['password']))
{
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$res=mysqli_query($con,"select * from staff where email='$email' and password='$password'");
	$count=mysqli_num_rows($res);
	if($count>0)
    { 
		
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
        $_SESSION['DOB']=$row['birthday'];
        
        if($row['role']=='admin')
        {
			header('location:admin/admin.php');
			die();
		}
        elseif($row['role']=='hod')
        {
			header('location:hod/hod.php');
			die();
		}
        elseif($row['role']=='labstaff')
        {
			header('location:labstaff/labstaff.php');
			die();
		}
        elseif($row['role']=='scholarshipdepartment')
        {
			header('location:scholarshipdepartment/scholarshipdepartment.php');
			die();
		}
        elseif($row['role']=='librarian')
        {
			header('location:librarian/librarian.php');
			die();
		}
	     else
         {
        $msg="Please enter correct login details";
	    }
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
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
  


if(isset($_POST['submit'])){

$roll_no=mysqli_real_escape_string($con,$_POST['id']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$last_name=mysqli_real_escape_string($con,$_POST['lastname']);
$class=mysqli_real_escape_string($con,$_POST['Class']);
$department=mysqli_real_escape_string($con,$_POST['department']);

$sql="insert into apply_leave (id,name,lastname,Class,department,admin_status,admin_remark,hod_status,hod_remark,lib_status,lib_remark,lab_status,lab_remark,sch_status,sch_remark) values('$roll_no','$name','$last_name','$class','$department','Pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending')";


if(mysqli_query($con,$sql))
{
  // die("<script>alert('Applied!!');window.location.href='lc.php';</script>");
 ?>
 <script>
  Swal.fire({
    icon: 'success',
    title: 'Applied for the Leaving Certificate',
  })
  </script>
  <?php

}else
{
  // die("<script>alert('Failed to Apply!!');window.location.href='lc.php';</script>");
  ?>
 <script>
  Swal.fire({
    icon: 'error',
    title: 'Failed to Apply',
  })
  </script>
  <?php
}


}



?>

<div class="sidebar" >
    <div class="logo-details">
      <i class='bx bxs-user-circle icon'></i>
        <div class="logo_name">STUDENT</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      
    <li>
       <a href="profile.php">
         <i class='bx bxs-user-pin icon' ></i>
         <span class="links_name">Student Profile</span>
       </a> 
       <span class="tooltip">Student Profile</span> 
    </li>

    <li>
        <a href="lc.php">
          <i class='bx bxs-notepad icon icon' ></i>
          <span class="links_name">Apply for LC</span>
        </a> 
        <span class="tooltip">Apply for LC</span> 
    </li>
    <li>
        <a href="status.php">
          <i class='bx bxs-category icon' ></i>
          <span class="links_name">Status</span>
        </a> 
        <span class="tooltip">Status</span> 
       </li>
    <li>
     <a href="../login.php">
        <i class='bx bx-log-out' ></i>
        <span class="links_name">Logout</span>
      </a>
      <span class="tooltip">Logout</span>
  
     </li>
     <li class="profile">
         <i class='bx bxs-school' id="log_out" ></i>
     </li>
    </ul>
  </div>




<section class="home-section">
<div class="w3-main" style="margin-left:85px;">
    <header class="w3-container" style="padding-top:22px">
        <h5>
            <div style= "padding-left : 5px">
               <div style="color: #0a1449f1; font-size: 30px">
            <b> LC  Application</b>
        </h5>
    </header>

    <div class="w3-container">
      
        <div class="w3-row" style="background-color: white; width: 600px; float:left">
        
            <div class="w3-col m2 text-center" style="margin: 10px 10px;">
                <img class="w3-circle" src="avatar3.png" style="width:96px;height:96px">
            </div>
            <div class="w3-col m8 w3-container">
                <h4><?php echo $_SESSION['USER_NAME'] ?> <span class="w3-opacity w3-medium"><?php echo $_SESSION['DOB'] ?></span></h4>
                <p>Welcome to Leaving Certificate Application.</p>
            </div>
        </div>
    </div>

    <div class="w3-container">
        <div class="w3-row" style="background-color: white; display: table-cell; width: 600px" >
            <div style= "padding-left : 15px;">
             
          
            <form  method="POST">
                <br><label for="name">First Name:</label><br>
                <input type="text" id="name"  value ="<?php echo $_SESSION['USER_NAME'] ?>" name="name" style="width:200px"><br><br>
                <label for="lastname">Last Name:</label><br>
                <input type="text" id="lastname" value="<?php echo$_SESSION['LN'] ?>" name="lastname" style="width:200px"><br><br>
                <label for="Class">Class:</label><br>
                <input type="text" id="Class" value="<?php echo$_SESSION['Class'] ?>" name="Class" style="width:200px"><br><br>
                <label for="id">Roll No:</label><br>
                <input type="text" id="id" value="<?php echo$_SESSION['USER_ID'] ?>" name="id" style="width:200px"><br><br>
                <label for="department">Department:</label><br>
                <input type="text" id="department" value= "<?php echo $_SESSION['dp'] ?>"name="department" style="width:200px" ><br><br>
                
               
                <button type="submit" class="button" id="submit" name="submit"style="vertical-align:middle">Apply</button>
              
              </form>  
              <br>
        </div>
    </div>
    </div>

  </section>
 

  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>

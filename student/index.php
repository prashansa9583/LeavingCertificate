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

if(!isset($_SESSION['ROLE'])){
	header('location:login.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<section class="home-section" style="background-image: url('student.jpeg'); background-size:1270px 730px; 
  ">
  </section>
  
 
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


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
          <span class="links_name">Status </span>
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
  <section class="home-section" >
  <div class="w3-main" style="margin-left:85px;">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5>
          <div style= "padding-left : 5px">
             <div style="color: #0a1449f1;font-size: 30px;">
            <b>My  Profile</b>
        </h5>
    </header>

    <div class="w3-container">
        <div class="w3-row" style="background-color: white; width: 1000px">
            <div class="w3-col m2 text-center" style="margin: 10px 10px;">
                <img class="w3-circle" src="avatar3.png" style="width:96px;height:99px">
            </div>
            <div class="w3-col m8 w3-container">
                <h4><?php echo $_SESSION['USER_NAME'] ?> <span class="w3-opacity w3-medium"><?php echo $_SESSION['DOB'] ?></span></h4>
                <p>Welcome to your profile.</p>
            </div>
        </div>
    </div>
    <div class="w3-container">
        <div class="w3-row" style="background-color: white;width: 1000px" >
            <div style= "padding-left : 15px; color: rgb(5, 5, 58);">
            <h2>Information</h2>
            <hr>
            <h5><b>First Name :</b> <?php echo $_SESSION['USER_NAME'] ?></h5>
            <h5><b>Last Name :</b> <?php echo$_SESSION['LN'] ?></h5>
            <h5><b>Class :</b> <?php echo$_SESSION['Class'] ?></h5>
            <h5><b>Roll No :</b> <?php echo $_SESSION['USER_ID'] ?></h5>
            <h5><b>Institute :</b> Fr. Conceicao Rodrigues Institute of Technology</h5>
            <h5><b>Course :</b> <?php echo$_SESSION['dp'] ?> </h5>
            <h5><b>DOB :</b> <?php echo $_SESSION['DOB'] ?></h5>
            <br>
            <h2>Contact Information</h2>
            <hr>
            <h5><b>Email-id :</b> <?php echo $_SESSION['email'] ?> </h5>
            <h5><b>Phone No :</b> <?php echo $_SESSION['Phoneno'] ?></h5>
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


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
 
<section class="home-section" style="background-image: url('lab_staff.jpeg'); background-size:1270px 730px; 
  ">
  </section>
      <div class="sidebar" >
    <div class="logo-details">
      <i class='bx bxs-user-circle icon'></i>
        <div class="logo_name">LAB STAFF</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
    <li>
       <a href="labstaff.php">
         <i class='bx bxs-home icon' ></i>
         <span class="links_name">Home</span>
       </a> 
       <span class="tooltip">Home</span> 
      </li>

     <li>
       <a href="view.php">
         <i class='bx bxs-message-rounded-dots icon' ></i>
         <span class="links_name">View Request</span>
       </a>
       <span class="tooltip">View Request</span>
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


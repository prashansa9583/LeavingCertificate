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
$q = "select * from apply_leave ";

$query = mysqli_query($con,$q);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
   
   </head>
<body>
<div class="sidebar" >
    <div class="logo-details">
      <i class='bx bxs-user-circle icon'></i>
        <div class="logo_name">ADMIN</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
    <li>
       <a href="admin.php">
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

  <section class="home-section">

 
  
  <div class="w3-main" style="margin-left:50px;margin-right:50px;">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5>
            <div style= "padding-left : 5px">
               <div style="color: #0a1449f1; font-size: 30px;">
            <b> LC  Applications</b><br><br>
        </h5>
    </header>
    <form method="POST" >
    <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center" > 
 
 <th> Roll Id</th>
 <th> First Name </th>
 <th> Last Name </th>
 <th> Class </th>
 <th> Department </th>
 <th> Approval </th>
 <th> Delete </th>  
 <th> Status </th>
</tr>
    

    
    <?php

    while($res = mysqli_fetch_array($query))
    {
       
      echo  "<tr class='text-center' style='background-color:white' >";
      echo  "<td > ".$res['id']." </td>";
      echo  "<td > ".$res['name']."</td>";
      echo  "<td > ".$res['lastname']."</td>";
      echo  "<td > ".$res['Class']." </td>";
      echo  "<td > ".$res['department']."  </td>";
      echo  "<td > <button type = 'submit' name='approved' method = 'POST' class='btn btn-success'> <a href='approve.php?id=$res[id]'class='text-white'> Approve  </a></button>&emsp;<button type = 'submit' name='rejected' method = 'POST' class='btn-danger btn'> <a href='reject.php?id=$res[id]'class='text-white'> Reject  </a></button></td>";
      echo  "<td > <button  class='btn btn-warning'>  <a href='delete.php?id=$res[id]'class='text-white'>Delete  </a></button></td>";
            
      $rid = $res['id'];
                  
      $res=mysqli_query($con,"select admin_status from apply_leave where id= $rid;");
      $row=mysqli_fetch_row($res);
      echo "<td > ".$row[0]."</td>";

    }

 ?>
 </table>
</form>
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
  <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>
</body>
</html>

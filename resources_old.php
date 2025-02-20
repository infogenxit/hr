<?php
require('dbconnection.php');
session_start();
//fetching data for both user and recruiter by applicant session

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sessionid = $_SESSION["recruiter"];

$fetch_query = "SELECT * FROM `resources`";

$result = mysqli_query($con,$fetch_query);

if(isset($_REQUEST["visit"]))
{
    $_SESSION["resource"] = $_REQUEST["resource_id"];
    header('location:resource-profile.php');  
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@400;700&family=Teko:wght@500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management</title>
    <style>
        body{
            background-color: #EEEDF1;
            font-family: 'Poppins', sans-serif;
        }
        .herotabs
{
   margin-left:290px;
   height:100vh;
   display:flex;
   flex-direction:column;
  background-color:#eeedf1ce
}
    </style>
    

</head>
<body>
   
<aside class="sidenav-left">
    
        <div class="navbar-wrapper">
            <h2 class="logo">
                IGX-HRM<br>
                <span style="font-size: 13px;">Human Resource Management</span><br>
                <span style="font-size: 13px;">
                    <a href="./logout.php"><u>Log out</u></a>
                </span>
            </h2>
            <nav class="navlink-wrapper">
                <div class="nav-sec">
                <h3>Menu</h3>
                <navlink class="navlinks "  onclick="location.href = 'dashboard.php';">
                    <i class="fa-solid fa-border-all"></i><span>DashBoard</span>
                </navlink>
                <!-- <navlink class="navlinks"  >
                    <i class="fa-solid fa-calendar-day"></i> <span>Events</span>
                </navlink> -->
                </div>
                <div class="nav-sec">
                <h3>Recruitment</h3> 
                <navlink class="navlinks active-nav"   onclick="location.href = 'resources.php';">
                    <i class="fa-solid fa-suitcase"></i><span>Resources</span>
                </navlink>
                <navlink class="navlinks" onclick="location.href = 'shortlisted-resources.php';">
                    <i class="fa-solid fa-user-group"></i><span>Shortlisted Resources</span> 
                </navlink>
                <navlink class="navlinks" onclick="location.href = 'filter.php';">
                    <i class="fa-solid fa-code-fork"></i><span>filter</span>  
                </navlink>
            </div>
            
            </nav>
        </div>
    </aside>
    <aside class="sidenav-left mobile">
        <div class="navbar-wrapper">
            <div class="close-btn">
                <button><i class="fa-solid fa-xmark"></i></button>
            </div>
            <nav class="navlink-wrapper">
                <div class="nav-sec">
                <h3>Menu</h3>
                <navlink class="navlinks active-nav">
                    <i class="fa-solid fa-border-all"></i><span>DashBoard</span>
                </navlink>
                <!-- <navlink class="navlinks">
                    <i class="fa-solid fa-calendar-day"></i> <span>Events</span>
                </navlink> -->
                </div>
                <div class="nav-sec">
                <h3>Recruitment</h3>
                <navlink class="navlinks">
                    <i class="fa-solid fa-suitcase"></i><span>Resources</span>
                </navlink>
                <navlink class="navlinks">
                    <i class="fa-solid fa-user-group"></i><span>Shortlisted Resources</span> 
                </navlink>
                <navlink class="navlinks">
                    <i class="fa-solid fa-code-fork"></i><span>Projects</span>  
                </navlink>
            </div>
            
            </nav>
        </div>
    </aside>
    <main class="herotabs">
    <div class="fff-top-bar">
       <div class="search-wrapper">

       <form method="POST" action="">
                <input type="text" name="search" />
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
        </div>
            <div class="top-bar">
                <i class="fa-solid fa-bell"></i>
                <div class="user-profile"></div>
            </div>
        
       </div>
       <?php

        $search = $_POST['search'] ?? '';

        $query = "SELECT * FROM `resources` WHERE `name` LIKE '%$search%' OR `skills` LIKE '%$search%' OR `current company` LIKE '%$search%'
        OR `current ctc` LIKE '%$search%' OR  `rate per-hour` LIKE '%$search%'
        ORDER BY `rate per-hour` ASC, `work experience` ASC
        ";

        $result = mysqli_query($con,$query);
        if($result->num_rows>0){
            
        }else{
            echo"No Record Found";
        }
        ?>

       <div class="user-table">
            <div class="buttons-wrapper">
                <span>Resources</span>
                <button onclick="location.href = 'resource-register.php';" >Add New Resource</button>
            </div>
            <br>
            <div class="table-wrapper">
                <table class="content-table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Rate P/h</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>            
                    <?php
                    while($data = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $data["name"]; ?>
                            <input type="hidden" value="<?php echo $data["id"]; ?>" name="id"></td>
                            <td class="skill-tab"><?php echo $data["skills"]; ?></td>
                            <td><?php echo $data["rate per-hour"]; ?></td>
                            <td>
                                <a href="<?php echo 'resource-profile.php?id='.$data['id']; ?>" class="visit_button" name="visit">
                                    Visit&nbsp;Profile
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                  </table>
            </div>
       </div>
    </main>
</body>
</html>
<?php
require('dbconnection.php');
session_start();
//fetching data for both user and recruiter by applicant session

$sessionid = $_SESSION["recruiter"];

$fetch_query="SELECT * FROM `resources` WHERE shortlist_status = 'yes' and resource_type = 'it'";
$result = mysqli_query($con,$fetch_query);

$nfetch_query="SELECT * FROM `resources` WHERE shortlist_status = 'yes' and resource_type = 'non-it'";
$nresult = mysqli_query($con,$nfetch_query);




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
.buttons-wrapper{
    justify-content: space-between;
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
                <navlink class="navlinks"   onclick="location.href = 'resources.php';">
                    <i class="fa-solid fa-suitcase"></i><span>Resources</span>
                </navlink>
                <navlink class="navlinks active-nav" onclick="location.href = 'shortlisted-resources.php';">
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
                <i class="fa-solid fa-filter"></i><span>FFilter</span>  
                </navlink>
            </div>
            
            </nav>
        </div>
    </aside>

    <main class="herotabs">
       <div class="fff-top-bar">
        <div class="search-wrapper">
            <form>
                <input type="text" />
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
            <div class="top-bar">
                <i class="fa-solid fa-bell"></i>
                <div class="user-profile"></div>
            </div>
        
       </div>
       <div class="user-table">
            <div class="buttons-wrapper">
                <span>Shortlisted Resources</span>
                <div class="table_toggle"><button class="it" id="it">I.T</button>
                    <button class="non-it" onclick="toggle(btn)" id="non-it">Non I.T</button></div>
            </div>
            <br>
            <div class="table-wrapper">
                <table class="content-table" id="table-it">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Recruiter</th>
                        <th>Rate P/h</th>
                        <th>Project Assigned</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                     while($data= mysqli_fetch_assoc($result))
                                    {
                                    ?>
                      <tr >
                        <td><?php echo $data["name"]; ?></td>
                        <td class="skill-tab"><?php echo $data["skills"]; ?>
                            </td>
                        <td><?php echo $data["recruiter"]; ?></td>
                        <td>Rs <?php echo $data["rate per-hour"]; ?></td>
                        <td><?php echo $data["project_assigned"]; ?></td>
                      </tr>
                      <?php
                       }
                      ?>
                    </tbody>
                  </table>

                  <table class="content-table" id="table-non">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Recruiter</th>
                        <th>Rate P/h</th>
                        <th>Project Assigned</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                   
                    <?php
                     while($nonit= mysqli_fetch_assoc($nresult))
                                    {
                                    ?>
                      <tr >
                        <td><?php echo $nonit["name"]; ?></td>
                        <td class="skill-tab"><?php echo $nonit["skills"]; ?>
                            </td>
                        <td><?php echo $nonit["recruiter"]; ?></td>
                        <td>Rs <?php echo $nonit["rate per-hour"]; ?></td>
                        <td><?php echo $nonit["project assigned"]; ?></td>
                      </tr>
                      <?php
                       }
                      ?>
                      
                     
                    </tbody>
                  </table>
                  
            </div>
            
       </div>
       
    </main>

    <script>
        
document.getElementById("it").onclick = function() {
    document.getElementById("table-it").style.display = "table";
    document.getElementById("table-non").style.display = "none";
    document.getElementById("non-it").style.backgroundColor = "#fff";
    document.getElementById("it").style.backgroundColor = "#c5c5c5";
}
 
document.getElementById("non-it").onclick = function() {
    document.getElementById("table-it").style.display = "none";
    document.getElementById("table-non").style.display = "table";
    document.getElementById("it").style.backgroundColor = "#fff";
    document.getElementById("non-it").style.backgroundColor = "#c5c5c5";


}
        
        </script>

</body>
</html>


<?php
require('dbconnection.php');
session_start();
//fetching data for both user and recruiter by applicant session

$sessionid = $_SESSION["recruiter"];

if(!$_SESSION["IS_LOGIN"]) {
    header("location: ./login.php");
}

$fetch_query="SELECT * FROM `log-cred` WHERE employee_id = '$sessionid' ";

$result = mysqli_query($con,$fetch_query);
$data= mysqli_fetch_assoc($result) ;
if($result)
{
    
}

$testsql = "SELECT * FROM `resources`";
$shortlist_resource="SELECT * FROM `resources` WHERE shortlist_status = 'yes' ";
$idle_resource="SELECT * FROM `resources` WHERE shortlist_status = 'no' ";


if ($sresult=mysqli_query($con,$shortlist_resource)) {
    $shorted=mysqli_num_rows($sresult);
}
if ($idle_result=mysqli_query($con,$idle_resource)) {
    $idle_resources=mysqli_num_rows($idle_result);
}
if ($resulttest=mysqli_query($con,$testsql)) {
    $rowcount=mysqli_num_rows($resulttest);
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
                <navlink class="navlinks active-nav"  onclick="location.href = 'dashboard.php';">
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
                <navlink class="navlinks">
                    <!-- <i class="fa-solid fa-calendar-day"></i> <span>Events</span> -->
                </navlink>
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
                    <i class="fa-solid fa-code-fork"></i><span>Filter</span>  
                </navlink>
            </div>
            
            </nav>
        </div>
    </aside>

    <main class="herotabs">
       <div class="data-wrapper">
        <div class="mobile-menu-btn">
            <i class="fa-solid fa-bars"></i>
            <div class="user-profile"></div>
        </div>
            <div class="section1-wrapper">
              

                <div class="text-wrapper">
                    <h3 style="margin-bottom:5px;">Dashboard</h3>
                    <span style="font-weight:bold;">Hello <?php echo $data['name'];?>,Welcome to IGX-HRM </span>
                </div>
                <div class="search-wrapper">
                    <form>
                        <input type="text" />
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="user-profile"></div>
            </div>
            <div class="insights-wrapper">
                <div class="insights 1st" >
                    <div class="textwrapper">
                        <span class="s1">Total Resources</span>
                        <span class="s2"><?php     echo $rowcount; ?></span>
                    </div>
                    <div class="progress-circle">
                          <!-- <div class="back-circle">
                            <div class="mask-circle">
                                    <span>85%</span>
                            </div>
                          </div> -->
                    </div>
                </div>
                <div class="insights 2nd">
                    <div class="textwrapper">
                        <span class="s1">Shorlisted  Resource</span>
                        <span class="s2"><?php     echo $shorted; 
?></span>
                    </div>
                    <div class="progress-circle">
                          <!-- <div class="back-circle">
                            <div class="mask-circle">
                                    <span>85%</span>
                            </div>
                          </div> -->
                    </div>
                </div>
                <div class="insights 3rd">
                    <div class="textwrapper">
                        <span class="s1">Idle Resources</span>
                        <span class="s2"><?php     echo $idle_resources; 
?></span>
                    </div>
                    <div class="progress-circle">
                          <!-- <div class="back-circle">
                            <div class="mask-circle">
                                    <span>85%</span>
                            </div>
                          </div> -->
                    </div>
                </div>
            </div>
            <div class="chart">
                <div class="chart-buttons-wrapper">
                    
                    <div class="graph-wrapper">
                        <div class="slider blue"></div>
                        <h4>Total Applicants</h4>
                        <div class="slider red"></div>
                        <h4>Shortlisted Applicants</h4>
                        <div class="slider yellow"></div>
                        <h4>Idle Applicants</h4>
                    </div>
                    <div class="graph-sort">
                            <select>
                            <option>Week</option>
                            <option>Month</option>
                            <option>year</option>
                            </select>
                        
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="myChart" class="canvas-chart"></canvas>
                </div>
            </div>
            <div class="search-filter">
                    
                <button  onclick="location.href = 'filter.php';"><i class="fa-solid fa-magnifying-glass"></i>  Search Resources</button>          
            </div>
            <div class="quick-search-1200">
            <form action="filter-results.php" method="post">
                <h3>Quick Search</h3>
                
                <div class="button-grid">
                    <button name="developer_type" value="mern"> Mern Developer</button>
                    <button name="developer_type" value="lamp"> Lamp Developer</button>
                    <button name="developer_type" value="mean"> Mean Developer</button>
                    <button name="developer_type" value="java"> Java Developer</button>
                </div>   
                <div class="button-grid">
                    <button name="developer_type" value="asp"> Asp Developer</button>
                    <button name="developer_type" value="php"> Php Developer</button>
                    <button name="developer_type" value="flutter"> Flutter Developer</button>
                    <button name="developer_type" value="hybrid_app"> Android Developer</button>
                </div> 
                <div class="button-grid">
                    <button name="developer_type" value="ui_dev"> Ui Developer</button>
                    <button name="developer_type" value="python"> Python Developer</button>
                    
                </div>   
                 
         </form>    
            </div>
       </div>
       <div class="right-nav">
        <div class="sidepanel-right">
            <div class="top-bar">
                <i class="fa-solid fa-bell"></i>
                <div class="user-profile"></div>
        </div>
        <div class="user-data">
            <div class="user-image"></div>
            <h2><?php echo $data['name'];?> </h2>
            <span>Ux Designer</span>
            </div>
            <div class="quick-search">
                <h3>Quick Search</h3>
                <form action="filter-results.php" method="post">
                <div class="button-grid">
                <button name="developer_type" value="mern"> Mern Developer</button>
                    <button name="developer_type" value="lamp"> Lamp Developer</button>

                </div>
                <div class="button-grid">
                <button name="developer_type" value="mean"> Mean Developer</button>
                    <button name="developer_type" value="java"> Java Developer</button>

                </div>
                <div class="button-grid">
                <button name="developer_type" value="asp"> Asp Developer</button>
                    <button name="developer_type" value="php"> Php Developer</button>

                </div>
                <div class="button-grid">
                    
                <button name="developer_type" value="flutter"> Flutter Developer</button>
                    <button name="developer_type" value="hybrid_app"> Android Developer</button>

                </div>
                <div class="button-grid">
                    <button name="developer_type" value="ui_dev"> Ui Developer</button>
                    <button name="developer_type" value="python"> Python Developer</button>

                </div>
    </form>
            </div>
            
        </div>
       </div>
    </main>

    <script>
        const xValues = ["","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec",""];
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{ 
          data: [,<?php echo $rowcount; ?>,900,],
          borderColor: "#FF5630",
          fill: false
        }, { 
          data: [,<?php     echo $shorted; ?>,700,],
          borderColor: "#ECB22E",
          fill: false
        },
        { 
          data: [,<?php     echo $idle_resources; ?>,1060,],
          borderColor: "#56CCF2",
          fill: false
        },]
      },
      options: {
        legend: {display: false}
      }
    });
        
        </script>

</body>
</html>
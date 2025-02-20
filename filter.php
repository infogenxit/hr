<?php
require('dbconnection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@400;700&family=Teko:wght@500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="script.js"></script>
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
                <navlink class="navlinks "   onclick="location.href = 'resources.php';">
                    <i class="fa-solid fa-suitcase"></i><span>Resources</span>
                </navlink>
                <navlink class="navlinks" onclick="location.href = 'shortlisted-resources.php';">
                    <i class="fa-solid fa-user-group"></i><span>Shortlisted Resources</span> 
                </navlink>
                <navlink class="navlinks active-nav" onclick="location.href = 'filter.php';">
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
       <div class="back-buttonwrapper">
                <button onclick="location.href= 'dashboard.php'"><i class="fa-solid fa-arrow-left"></i>Back</button>
            </div>
    <div class="resource-container">

<form action="filter-results.php" id="resource-filter-form" method="post">
    <!-- dropdown -->
    <div class="resource-element">
        <label class="resource-label" for="type" >Type of Resource
        </label>
        <select id="resource_type" name="resource_type" class="resource-select" required >
            <option value="">select</option>
            <option value="IT">IT</option>
            <option value="Non-IT">Non I.T</option>
        </select>
    </div>

    <!-- dropdown -->
    <div class="resource-element">
        <label class="resource-label" for="type">Type of Employment
        </label>
        <select name="employment_type" class="resource-select" id="employment_type" >
            <option value="">select</option>
            <option value="Freelancer(Full Time)">Freelancer(Full Time)</option>
            <option value="Freelancer(Part Time)">Freelancer(Part Time)</option>
            <option value="Permanant Employee(Full Time)">Permanant Employee(Full Time)</option>
            <option value="Permanant Employee(Part Time)">Permanant Employee(Part Time)</option>
            <option value="Intern">Intern</option>
        </select>
    </div>

    <!-- dropdown -->
    <div class="resource-element" style="display:none;" id="it_process">
        <label class="resource-label" for="type">Type of Developer
        </label>
        <select class="resource-select" name="developer_type"  id="filter_developer_type">
            <?php
        $fetch_query="SELECT * FROM `developer_type`";
        $result = mysqli_query($con,$fetch_query); ?>
            <option value=''>Select</option>
            <?php 
                while($data = mysqli_fetch_assoc($result)){
            ?>
            <option value="<?php echo $data['developer_type']; ?>"><?php echo ucfirst($data['developer_type']); ?> Developer</option>
            >
            <?php } ?>
            
            
    </select>
    <!-- <select class="resource-select" name="skillset"  id="filter_skillset">
            <option value=''>Select</option>
            
            
            
            </select> -->
    </div>

    <div class="resource-element" style="display:none;" id="nonit_process">
        <label class="resource-label" for="type">Type of Process
        </label>
        <select class="resource-select" name="process_type"  id="process_type">
        <option value=''>Select</option>
        <option value="Payroll">Payroll</option>  
        <option value="BPO-voice">BPO-voice</option>
        <option value="BPO-nonvoice">BPO-nonvoice</option>
            
    </select>
    <!-- <select class="resource-select" name="skillset"  id="filter_skillset">
            <option value=''>Select</option>
            
            
            
            </select> -->
    </div>

    <div class="resource-element">
        <label class="resource-label" for="type">Experience
        </label>
        <select name="experience" class="resource-select" >
       <option value="">Select Years</option>
               <option value="0-2">0-2 Yrs.</option>
               <option value="2-6">2-6 Yrs.</option>
               <option value="6-10">6-10 Yrs.</option>
               <option value="10-14">10-14 Yrs.</option>
               <option value="14-18">14-18 Yrs.</option>
               <option value="18-21">18-21 Yrs.</option>
               <option value="21-24">21-24 Yrs.</option>
               <option value="24-27">24-27 Yrs.</option>
               <option value="27-30">27-30 Yrs.</option>
        </select>
    </div>
    <!-- dropdown -->
    <div class="resource-element" id="hourlyrate" style="display:none;">
        <label class="resource-label" for="type">Rate Per Hour(In Rupees)
        </label>
        <select name="rateph" class="resource-select" >
            <option value="">select</option>
            <option value="Less than 100">Less than 100</option>
            <option value="100-150">100-150</option>
            <option value="150-200">150-200</option>
            <option value="200-250">200-250</option>
            <option value="250-300">250-300</option>
            <option value="300-350">300-350</option>
            <option value="350-400">350-400</option>
            <option value="More than 400">More than 400</option>




            
        </select>
    </div>

   <div class="filter-btn-wraper">
        <button type="submit">Search</button>
</div>
</form>

</div>
            
       </div>
       
    </main>

    <script>
        $(document).ready(function () {
    $("#employment_type").change(function () {
        var val1 = $(this).val();
        if (val1 == "Freelancer(Full Time)" || val1 == "Freelancer(Part Time)" ) {;
           document.getElementById('hourlyrate').style.display='block';
        }  else  {
            document.getElementById('hourlyrate').style.display='none';
        } 
    });

    $("#resource_type").change(function () {
        var val1 = $(this).val();
        if (val1 == "IT" ) {;
           document.getElementById('it_process').style.display='block';
           document.getElementById('nonit_process').style.display='none';
        }  else  {
            document.getElementById('it_process').style.display='none';
            document.getElementById('nonit_process').style.display='block';
        } 
    });
});
        
        </script>

</body>
</html>
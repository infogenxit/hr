<?php
require('dbconnection.php');
//Start Code By Maria
session_start();
//fetching data for both user and recruiter by applicant session

$sessionid = $_SESSION["recruiter"];

if(!$_SESSION["IS_LOGIN"]) {
    header("location: ./login.php");
}
//End Code By Maria

$fetch_query="SELECT * FROM `resources` WHERE shortlist_status = 'yes' and resource_type = 'IT'";
$result = mysqli_query($con,$fetch_query);

$nfetch_query="SELECT * FROM `resources` WHERE shortlist_status = 'yes' and resource_type = 'Non IT'";
$nresult = mysqli_query($con,$nfetch_query);




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
   
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">
  
   <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@400;700&family=Teko:wght@500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
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
.pagination {
   display: inline-block;
   padding-left: 0;
   margin: 20px 0;
   border-radius: 4px;
}
.pagination>li {
   display: inline;
}
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
   color: #777;
   cursor: not-allowed;
   background-color: #fff;
   border-color: #ddd;
}
div.dataTables_wrapper div.dataTables_paginate {
   margin: 0;
   white-space: nowrap;
   text-align: right;
}
.pagination>li>a, .pagination>li>span {
   position: relative;
   float: left;
   padding: 6px 12px;
   margin-left: -1px;
   line-height: 1.42857143;
   color: #337ab7;
   text-decoration: none;
   background-color: #fff;
   border: 1px solid #ddd;
}
.pagination>li:first-child>a, .pagination>li:first-child>span {
   margin-left: 0;
   border-top-left-radius: 4px;
   border-bottom-left-radius: 4px;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
   z-index: 3;
   color: #fff;
   cursor: default;
   background-color: #337ab7;
   border-color: #337ab7;
}
.pagination>li>a, .pagination>li>span {
   position: relative;
   float: left;
   padding: 6px 12px;
   margin-left: -1px;
   line-height: 1.42857143;
   color: #337ab7;
   text-decoration: none;
   background-color: #fff;
   border: 1px solid #ddd;
}
div.dataTables_wrapper div.dataTables_paginate {
   font-size: small;
   margin: 0;
   white-space: nowrap;
   text-align: right;
}
div.dataTables_wrapper div.dataTables_info {
   font-size: small;
   padding-top: 8px;
   white-space: nowrap;
}
div.dataTables_wrapper div.dataTables_length label {
   font-size: large;
   font-weight: normal;
   text-align: left;
   white-space: nowrap;
}
div.dataTables_wrapper div.dataTables_filter label {
   font-size: large;
   font-weight: normal;
   white-space: nowrap;
   text-align: left;
}

table.dataTable thead .sorting:after {
   opacity: 0.2;
   content: "\e150";
}
table.dataTable thead .sorting_asc:after {
   content: "\e155";
}
table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
   position: absolute;
   bottom: 8px;
   right: 8px;
   display: block;
   font-family: 'Glyphicons Halflings';
   opacity: 0.5;
}



   </style>
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
            <div id="table-it">
                <table class="content-table" id="example">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Recruiter</th>
                        <th>Rate P/h</th>
                        <th>Project Assigned</th>
                        <th></th>
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
                        <td>Rs <?php echo $data["rate_per_hour"]!=''?$data["rate_per_hour"]:'-'; ?></td>
                        <td><?php echo $data["project_assigned"]; ?></td>
                        <td>
                                <a href="<?php echo 'resource-profile.php?id='.$data['id']; ?>" class="visit_button" name="visit">
                                    Visit&nbsp;Profile
                                </a>
                            </td>
                      </tr>
                      <?php
                       }
                      ?>
                    </tbody>
                  </table>
                    </div>
                <div id="table-non">
                  <table class="content-table" id="example1" >
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Recruiter</th>
                        <th>Rate P/h</th>
                        <th>Project Assigned</th>
                        <th></th>
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
                        <td>Rs <?php echo $nonit["rate_per_hour"]!=''?$nonit["rate_per_hour"]:'-'; ?></td>
                        <td><?php echo $nonit["project_assigned"]; ?></td>
                        <td>
                                <a href="<?php echo 'resource-profile.php?id='.$nonit['id']; ?>" class="visit_button" name="visit">
                                    Visit&nbsp;Profile
                                </a>
                            </td>
                      </tr>
                      <?php
                       }
                      ?>
                      
                     
                    </tbody>
                  </table>
                    </div>
                  
            </div>
            
       </div>
       
    </main>

    <script>
        
document.getElementById("it").onclick = function() {
    document.getElementById("table-it").style.display = "block";
    document.getElementById("table-non").style.display = "none";
    document.getElementById("non-it").style.backgroundColor = "#fff";
    document.getElementById("it").style.backgroundColor = "#c5c5c5";
}
 
document.getElementById("non-it").onclick = function() {
    document.getElementById("table-it").style.display = "none";
    document.getElementById("table-non").style.display = "block";
    document.getElementById("it").style.backgroundColor = "#fff";
    document.getElementById("non-it").style.backgroundColor = "#c5c5c5";


}
        
        </script>

</body>
<script>
    $(document).ready(function () {
	//Only needed for the filename of export files.

	
	// DataTable initialisation
	$("#example").DataTable({
		
		paging: true,
		autoWidth: true,
        "ordering": false
	});
    $("#example1").DataTable({
		
		paging: true,
		autoWidth: true,
        "ordering": false
	});
   
});

    </script>
</html>


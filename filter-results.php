<?php
error_reporting(E_ALL);
require("dbconnection.php");
session_start();

if(isset($_REQUEST["rateph"]) && $_REQUEST["rateph"]!='')
{
	$tmprate =$_REQUEST["rateph"];
	 if($tmprate == "Less than 100")	$rate = "`rate_per_hour` < 100";
     	else if($tmprate == "100-150")	$rate = "`rate_per_hour`BETWEEN 100 AND 150 ";
	else if($tmprate == "150-200")	$rate = "`rate_per_hour`BETWEEN 150 AND 200 ";
    else if($tmprate == "200-250")	$rate = "`rate_per_hour`BETWEEN 200 AND 250 ";
    else if($tmprate == "250-300")	$rate = "`rate_per_hour`BETWEEN 250 AND 300 ";
    else if($tmprate == "300-350")	$rate = "`rate_per_hour` BETWEEN 300 AND 350";
    else if($tmprate == "350-400")	$rate = "`rate_per_hour` BETWEEN 350 AND 400";
    else if($tmprate == "More than 400")	$rate = "`rate_per_hour` > 400";

}
else { $rate="`rate_per_hour` like '%'"; }


if(isset($_REQUEST["experience"]) && $_REQUEST["experience"]!='')
{
	$tmpexp =$_REQUEST["experience"];
	if($tmpexp == "0-2")	    $exp = "`workExperience` like '1'";
	else if($tmpexp == "2-6")	$exp = "`workExperience` like '2' or `workExperience` like '3' or `workExperience` like '4' or `workExperience` like '5'";
	else if($tmpexp == "6-10")	$exp = "`workExperience` like '6' or `workExperience` like '7' or `workExperience` like '8' or `workExperience` like '9'";
	else if($tmpexp == "10-14")	$exp = "`workExperience` like '10' or `workExperience` like '11' or `workExperience` like '12' or `workExperience` like '13'";
    else if($tmpexp == "14-18")	$exp = "`workExperience` like '14' or `workExperience` like '15' or `workExperience` like '16' or `experiworkExperienceence` like '17'";
    else if($tmpexp == "18-21")	$exp = "`workExperience` like '18' or `workExperience` like '19' or `workExperience` like '20'";
    else if($tmpexp == "21-24")	$exp = "`workExperience` like '21' or `workExperience` like '22' or `workExperience` like '23'";
    else if($tmpexp == "24-27")	$exp = "`workExperience` like '24' or `workExperience` like '25' or `workExperience` like '26'";
    else if($tmpexp == "27-30")	$exp = "`workExperience` like '27' or `workExperience` like '28' or `workExperience` like '29' or `workExperience` like '30'";
}
else { $exp="`workExperience` like '%'" ;}

if(isset($_REQUEST["resource_type"]) && $_REQUEST["resource_type"]!='') 
	$resource_type = $_REQUEST["resource_type"]; 
else  $resource_type="%";

if(isset($_REQUEST["employment_type"]) && $_REQUEST["employment_type"]!='')
	$employment_type =$_REQUEST["employment_type"]; 
else $employment_type="%";

if(isset($_REQUEST["developer_type"]) && $_REQUEST["developer_type"]!='') 
	$developer_type =$_REQUEST["developer_type"]; 
else $developer_type="%";


 $qry="SELECT * FROM `resources` where ".$rate." and ".$exp." and `resource_type` like '$resource_type'  and `job_type` like '$employment_type' and `developer-type` like '$developer_type' ";
//$qry="SELECT * FROM `resources` where  `resource_type` like 'IT'";

$res = mysqli_query($con,$qry) or die("error");
if(isset($_REQUEST["profile_visit"]))
{
    $_SESSION["resource"] = $_REQUEST["resource_id"];
    header('location:resource-profile.php');


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@400;700&family=Teko:wght@500&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management</title>
    <style>
        body {
            background-color: #EEEDF1;
            font-family: 'Poppins', sans-serif;
        }

        .herotabs {
            margin-left: 290px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #eeedf1ce
        }

        .content-table {
    border-collapse: collapse;
    margin: auto;
    font-size: 0.7em;
    min-width: 70vw;
    max-width:70vw;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
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
                    <navlink class="navlinks " onclick="location.href = 'dashboard.php';">
                        <i class="fa-solid fa-border-all"></i><span>DashBoard</span>
                    </navlink>
                    <!-- <navlink class="navlinks" >
                        <i class="fa-solid fa-calendar-day"></i> <span>Events</span>
                    </navlink> -->
                </div>
                <div class="nav-sec">
                    <h3>Recruitment</h3>
                    <navlink class="navlinks " onclick="location.href = 'resources.php';">
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
                <button onclick="location.href= 'filter.php'"><i class="fa-solid fa-arrow-left"></i>Back</button>
               
            </div>
            

<div class="table-wrapper">
                <table class="content-table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Skills</th>
                        <th>Relevant field</th>
                        <th>Rate P/h</th>
                        
                        <th></th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <form action="" method="post">
                    <?php
                    $i=0;
                     while($data= mysqli_fetch_assoc($res))
                                    { 
                                    ?>
                                  
                      <tr  >
                        <td><?php echo $data["name"]; ?>
                        <input type="hidden" value="<?php echo $data["resource_id"]; ?>" name="resource_id"></td>
                        <td class="skill-tab"><?php echo $data["email"]; ?>
                            </td>
                        <td><?php echo $data["mobile"]; ?></td>
                        <td><?php echo $data["skills"]; ?></td>
                        <td><?php echo $data["relevant_exp"]!='' ?$data["relevant_exp"] : '-'; ?></td>
                        <td><?php echo $data["rate_per_hour"]!=''? $data["rate_per_hour"]: '-'; ?></td>

                        <td><a href="<?php echo 'resource-profile.php?id='.$data['id']; ?>" class="visit_button" name="visit">
                                    Visit&nbsp;Profile
                                </a></td>
                        
                      </tr>
                     
                      <?php
                      $i++;
                       }
                       if($i==0){
                        ?>
                        <tr><td colspan=7 style="text-align:center">No Data Found</td></tr>
                       <?php }
                      ?>
                      </form>
                    </tbody>
                  </table>
            </div>





    </main>

    <script>


    </script>

</body>

</html>
<?php
require('dbconnection.php');
session_start();

$resourceid = $_GET["id"];
$x = 0;

$fetch_query= "SELECT * from `resouorce` where id = '$resourceid' ";
$result = mysqli_query($con,$fetch_query);
$data = mysqli_fetch_assoc($result);

if(isset($_REQUEST["submit"]))
{
	$shortlist_status = $_REQUEST["shortlist_status"];
	$project_assign = $_REQUEST["project_assign"];
	$rid = $_REQUEST["rid"];
    
    $qry = "UPDATE `resouorce` SET `shortlist_status`='$shortlist_status',`project_assigned`='$project_assign' WHERE id = '$rid';
    ";

    $res = mysqli_query($con,$qry) or die ("<h1> Data Insertion Error!!! </h1>");
    if($res)
    {
      echo"<script>alert('Record Updated Successfully');</script>";
    }
    else{
        echo"<script>alert('Record Not Updated ');</script>";
    }

}




?>
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
    <title>Document</title>
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
    </style>


</head>

<body>

    <aside class="sidenav-left">
        <div class="navbar-wrapper">
            <h2 class="logo">Wehr</h2>
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
                    <navlink class="navlinks active-nav" onclick="location.href = 'resources.php';">
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
        <div class="resource-profile">
            <div class="back-buttonwrapper">
                <button onclick="location.href= 'resources.php'"><i class="fa-solid fa-arrow-left"></i>Back</button>
            </div>
            <div class="profile-card-wrapper">
                <div class="profile-card">
                    <div class="profile_head">
                        <img src="<?php echo $data["picture"]; ?>" class="profile-pic">
                        <h3><?php echo $data["name"]; ?></h3>
                        <h4><?php echo $data["email"]; ?></h4>
                        <h3><?php echo $data["mobile"]; ?></h3>
                    </div>
                    <div class="profile_body">
                        <div class="profile_column">
                            <div class="profile_data">
                            <span>Address -</span>
                           <p class="data"> <?php echo $data["location"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Work Experience -</span>
                           <p class="data"> <?php echo $data["workExperience"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Skills -</span>
                           <p class="data"> <?php echo $data["skills"]; ?></p>  
                        </div>
                        <div class="profile_data">
                        <span>Current Company -</span>
                           <p class="data"> <?php echo $data["currentCompany"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Current Salary -</span>
                           <p class="data"> <?php echo $data["currentCtc"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Notice Period -</span>
                           <p class="data"> <?php echo $data["noticePeriod"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Freelancer -</span>
                           <p class="data"> <?php echo $data["freelance ready"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Rate P/H -</span>
                           <p class="data"> <?php echo $data["rate per-hour"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Resume -</span>
                        <embed src="<?php echo $data["resume"]; ?>"  height="100%" width="100%"/>
                           

                        </div>
                        </div>
                        <!-- hgggjwef -->
                        
                        <div class="profile_column">
                            <div class="profile_data">
                            <span>City -</span>
                           <p class="data"> <?php echo $data["location"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Relevant Experience -</span>
                           <p class="data"> <?php echo $data["experience in relevant field"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Resource Type -</span>
                           <p class="data"> <?php echo $data["resource_type"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Current Role -</span>
                           <p class="data"> <?php echo $data["current role"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Expected Salary -</span>
                           <p class="data"> <?php echo $data["current ctc"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Type of job -</span>
                           <p class="data"> <?php echo $data["type of job"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Device Available -</span>
                           <p class="data"> <?php echo $data["device available"]; ?></p>
                        </div>
                        <div class="profile_data">
                        <span>Linkedin -</span>
                           <p class="data"> <a href="<?php echo $data["linkedin"]; ?>" target="blank" >Click to Visit</a></p>
                        </div>

                        </div>



                    </div>
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="profile-buttonwrapper">

                        <div class="button-data">
                            <span>Shorlist Resource - </span>
                            <span class="">
                                <select class="profile-select" name="shortlist_status">
                                <option value="">Select</option>
                                <option value="yes" <?php if($data['shortlist_status']=="yes"){?> selected <?php } ?>> Yes </option>
                                <option value="no"  <?php if($data['shortlist_status']=="no"){?> selected <?php } ?>> No </option>

                                </select>
                        </span>
                        <input type="hidden" name="rid" value="<?php echo $data["resource_id"];?>">

                        </div>
                        <div class="button-data">
                            <span>Assign to a project - </span>
                            <span class="">
                                <input type="text" class="profile-input" name="project_assign" > 

                                
                        </span>
                        </div>
                        <div class="filter-btn-wraper">
                            <button type="submit" name="submit" >Submit</button>
                        </div>
                    </div>
                 </form>

                </div>







            </div>
        </div>

        </div>

    </main>

    <script>

$(document).ready(function(){  
  
  function edit_data(id, text, column_name)  
  {  
      $.ajax({  
          url:"update-recruiter.php",  
          method:"POST",  
          data:{id:id, text:text, column_name:column_name},  
          dataType:"text",  
          success:function(data){  
              alert(data);
          }  
      });  
  }  
  $(document).on('change', '.app_hir', function(){  
      var id = $(this).data("apphir");  
      var res = $(this).val(); 		
      edit_data(id,res, "applicant_hired");  
  });  
   
});  

    </script>

</body>

</html>
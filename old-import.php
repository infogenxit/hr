<?php
require('dbconnection.php');
require('PHPExcel/PHPExcel.php');
require('PHPExcel/PHPExcel/IOFactory.php');


if(isset($_POST['submit'])){
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);

	if($ext=='xls') {
		$obj=PHPExcel_IOFactory::load($file);
		foreach($obj->getWorksheetIterator() as $sheet){
			$getHighestRow=$sheet->getHighestRow();

			for($i=0;$i<=$getHighestRow;$i++){
				$name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
				$resource_id=$sheet->getCellByColumnAndRow(1,$i)->getValue();
				$mobile=$sheet->getCellByColumnAndRow(2,$i)->getValue();
				$email=$sheet->getCellByColumnAndRow(3,$i)->getValue();
				$location=$sheet->getCellByColumnAndRow(4,$i)->getValue();
				$address=$sheet->getCellByColumnAndRow(5,$i)->getValue();
				$experience_field=$sheet->getCellByColumnAndRow(6,$i)->getValue();
				$work_experience=$sheet->getCellByColumnAndRow(7,$i)->getValue();
				$skills=$sheet->getCellByColumnAndRow(8,$i)->getValue();
				$developer_type=$sheet->getCellByColumnAndRow(9,$i)->getValue();
				$skillset=$sheet->getCellByColumnAndRow(10,$i)->getValue();
				$graduation_course=$sheet->getCellByColumnAndRow(11,$i)->getValue();
				$graduation_type=$sheet->getCellByColumnAndRow(12,$i)->getValue();
				$resume=$sheet->getCellByColumnAndRow(13,$i)->getValue();
				$picture=$sheet->getCellByColumnAndRow(14,$i)->getValue();
				$current_role=$sheet->getCellByColumnAndRow(15,$i)->getValue();
				$current_company=$sheet->getCellByColumnAndRow(16,$i)->getValue();
				$notice_period=$sheet->getCellByColumnAndRow(17,$i)->getValue();
				$current_ctc=$sheet->getCellByColumnAndRow(18,$i)->getValue();
				$work_location=$sheet->getCellByColumnAndRow(19,$i)->getValue();
				$freelance=$sheet->getCellByColumnAndRow(20,$i)->getValue();
				$device=$sheet->getCellByColumnAndRow(21,$i)->getValue();
				$job_type=$sheet->getCellByColumnAndRow(22,$i)->getValue();
				$joining_date=$sheet->getCellByColumnAndRow(23,$i)->getValue();
				$linkedin=$sheet->getCellByColumnAndRow(24,$i)->getValue();
				$rate=$sheet->getCellByColumnAndRow(25,$i)->getValue();
				$resource_type=$sheet->getCellByColumnAndRow(26,$i)->getValue();
				$recruiter=$sheet->getCellByColumnAndRow(27,$i)->getValue();
				$shortlist_status=$sheet->getCellByColumnAndRow(28,$i)->getValue();
				$project_assigned=$sheet->getCellByColumnAndRow(29,$i)->getValue();
				if($name!=''){
					$res= mysqli_query($con,"INSERT INTO`resources`(`name`, `resource_id`, `mobile`, `email`, `location`, `address`, `experience in relevant field`, `work experience`, `skills`, `developer-type`, `developer-skillset`, `graduation-course`, `graduation-type`, `resume`, `picture`, `current role`, `current company`, `notice period`, `current ctc`, `work_location`, `freelance ready`, `device available`, `type of job`, `joining date`, `linkedin`, `rate per-hour`, `resource_type`, `recruiter`, `shortlist_status`, `project_assigned`) values('$name','$resource_id','$mobile','$email','$location','$address','$experience_field','$work_experience','$skills','$developer_type','$skillset','$graduation_course','$graduation_type','$resume','$picture','$current_role','$current_company','$notice_period','$current_ctc','$work_location','$freelance','$device','$job_type','$joining_date','$linkedin','$rate','$resource_type','$recruiter','$shortlist_status','$project_assigned')");
         if($res)
		{
		  echo"<script>alert('Import Successfull');
          
            location.href('resources.php');
          </script>";
		    
		}
		else
		{
            echo" <script>
                alert('Import Failed Please try again');           
            </script>";
        }
				}
			}
		}
	}
    else{
		echo" <script>
                alert('Invalid file type, Only allowed XLS file formate !');           
            </script>"
        ;
	}

}

?><!DOCTYPE html>
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
    <title>Document</title>
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
            <h2 class="logo">Wehr</h2>
            <nav class="navlink-wrapper">
                <div class="nav-sec">
                <h3>Menu</h3>
                <navlink class="navlinks "  onclick="location.href = 'dashboard.php';">
                    <i class="fa-solid fa-border-all"></i><span>DashBoard</span>
                </navlink>
                <navlink class="navlinks"  >
                    <i class="fa-solid fa-calendar-day"></i> <span>Events</span>
                </navlink>
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
                <navlink class="navlinks">
                    <i class="fa-solid fa-calendar-day"></i> <span>Events</span>
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
<div class="import-container">
<h4> Please upload the excel file </h4>
<span>Note* Please use xls file type only and make sure the file is formatted as instructed </span>
<form method="post" enctype="multipart/form-data">
<input type="file"  name="doc">
<button type="submit" name="submit"> Submit </button>

</form>

 

</div>
            
       </div>
       
    </main>

    <script>
        $(document).ready(function () {
    $("#filter_developer_type").change(function () {
        var val1 = $(this).val();
        if (val1 == "webdev") {
            $("#filter_skillset").html("<option value=''>Select</option><option value='mern'>Mern Stack</option><option value='mern'>Mern Stack</option><option value='lamp'>Lamp Stack</option><option value='asp'>Asp.net</option><option value='java'>JAVA</option><option value='python'>Python</option><option value='php'>PHP</option>");
        } else if (val1 == "mobiledev") {
            $("#filter_skillset").html("<option value=''>Select</option><option value='hybrid_app'>Hybrid App</option><option value='flutter'>Flutter</option>");
        } else if (val1 == "uidev") {
            $("#filter_skillset").html("<option value='ui_dev'>Ui Developer</option>");
        } 
    });
});
        
        </script>

</body>
</html>
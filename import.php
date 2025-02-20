<?php
session_start();
//fetching data for both user and recruiter by applicant session
//Start Code By Maria
$sessionid = $_SESSION["recruiter"];

if(!$_SESSION["IS_LOGIN"]) {
    header("location: ./login.php");
}
//End Code By Maria
require('dbconnection.php');
require('PHPExcel/PHPExcel.php');
require('PHPExcel/PHPExcel/IOFactory.php');

require('import/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require('import/spreadsheet-reader-master/SpreadsheetReader.php');

if(isset($_POST['submit'])){
	$file=$_FILES['doc']['tmp_name'];
	$ext=pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);

	if($ext=='xls' || $ext=='xlsx') {
		$obj = PHPExcel_IOFactory::load($file);
        $cnt = 0;
		foreach($obj->getWorksheetIterator() as $sheet) {
			$getHighestRow=$sheet->getHighestRow();
			for($i=2; $i <= $getHighestRow; $i++) {
                // echo '<pre>';print_r($i);die;
				$name=$sheet->getCellByColumnAndRow(1, $i)->getValue();
				$resource_id=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				$mobile=$sheet->getCellByColumnAndRow(2,$i)->getValue();
				$email=$sheet->getCellByColumnAndRow(3,$i)->getValue();
				$location=$sheet->getCellByColumnAndRow(4,$i)->getValue();
				$address=$sheet->getCellByColumnAndRow(4,$i)->getValue();
				$experience_field=$sheet->getCellByColumnAndRow(9,$i)->getValue();
				$work_experience=$sheet->getCellByColumnAndRow(9,$i)->getValue();
				$skills=$sheet->getCellByColumnAndRow(8,$i)->getValue();
				$developer_type=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				$skillset=$sheet->getCellByColumnAndRow(8,$i)->getValue();
				$graduation_course=$sheet->getCellByColumnAndRow(5,$i)->getValue();
				$graduation_type=$sheet->getCellByColumnAndRow(6,$i)->getValue();
				$resume=$sheet->getCellByColumnAndRow(21,$i)->getValue();
				$picture=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				$current_role=$sheet->getCellByColumnAndRow(10,$i)->getValue();
				$current_company=$sheet->getCellByColumnAndRow(11,$i)->getValue();
				$notice_period=$sheet->getCellByColumnAndRow(18,$i)->getValue();
				$current_ctc=$sheet->getCellByColumnAndRow(12,$i)->getValue();
				$work_location=$sheet->getCellByColumnAndRow(4,$i)->getValue();
				$freelance=$sheet->getCellByColumnAndRow(14,$i)->getValue();
				$device=$sheet->getCellByColumnAndRow(19,$i)->getValue();
				$job_type=$sheet->getCellByColumnAndRow(15,$i)->getValue();
				$joining_date=$sheet->getCellByColumnAndRow(22,$i)->getValue();
				$linkedin=$sheet->getCellByColumnAndRow(20,$i)->getValue();
				$rate=$sheet->getCellByColumnAndRow(16,$i)->getValue();
				$resource_type=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				$recruiter=$sheet->getCellByColumnAndRow(24,$i)->getValue();
				$shortlist_status=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				$project_assigned=$sheet->getCellByColumnAndRow(30,$i)->getValue();
				
                if($name!='') {
                   
					$res = mysqli_query($con,"INSERT INTO `resources`(`name`, `resource_id`, `mobile`, `email`, `location`, `address`, `relevant_exp`, `workExperience`, `skills`, `developer-type`, `developer-skillset`, `graduation-course`, `graduation-type`, `resume`, `picture`, `current_role`, `current_company`, `notice_period`, `current_ctc`, `work_location`, `freelance_ready`, `device_available`, `job_type`, `joining_date`, `linkedin`, `rate_per_hour`, `resource_type`, `recruiter`, `shortlist_status`, `project_assigned`) values('$name','$resource_id','$mobile','$email','$location','$address','$experience_field','$work_experience','$skills','$developer_type','$skillset','$graduation_course','$graduation_type','$resume','$picture','$current_role','$current_company','$notice_period','$current_ctc','$work_location','$freelance','$device','$job_type','$joining_date','$linkedin','$rate','$resource_type','$recruiter','$shortlist_status','$project_assigned')");
                    if($res) {
                        $cnt = $cnt + 1;
                    }
				}
			}
            if($cnt > 0) {
                echo"<script>alert('Import Successfull');
                
                  location.href('resources.php');
                </script>";
                  
              } else {
                  echo" <script>
                      alert('Import Failed Please try again');           
                  </script>";
              }
		}
	} elseif ( $ext == 'csv') {
        try
        {
            $Spreadsheet = new SpreadsheetReader($file);
            $Sheets = $Spreadsheet -> Sheets();

            $result = "";
            foreach ($Sheets as $Index => $sheetName)
            {
                $Spreadsheet -> ChangeSheet($Index);
                foreach ($Spreadsheet as $Key => $Row)
                {
                    if ($Key === 0) {
                        continue;
                    }

                    if ($Row)
                    {
                        $name = $mobile = $email = $qualification = $skills = $location = $workExperience = $linkedinURL = $resume = $currentRole = $currentCompany = $gender = $languageKnown = $noticePeriod = $serviceNoticePeriod = $expectedCtc = $currentCtc = $hourlyRate = $weekend = $partTimeOrFullTime = $computer = $canJoinImmediately = $appliedDate = $contactedDate = $contactedBy = $status = $remark = "";

                        $resource_type = $_POST['resource_type'];
                        
                        if (isset($Row[1])) {
                            $name = $Row[1];
                        }
                        if (isset($Row[2])) {
                            $mobile = $Row[2];
                        }
                        if (isset($Row[3])) {
                            $email = $Row[3];
                        }
                        if (isset($Row[4])) {
                            $location = $Row[4];
                        }
                        if (isset($Row[5])) {
                            $qualification = $Row[5];
                        }
                        if (isset($Row[6])) {
                            $skills = $Row[6];
                        }
                        if (isset($Row[7])) {
                            $workExperience = $Row[7];
                        }
                        if (isset($Row[8])) {
                            $linkedinURL = $Row[8];
                        }
                        if (isset($Row[9])) {
                            $resume = $Row[9];
                        }
                        if (isset($Row[10])) {
                            $currentRole = $Row[10];
                        }
                        if (isset($Row[11])) {
                            $currentCompany = $Row[11];
                        }
                        if (isset($Row[12])) {
                            $gender = $Row[12];
                        }
                        if (isset($Row[13])) {
                            $languageKnown = $Row[13];
                        }
                        if (isset($Row[14])) {
                            $noticePeriod = $Row[14];
                        }
                        if (isset($Row[15])) {
                            $serviceNoticePeriod = $Row[15];
                        }
                        if (isset($Row[16])) {
                            $expectedCtc = $Row[16];
                        }
                        if (isset($Row[17])) {
                            $currentCtc = $Row[17];
                        }
                        if (isset($Row[18])) {
                            $hourlyRate = $Row[18];
                        }
                        if (isset($Row[19])) {
                            $weekend = $Row[19];
                        }
                        if (isset($Row[20])) {
                            $partTimeOrFullTime = $Row[20];
                        }
                        if (isset($Row[21])) {
                            $computer = $Row[21];
                        }
                        if (isset($Row[22])) {
                            $canJoinImmediately = $Row[22];
                        }
                        if (isset($Row[23])) {
                            $appliedDate = $Row[23];
                        }
                        if (isset($Row[24])) {
                            $contactedDate = $Row[24];
                        }
                        if (isset($Row[25])) {
                            $contactedBy = $Row[25];
                        }
                        if (isset($Row[26])) {
                            $status = $Row[26];
                        }
                        if (isset($Row[27])) {
                            $remark = $Row[27];
                        }

                        if ($name) {
                            $str = "INSERT INTO `resouorce` (
                                `sheetName`, `name`, `mobile`, `email`, `location`, `qualification`, `skills`, `workExperience`, `linkedinURL`, `resume`, `currentRole`, `currentCompany`, `gender`, `languageKnown`, `noticePeriod`, `serviceNoticePeriod`, `expectedCtc`, `currentCtc`, `hourlyRate`, `weekend`, `partTimeOrFullTime`, `computer`, `canJoinImmediately`, `appliedDate`, `contactedDate`, `contactedBy`, `status`, `remark`) 
                                VALUES ('$resource_type', '$name', '$mobile', '$email', '$location', '$qualification', '$skills', '$workExperience', '$linkedinURL', '$resume', '$currentRole', '$currentCompany', '$gender', '$languageKnown', '$noticePeriod', '$serviceNoticePeriod', '$expectedCtc', '$currentCtc', '$hourlyRate', '$weekend', '$partTimeOrFullTime', '$computer', '$canJoinImmediately', '$appliedDate', '$contactedDate', '$contactedBy', '$status', '$remark')";
                        }

                        $result = mysqli_query($con, $str);

                    }
                }

                if($result) {
                  echo"<script>alert('Import Successfull');
                    location.href('resources.php');
                  </script>";
                } else {
                    echo" <script>
                        alert('Import Failed Please try again');           
                    </script>";
                }
            }
        }

        catch (Exception $E)
        {
            echo $E -> getMessage();
        }
    }
    else {
		echo" <script>
                alert('Invalid file type, Only allowed XLS file formate !');
            </script>"
        ;
	}
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
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@400;700&family=Teko:wght@500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript" src="script.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Resource Management</title>
    <style>
        body {
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
            <form action="import.php"  method="POST" enctype="multipart/form-data">
                <div class="import-container" style="padding: 20px 90px; max-width: 400px;">
                    <div class="chart-buttons-wrapper">
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM `category`");
                        ?>
                        <select name="resource_type" class="form-control" style="width: 100%; margin: 0; margin-bottom: 20px;">
                            <option>Select Resource Category Type</option>
                            <?php
                                while($data = mysqli_fetch_assoc($query)) {
                                    echo "<option value=" .$data['name'].">". $data['name']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <h4> Please upload the excel file </h4>
                    <span>Note* Please use xls file type only and make sure the file is formatted as instructed </span>
                    <br>
                    <div style="display: flex;">
                        <input type="file"  name="doc" >
                        <button type="submit" name="submit"> Submit </button>
                    </div>
                </div>
            </form>          <?php
         /* start Code by Maria*/
// link to Google Docs spreadsheet
$url = "https://docs.google.com/spreadsheets/d/e/2PACX-1vQwRJ0a7BDEwE9m6rmoAI6qhy-a37LCoPl4nLnoBQssjhTt5vCIe4LVzzjjQLxJkg38QRFBVckTStEa/pub?output=csv";

// open file for reading
if (($handle = fopen($url, "r")) !== FALSE)
{
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
      //print_r($data);
      $totalrows=count($data);                 
        $spreadsheet_data[] = $data;
    }
  	foreach($spreadsheet_data as $Row) {
     				if ($Row)
                    {
                        $email=$Row[3];
                        $resource_type = 'Non-IT Interns';
                        $email_check = "select email from resources WHERE email='$email'";
                        $sql_email_check = mysqli_query($con,$email_check);
                        $email_check = mysqli_num_rows($sql_email_check);
                        if ($email_check < 1){ 
                          $str = "INSERT INTO `resources` (
                        `sheetName`, `name`, `mobile`, `email`, `location`, `address`, `relevant_exp`, `workExperience`, `skills`, `developer-type`, `developer-skillset`, `graduation-course`, `graduation-type`, `resume`, `picture`, `current_role`, `current_company`, `notice_period`, `current_ctc`, `work_location`, `freelance_ready`, `device_available`, `job_type`, `joining_date`, `linkedin`, `recruiter`, `project assigned`, `shortlist_status`, `rate_per_hour`, `resource_id`, `resource_type`, `project_assigned`,`created-date-googleSheet`,`expected_ctc`) 
                          VALUES ('$resource_type', '$Row[1]', '$Row[2]', '$Row[3]', '$Row[4]', '$Row[5]', '$Row[6]', '$Row[7]', '$Row[8]', '$Row[9]', '$Row[10]', '$Row[11]', '$Row[12]', '$Row[13]', '$Row[14]', '$Row[15]', '$Row[16]', '$Row[17]', '$Row[18]', '$Row[19]', '$Row[20]', '$Row[21]', '$Row[22]', '$Row[23]', '$Row[24]', '$Row[25]', '$Row[26]', '$Row[27]','$Row[28]','$Row[29]','$Row[30]','$Row[31]','$Row[32]','$Row[33]')";
                         }
					    $result = mysqli_query($con, $str);
                    }
      			  
    }
                if($result) {
                echo 'Import Successfull';
                } else {
                    echo 'Import Failed Please try again';
                }
 fclose($handle);
}
/* end Code by Maria*/

         ?>
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

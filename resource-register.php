<?php
require("dbconnection.php");

session_start();
//fetching data for both user and recruiter by applicant session

$sessionid = $_SESSION["recruiter"];



if(isset($_REQUEST["upload"]))
{

	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	$phone = $_REQUEST["phone"];
	$email = $_REQUEST["email"];
	$location = $_REQUEST["location"];
	$address = $_REQUEST["address"];
	$experience_relevant = $_REQUEST["experience_relevant"];
	$work_experience = $_REQUEST["work-experience"];

    $skills="";
	$skill = $_REQUEST["skills"];

	foreach($skill as $tmp)
	{
		$skills.= $tmp." , ";
	}
	$dev_type = $_REQUEST["developer-type"];
	$expected_ctc = $_REQUEST["expected_ctc"];
	$specification = $_REQUEST["specification"];
	$graduation = $_REQUEST["graduation"];
	$current_role = $_REQUEST["current_role"];
	$current_company = $_REQUEST["current_company"];
	$notice_period = $_REQUEST["notice_period"];
	$current_ctc = $_REQUEST["current_ctc"];
	$work_location = $_REQUEST["work_location"];
	$freelance = $_REQUEST["freelance"];
	$device = $_REQUEST["device"];
	$type_ofjob = $_REQUEST["type_ofjob"];
	$date_of_join = $_REQUEST["date_of_join"];
	$linkedin = $_REQUEST["linkedin"];
	$rate = $_REQUEST["rateph"];
	$linkedin = $_REQUEST["linkedin"];
    $resource_type = $_REQUEST["resource-type"];
    $recruiter_name = $_REQUEST["recruiter_name"];

$pages = range(100000,900000);
        // Shuffle numbers
        shuffle($pages);
        // Get a page
        $resourceid = array_shift($pages);

		$cv = $_FILES["upcv"];
	$pic = $_FILES["pic"];

    $cvname = $cv["name"];
	$cvtmpname = $cv["tmp_name"];
	$cvlocation = "resource_document/".$resourceid.$cvname;

	$picname = $pic["name"];
	$pictmpname = $pic["tmp_name"];
	$piclocation = "resource_document/".$resourceid.$picname;


		move_uploaded_file($cvtmpname,$cvlocation) or die("<h1>cv Not Uploaded</h1>");
		move_uploaded_file($pictmpname,$piclocation) or die("<h1>Pic Not Uploaded</h1>");    

    


        
         $qry="INSERT INTO `resources`(`name`, `resource_id`, `mobile`, `email`, `location`, `address`, `relevant_exp`, `workExperience`, `skills`, `developer-type`, `expected_ctc`, `graduation-course`, `graduation-type`, `resume`, `picture`, `current_role`, `current_company`, `notice_period`, `current_ctc`, `work_location`, `freelance_ready`, `device_available`, `job_type`, `joining_date`, `linkedin`, `rate_per_hour`, `resource_type`, `recruiter`,`shortlist_status`, `project_assigned`) VALUES ('$fname $lname','$resourceid','$phone','$email','$location','$address','$experience_relevant','$work_experience','$skills','$dev_type','$expected_ctc','$specification','$graduation','$cvlocation','$piclocation','$current_role','$current_company','$notice_period','$current_ctc','$work_location','$freelance','$device','$type_ofjob','$date_of_join','$linkedin','$rate','$resource_type','$recruiter_name','no','null')";



       

        
        $res = mysqli_query($con,$qry) or die ("<h1> Data Insertion Error!!! </h1>");
        
        if($res)
		{
		  echo"<script>alert('You have successfully uploaded your data!');
          
            location.href('resources.php');
          </script>";
		    
		}
		else
		{}


}



else{}


$fetch_query="SELECT * FROM `log-cred` WHERE employee_id = '$sessionid' ";
$fetch_query="SELECT * FROM `log-cred` WHERE employee_id = '$sessionid' ";

$result = mysqli_query($con,$fetch_query);
$data= mysqli_fetch_assoc($result) ;
if($result)
{
	

	
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
   margin-left:250px;
   height:100vh;
   display:flex;
   flex-direction:column;
  background-color:#eeedf1ce
}
.buttons-wrapper{
    display:flex;
    flex-direction:row;
    justify-content: space-between;
    
    padding:5% 15% 5% 15%; 
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    color:#313131;
 }
 

 .sidenav{
    position:fixed;
    left:0;
    top:0;
    right:auto;
    bottom:0;
    height:100vh;
    width:250px;
    overflow-x:hidden;
    background-color: #fff;
    padding:0px 20px 80px 20px;
    
}

.navbar-wrapper .navlink-wrapper .nav-sec
{
    display:flex;
    flex-direction:column;
    
}
.navbar-wrapper h2
{
    font-family: 'Poppins', sans-serif;
font-style: normal;
font-weight: 600;
font-size: 36px;
line-height: 42px;
    
}

.nav-sec h3{
    margin:20px 0 20px 0;
    font-family: 'Poppins', sans-serif;
font-style: normal;
font-weight: 700;
font-size:18px;

}
i{
    padding-right:10px;
}
.navlinks 
{
    
    height:40px;
    width:auto;
    border-radius:8px;
    padding:10px 0 0px 14px !important;
    margin:2px 0 2px 0;
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 21px;
    padding:auto;
    text-align: start;
    letter-spacing: 0.03em;
    color: #B2B2B2;

}

 
.navlinks:hover
{

    
    color: #888888;
    height:40px;
    width:auto;
    border-radius:8px;
    padding:10px 0 0px 14px;
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 21px;
    padding:auto;
    text-align: start;
    letter-spacing: 0.03em;
}

.active-nav{
    background-color:#377DFF !important ;
    color: #fff !important;
    height:40px;
    width:auto;
    border-radius:8px;
    padding:10px 0 0px 14px;
    font-family: 'Poppins', sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 21px;
    padding:auto;
    text-align: start;
    letter-spacing: 0.03em;
}


</style>
    

</head>
<body class="projects">
    
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
        <?php
         echo $sessionid;
        ?>
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
                <navlink class="navlinks" >
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
      <div class="form-table">
        <div class="buttons-wrapper">
            
            <button onclick="location.href= 'dashboard.php'"><i class="fa-solid fa-arrow-left"></i>Back</button>
            
             <button   onclick="location.href= 'import.php'" > Import Excel File </button>
            
        </div>
    <div class="form-wrapper">
       <form class="form-horizontal" id="frm_grp" action="" method="post" enctype="multipart/form-data" >
       <input type="hidden" name="recruiter_name" value="<?php echo $data["name"]; ?>">

        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">First Name -</label>
            <div class="col-sm-4">
                <input type="text"   class="form-control" id="fname" name="fname">
            </div>

            <label class="control-label col-lg-2" for="lname">Last Name -</label>
            <div class="col-lg-4">
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
        </div>
<br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="phone">Mobile -</label>
                    <div class="col-sm-4">
                        <input type="number"   class="form-control" id="phone" name="phone">
                    </div>

                    <label class="control-label col-lg-2" for="email">Email -</label>
                    <div class="col-lg-4">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
<br>


<div class="form-group">
    <label class="control-label col-sm-2" for="location">Location -</label>
    <div class="col-sm-4">
        <select class="form-control" required name="location" id="location">
            <option value="Adilabad">Adilabad</option> 
            <option value="Agra">Agra</option> 
            <option value="Ahmedabad">Ahmedabad</option> 
            <option value="Ahmednagar">Ahmednagar</option>
             <option value="Aizawl">Aizawl</option> 
             <option value="Ajitgarh(Mohali)">Ajitgarh (Mohali)</option>
              <option value="Ajmer">Ajmer</option> 
              <option value="Akola">Akola</option>
               <option value="Alappuzha">Alappuzha</option> 
               <option value="Aligarh">Aligarh</option>
                <option value="Alirajpur">Alirajpur</option>
                 <option value="Allahabad">Allahabad</option>
                  <option value="Almora">Almora</option> 
                  <option value="Alwar">Alwar</option> 
                  <option value="Ambala">Ambala</option>
                   <option value="AmbedkarNagar">Ambedkar Nagar</option>
                    <option value="Amravati">Amravati</option> 
                    <option value="Amrelidistrict">Amreli district</option> 
                    <option value="Amritsar">Amritsar</option>
                     <option value="Anand">Anand</option> 
                     <option value="Anantapur">Anantapur</option> 
                     <option value="Anantnag">Anantnag</option> 
                     <option value="Angul">Angul</option>
                      <option value="Anjaw">Anjaw</option> 
                      <option value="Anuppur">Anuppur</option>
                      <option value="Araria">Araria</option>
                      <option value="Ariyalur">Ariyalur</option>
                      <option value="Arwal">Arwal</option>
                      <option value="AshokNagar">Ashok Nagar</option>
                      <option value="Auraiya">Auraiya</option>
                      <option value="Aurangabad">Aurangabad</option>
                      <option value="Aurangabad">Aurangabad</option>
                      <option value="Azamgarh">Azamgarh</option>
                      <option value="Badgam">Badgam</option>
                      <option value="Bagalkot">Bagalkot</option>
                      <option value="Bageshwar">Bageshwar</option>
                      <option value="Bagpat">Bagpat</option>
                      <option value="Bahraich">Bahraich</option>
                      <option value="Baksa">Baksa</option>
                      <option value="Balaghat">Balaghat</option>
                      <option value="Balangir">Balangir</option>
                      <option value="Balasore">Balasore</option>
                      <option value="Ballia">Ballia</option>
                      <option value="Balrampur">Balrampur</option>
                      <option value="Banaskantha">Banaskantha</option>
                      <option value="Banda">Banda</option>
                      <option value="Bandipora">Bandipora</option>
                      <option value="BangaloreRural">Bangalore Rural</option>
                      <option value="BangaloreUrban">Bangalore Urban</option>
                      <option value="Banka">Banka</option>
                      <option value="Bankura">Bankura</option>
                      <option value="Banswara">Banswara</option>
                      <option value="Barabanki">Barabanki</option>
                      <option value="Baramulla">Baramulla</option>
                      <option value="Baran">Baran</option>
                      <option value="Bardhaman">Bardhaman</option>
                      <option value="Bareilly">Bareilly</option>
                      <option value="Bargarh(Baragarh)">Bargarh (Baragarh)</option>
                      <option value="Barmer">Barmer</option>
                      <option value="Barnala">Barnala</option>
                      <option value="Barpeta">Barpeta</option>
                      <option value="Barwani">Barwani</option>
                      <option value="Bastar">Bastar</option>
                      <option value="Basti">Basti</option>
                      <option value="Bathinda">Bathinda</option>
                      <option value="Beed">Beed</option>
                      <option value="Begusarai">Begusarai</option>
                      <option value="Belgaum">Belgaum</option>
                      <option value="Bellary">Bellary</option>
                      <option value="Betul">Betul</option>
                      <option value="Bhadrak">Bhadrak</option>
                      <option value="Bhagalpur">Bhagalpur</option>
                      <option value="Bhandara">Bhandara</option>
                      <option value="Bharatpur">Bharatpur</option>
                      <option value="Bharuch">Bharuch</option>
                      <option value="Bhavnagar">Bhavnagar</option>
                      <option value="Bhilwara">Bhilwara</option>
                      <option value="Bhind">Bhind</option>
                      <option value="Bhiwani">Bhiwani</option>
                      <option value="Bhojpur">Bhojpur</option>
                      <option value="Bhopal">Bhopal</option>
                      <option value="Bidar">Bidar</option>
                      <option value="Bijapur">Bijapur</option>
                      <option value="Bijapur">Bijapur</option>
                      <option value="Bijnor">Bijnor</option>
                      <option value="Bikaner">Bikaner</option>
                      <option value="Bilaspur">Bilaspur</option>
                      <option value="Bilaspur">Bilaspur</option>
                      <option value="Birbhum">Birbhum</option>
                      <option value="Bishnupur">Bishnupur</option>
                      <option value="Bokaro">Bokaro</option>
                      <option value="Bongaigaon">Bongaigaon</option>
                      <option value="Boudh(Bauda)">Boudh (Bauda)</option>
                      <option value="Budaun">Budaun</option>
                      <option value="Bulandshahr">Bulandshahr</option>
                      <option value="Buldhana">Buldhana</option>
                      <option value="Bundi">Bundi</option>
                      <option value="Burhanpur">Burhanpur</option>
                      <option value="Buxar">Buxar</option>
                      <option value="Cachar">Cachar</option>
                      <option value="CentralDelhi">Central Delhi</option>
                      <option value="Chamarajnagar">Chamarajnagar</option>
                      <option value="Chamba">Chamba</option>
                      <option value="Chamoli">Chamoli</option>
                      <option value="Champawat">Champawat</option>
                      <option value="Champhai">Champhai</option>
                      <option value="Chandauli">Chandauli</option>
                      <option value="Chandel">Chandel</option>
                      <option value="Chandigarh">Chandigarh</option>
                      <option value="Chandrapur">Chandrapur</option>
                      <option value="Changlang">Changlang</option>
                      <option value="Chatra">Chatra</option>
                      <option value="Chennai">Chennai</option>
                      <option value="Chhatarpur">Chhatarpur</option>
                      <option value="ChhatrapatiShahujiMaharajNagar"> Chhatrapati Shahuji Maharaj Nagar </option>
                      <option value="Chhindwara">Chhindwara</option>
                      <option value="Chikkaballapur">Chikkaballapur</option>
                      <option value="Chikkamagaluru">Chikkamagaluru</option>
                      <option value="Chirang">Chirang</option>
                      <option value="Chitradurga">Chitradurga</option>
                      <option value="Chitrakoot">Chitrakoot</option>
                      <option value="Chittoor">Chittoor</option>
                      <option value="Chittorgarh">Chittorgarh</option>
                      <option value="Churachandpur">Churachandpur</option>
                      <option value="Churu">Churu</option>
                      <option value="Coimbatore">Coimbatore</option>
                      <option value="CoochBehar">Cooch Behar</option>
                      <option value="Cuddalore">Cuddalore</option>
                      <option value="Cuttack">Cuttack</option>
                      <option value="DadraandNagarHaveli"> Dadra and Nagar Haveli </option>
                      <option value="Dahod">Dahod</option>
                      <option value="DakshinDinajpur">Dakshin Dinajpur</option>
                      <option value="DakshinaKannada">Dakshina Kannada</option>
                      <option value="Daman">Daman</option>
                      <option value="Damoh">Damoh</option>
                      <option value="Dantewada">Dantewada</option>
                      <option value="Darbhanga">Darbhanga</option>
                      <option value="Darjeeling">Darjeeling</option>
                      <option value="Darrang">Darrang</option>
                      <option value="Datia">Datia</option>
                      <option value="Dausa">Dausa</option>
                      <option value="Davanagere">Davanagere</option>
                      <option value="Debagarh(Deogarh)">Debagarh (Deogarh)</option>
                      <option value="Dehradun">Dehradun</option>
                      <option value="Deoghar">Deoghar</option>
                      <option value="Deoria">Deoria</option>
                      <option value="Dewas">Dewas</option>
                      <option value="Dhalai">Dhalai</option>
                      <option value="Dhamtari">Dhamtari</option>
                      <option value="Dhanbad">Dhanbad</option>
                      <option value="Dhar">Dhar</option>
                      <option value="Dharmapuri">Dharmapuri</option>
                      <option value="Dharwad">Dharwad</option>
                      <option value="Dhemaji">Dhemaji</option>
                      <option value="Dhenkanal">Dhenkanal</option>
                      <option value="Dholpur">Dholpur</option>
                      <option value="Dhubri">Dhubri</option>
                      <option value="Dhule">Dhule</option>
                      <option value="DibangValley">Dibang Valley</option>
                      <option value="Dibrugarh">Dibrugarh</option>
                      <option value="DimaHasao">Dima Hasao</option>
                      <option value="Dimapur">Dimapur</option>
                      <option value="Dindigul">Dindigul</option>
                      <option value="Dindori">Dindori</option>
                      <option value="Diu">Diu</option>
                      <option value="Doda">Doda</option>
                      <option value="Dumka">Dumka</option>
                      <option value="Dungapur">Dungapur</option>
                      <option value="Durg">Durg</option>
                      <option value="EastChamparan">East Champaran</option>
                      <option value="EastDelhi">East Delhi</option>
                      <option value="EastGaroHills">East Garo Hills</option>
                      <option value="EastKhasiHills">East Khasi Hills</option>
                      <option value="EastSiang">East Siang</option>
                      <option value="EastSikkim">East Sikkim</option>
                      <option value="EastSinghbhum">East Singhbhum</option>
                      <option value="Eluru">Eluru</option>
                      <option value="Ernakulam">Ernakulam</option>
                      <option value="Erode">Erode</option>
                      <option value="Etah">Etah</option>
                      <option value="Etawah">Etawah</option>
                      <option value="Faizabad">Faizabad</option>
                      <option value="Faridabad">Faridabad</option>
                      <option value="Faridkot">Faridkot</option>
                      <option value="Farrukhabad">Farrukhabad</option>
                      <option value="Fatehabad">Fatehabad</option>
                      <option value="FatehgarhSahib">Fatehgarh Sahib</option>
                      <option value="Fatehpur">Fatehpur</option>
                      <option value="Fazilka">Fazilka</option>
                      <option value="Firozabad">Firozabad</option>
                      <option value="Firozpur">Firozpur</option>
                      <option value="Gadag">Gadag</option>
                      <option value="Gadchiroli">Gadchiroli</option>
                      <option value="Gajapati">Gajapati</option>
                      <option value="Ganderbal">Ganderbal</option>
                      <option value="Gandhinagar">Gandhinagar</option>
                      <option value="Ganganagar">Ganganagar</option>
                      <option value="Ganjam">Ganjam</option>
                      <option value="Garhwa">Garhwa</option>
                      <option value="GautamBuddhNagar">Gautam Buddh Nagar</option>
                      <option value="Gaya">Gaya</option>
                      <option value="Ghaziabad">Ghaziabad</option>
                      <option value="Ghazipur">Ghazipur</option>
                      <option value="Giridih">Giridih</option>
                      <option value="Goalpara">Goalpara</option>
                      <option value="Godda">Godda</option>
                      <option value="Golaghat">Golaghat</option>
                      <option value="Gonda">Gonda</option>
                      <option value="Gondia">Gondia</option>
                      <option value="Gopalganj">Gopalganj</option>
                      <option value="Gorakhpur">Gorakhpur</option>
                      <option value="Gulbarga">Gulbarga</option>
                      <option value="Gumla">Gumla</option>
                      <option value="Guna">Guna</option>
                      <option value="Guntur">Guntur</option>
                      <option value="Gurdaspur">Gurdaspur</option>
                      <option value="Gurgaon">Gurgaon</option>
                      <option value="Gwalior">Gwalior</option>
                      <option value="Hailakandi">Hailakandi</option>
                      <option value="Hamirpur">Hamirpur</option>
                      <option value="Hamirpur">Hamirpur</option>
                      <option value="Hanumangarh">Hanumangarh</option>
                      <option value="Harda">Harda</option>
                      <option value="Hardoi">Hardoi</option>
                      <option value="Haridwar">Haridwar</option>
                      <option value="Hassan">Hassan</option>
                      <option value="Haveridistrict">Haveri district</option>
                      <option value="Hazaribag">Hazaribag</option>
                      <option value="Hingoli">Hingoli</option>
                      <option value="Hissar">Hissar</option>
                      <option value="Hooghly">Hooghly</option>
                      <option value="Hoshangabad">Hoshangabad</option>
                      <option value="Hoshiarpur">Hoshiarpur</option>
                      <option value="Howrah">Howrah</option>
                      <option value="Hyderabad">Hyderabad</option>
                      <option value="Hyderabad">Hyderabad</option>
                      <option value="Idukki">Idukki</option>
                      <option value="ImphalEast">Imphal East</option>
                      <option value="ImphalWest">Imphal West</option>
                      <option value="Indore">Indore</option>
                      <option value="Jabalpur">Jabalpur</option>
                      <option value="Jagatsinghpur">Jagatsinghpur</option>
                      <option value="JaintiaHills">Jaintia Hills</option>
                      <option value="Jaipur">Jaipur</option>
                      <option value="Jaisalmer">Jaisalmer</option>
                      <option value="Jajpur">Jajpur</option>
                      <option value="Jalandhar">Jalandhar</option>
                      <option value="Jalaun">Jalaun</option>
                      <option value="Jalgaon">Jalgaon</option>
                      <option value="Jalna">Jalna</option>
                      <option value="Jalore">Jalore</option>
                      <option value="Jalpaiguri">Jalpaiguri</option>
                      <option value="Jammu">Jammu</option>
                      <option value="Jamnagar">Jamnagar</option>
                      <option value="Jamtara">Jamtara</option>
                      <option value="Jamui">Jamui</option>
                      <option value="Janjgir-Champa">Janjgir-Champa</option>
                      <option value="Jashpur">Jashpur</option>
                      <option value="Jaunpurdistrict">Jaunpur district</option>
                      <option value="Jehanabad">Jehanabad</option>
                      <option value="Jhabua">Jhabua</option>
                      <option value="Jhajjar">Jhajjar</option>
                      <option value="Jhalawar">Jhalawar</option>
                      <option value="Jhansi">Jhansi</option>
                      <option value="Jharsuguda">Jharsuguda</option>
                      <option value="Jhunjhunu">Jhunjhunu</option>
                      <option value="Jind">Jind</option>
                      <option value="Jodhpur">Jodhpur</option>
                      <option value="Jorhat">Jorhat</option>
                      <option value="Junagadh">Junagadh</option>
                      <option value="JyotibaPhuleNagar">Jyotiba Phule Nagar</option>
                      <option value="Kabirdham(formerlyKawardha)"> Kabirdham (formerly Kawardha) </option>
                      <option value="Kadapa">Kadapa</option>
                      <option value="Kaimur">Kaimur</option>
                      <option value="Kaithal">Kaithal</option>
                      <option value="Kakinada">Kakinada</option>
                      <option value="Kalahandi">Kalahandi</option>
                      <option value="Kamrup">Kamrup</option>
                      <option value="KamrupMetropolitan">Kamrup Metropolitan</option>
                      <option value="Kanchipuram">Kanchipuram</option>
                      <option value="Kandhamal">Kandhamal</option>
                      <option value="Kangra">Kangra</option>
                      <option value="Kanker">Kanker</option>
                      <option value="Kannauj">Kannauj</option>
                      <option value="Kannur">Kannur</option>
                      <option value="Kanpur">Kanpur</option>
                      <option value="KanshiRamNagar">Kanshi Ram Nagar</option>
                      <option value="Kanyakumari">Kanyakumari</option>
                      <option value="Kapurthala">Kapurthala</option>
                      <option value="Karaikal">Karaikal</option>
                      <option value="Karauli">Karauli</option>
                      <option value="KarbiAnglong">Karbi Anglong</option>
                      <option value="Kargil">Kargil</option>
                      <option value="Karimganj">Karimganj</option>
                      <option value="Karimnagar">Karimnagar</option>
                      <option value="Karnal">Karnal</option>
                      <option value="Karur">Karur</option>
                      <option value="Kasaragod">Kasaragod</option>
                      <option value="Kathua">Kathua</option>
                      <option value="Katihar">Katihar</option>
                      <option value="Katni">Katni</option>
                      <option value="Kaushambi">Kaushambi</option>
                      <option value="Kendrapara">Kendrapara</option>
                      <option value="Kendujhar(Keonjhar)"> Kendujhar (Keonjhar) </option>
                      <option value="Khagaria">Khagaria</option>
                      <option value="Khammam">Khammam</option>
                      <option value="Khandwa(EastNimar)">Khandwa (East Nimar)</option>
                      <option value="Khargone(WestNimar)"> Khargone (West Nimar) </option>
                      <option value="Kheda">Kheda</option>
                      <option value="Khordha">Khordha</option>
                      <option value="Khowai">Khowai</option>
                      <option value="Khunti">Khunti</option>
                      <option value="Kinnaur">Kinnaur</option>
                      <option value="Kishanganj">Kishanganj</option>
                      <option value="Kishtwar">Kishtwar</option>
                      <option value="Kodagu">Kodagu</option>
                      <option value="Koderma">Koderma</option>
                      <option value="Kohima">Kohima</option>
                      <option value="Kokrajhar">Kokrajhar</option>
                      <option value="Kolar">Kolar</option>
                      <option value="Kolasib">Kolasib</option>
                      <option value="Kolhapur">Kolhapur</option>
                      <option value="Kolkata">Kolkata</option>
                      <option value="Kollam">Kollam</option>
                      <option value="Koppal">Koppal</option>
                      <option value="Koraput">Koraput</option>
                      <option value="Korba">Korba</option>
                      <option value="Koriya">Koriya</option>
                      <option value="Kota">Kota</option>
                      <option value="Kottayam">Kottayam</option>
                      <option value="Kozhikode">Kozhikode</option>
                      <option value="Krishna">Krishna</option>
                      <option value="Kulgam">Kulgam</option>
                      <option value="Kullu">Kullu</option>
                      <option value="Kupwara">Kupwara</option>
                      <option value="Kurnool">Kurnool</option>
                      <option value="Kurukshetra">Kurukshetra</option>
                      <option value="KurungKumey">Kurung Kumey</option>
                      <option value="Kushinagar">Kushinagar</option>
                      <option value="Kutch">Kutch</option>
                      <option value="LahaulandSpiti">Lahaul and Spiti</option>
                      <option value="Lakhimpur">Lakhimpur</option>
                      <option value="LakhimpurKheri">Lakhimpur Kheri</option>
                      <option value="Lakhisarai">Lakhisarai</option>
                      <option value="Lalitpur">Lalitpur</option>
                      <option value="Latehar">Latehar</option>
                      <option value="Latur">Latur</option>
                      <option value="Lawngtlai">Lawngtlai</option>
                      <option value="Leh">Leh</option>
                      <option value="Lohardaga">Lohardaga</option>
                      <option value="Lohit">Lohit</option>
                      <option value="LowerDibangValley">Lower Dibang Valley</option>
                      <option value="LowerSubansiri">Lower Subansiri</option>
                      <option value="Lucknow">Lucknow</option>
                      <option value="Ludhiana">Ludhiana</option>
                      <option value="Lunglei">Lunglei</option>
                      <option value="Madhepura">Madhepura</option>
                      <option value="Madhubani">Madhubani</option>
                      <option value="Madurai">Madurai</option>
                      <option value="MahamayaNagar">Mahamaya Nagar</option>
                      <option value="Maharajganj">Maharajganj</option>
                      <option value="Mahasamund">Mahasamund</option>
                      <option value="Mahbubnagar">Mahbubnagar</option>
                      <option value="Mahe">Mahe</option>
                      <option value="Mahendragarh">Mahendragarh</option>
                      <option value="Mahoba">Mahoba</option>
                      <option value="Mainpuri">Mainpuri</option>
                      <option value="Malappuram">Malappuram</option>
                      <option value="Maldah">Maldah</option>
                      <option value="Malkangiri">Malkangiri</option>
                      <option value="Mamit">Mamit</option>
                      <option value="Mandi">Mandi</option>
                      <option value="Mandla">Mandla</option>
                      <option value="Mandsaur">Mandsaur</option>
                      <option value="Mandya">Mandya</option>
                      <option value="Mansa">Mansa</option>
                      <option value="Marigaon">Marigaon</option>
                      <option value="Mathura">Mathura</option>
                      <option value="Mau">Mau</option>
                      <option value="Mayurbhanj">Mayurbhanj</option>
                      <option value="Medak">Medak</option>
                      <option value="Meerut">Meerut</option>
                      <option value="Mehsana">Mehsana</option>
                      <option value="Mewat">Mewat</option>
                      <option value="Mirzapur">Mirzapur</option>
                      <option value="Moga">Moga</option>
                      <option value="Mokokchung">Mokokchung</option>
                      <option value="Mon">Mon</option>
                      <option value="Moradabad">Moradabad</option>
                      <option value="Morena">Morena</option>
                      <option value="MumbaiCity">Mumbai City</option>
                      <option value="Mumbaisuburban">Mumbai suburban</option>
                      <option value="Munger">Munger</option>
                      <option value="Murshidabad">Murshidabad</option>
                      <option value="Muzaffarnagar">Muzaffarnagar</option>
                      <option value="Muzaffarpur">Muzaffarpur</option>
                      <option value="Mysore">Mysore</option>
                      <option value="Nabarangpur">Nabarangpur</option>
                      <option value="Nadia">Nadia</option>
                      <option value="Nagaon">Nagaon</option>
                      <option value="Nagapattinam">Nagapattinam</option>
                      <option value="Nagaur">Nagaur</option>
                      <option value="Nagpur">Nagpur</option>
                      <option value="Nainital">Nainital</option>
                      <option value="Nalanda">Nalanda</option>
                      <option value="Nalbari">Nalbari</option>
                      <option value="Nalgonda">Nalgonda</option>
                      <option value="Namakkal">Namakkal</option>
                      <option value="Nanded">Nanded</option>
                      <option value="Nandurbar">Nandurbar</option>
                      <option value="Narayanpur">Narayanpur</option>
                      <option value="Narmada">Narmada</option>
                      <option value="Narsinghpur">Narsinghpur</option>
                      <option value="Nashik">Nashik</option>
                      <option value="Navsari">Navsari</option>
                      <option value="Nawada">Nawada</option>
                      <option value="Nawanshahr">Nawanshahr</option>
                      <option value="Nayagarh">Nayagarh</option>
                      <option value="Neemuch">Neemuch</option>
                      <option value="Nellore">Nellore</option>
                      <option value="NewDelhi">New Delhi</option>
                      <option value="Nilgiris">Nilgiris</option>
                      <option value="Nizamabad">Nizamabad</option>
                      <option value="North24Parganas">North 24 Parganas</option>
                      <option value="NorthDelhi">North Delhi</option>
                      <option value="NorthEastDelhi">North East Delhi</option>
                      <option value="NorthGoa">North Goa</option>
                      <option value="NorthSikkim">North Sikkim</option>
                      <option value="NorthTripura">North Tripura</option>
                      <option value="NorthWestDelhi">North West Delhi</option>
                      <option value="Nuapada">Nuapada</option>
                      <option value="Ongole">Ongole</option>
                      <option value="Osmanabad">Osmanabad</option>
                      <option value="Pakur">Pakur</option>
                      <option value="Palakkad">Palakkad</option>
                      <option value="Palamu">Palamu</option>
                      <option value="Pali">Pali</option>
                      <option value="Palwal">Palwal</option>
                      <option value="Panchkula">Panchkula</option>
                      <option value="Panchmahal">Panchmahal</option>
                      <option value="PanchsheelNagardistrict(Hapur)"> Panchsheel Nagar district (Hapur) </option>
                      <option value="Panipat">Panipat</option>
                      <option value="Panna">Panna</option>
                      <option value="PapumPare">Papum Pare</option>
                      <option value="Parbhani">Parbhani</option>
                      <option value="PaschimMedinipur">Paschim Medinipur</option>
                      <option value="Patan">Patan</option>
                      <option value="Pathanamthitta">Pathanamthitta</option>
                      <option value="Pathankot">Pathankot</option>
                      <option value="Patiala">Patiala</option>
                      <option value="Patna">Patna</option>
                      <option value="PauriGarhwal">Pauri Garhwal</option>
                      <option value="Perambalur">Perambalur</option>
                      <option value="Phek">Phek</option>
                      <option value="Pilibhit">Pilibhit</option>
                      <option value="Pithoragarh">Pithoragarh</option>
                      <option value="Pondicherry">Pondicherry</option>
                      <option value="Poonch">Poonch</option>
                      <option value="Porbandar">Porbandar</option>
                      <option value="Pratapgarh">Pratapgarh</option>
                      <option value="Pratapgarh">Pratapgarh</option>
                      <option value="Pudukkottai">Pudukkottai</option>
                      <option value="Pulwama">Pulwama</option>
                      <option value="Pune">Pune</option>
                      <option value="PurbaMedinipur">Purba Medinipur</option>
                      <option value="Puri">Puri</option>
                      <option value="Purnia">Purnia</option>
                      <option value="Purulia">Purulia</option>
                      <option value="Raebareli">Raebareli</option>
                      <option value="Raichur">Raichur</option>
                      <option value="Raigad">Raigad</option>
                      <option value="Raigarh">Raigarh</option>
                      <option value="Raipur">Raipur</option>
                      <option value="Raisen">Raisen</option>
                      <option value="Rajauri">Rajauri</option>
                      <option value="Rajgarh">Rajgarh</option>
                      <option value="Rajkot">Rajkot</option>
                      <option value="Rajnandgaon">Rajnandgaon</option>
                      <option value="Rajsamand">Rajsamand</option>
                      <option value="RamabaiNagar(KanpurDehat)"> Ramabai Nagar (Kanpur Dehat) </option>
                      <option value="Ramanagara">Ramanagara</option>
                      <option value="Ramanathapuram">Ramanathapuram</option>
                      <option value="Ramban">Ramban</option>
                      <option value="Ramgarh">Ramgarh</option>
                      <option value="Rampur">Rampur</option>
                      <option value="Ranchi">Ranchi</option>
                      <option value="Ratlam">Ratlam</option>
                      <option value="Ratnagiri">Ratnagiri</option>
                      <option value="Rayagada">Rayagada</option>
                      <option value="Reasi">Reasi</option>
                      <option value="Rewa">Rewa</option>
                      <option value="Rewari">Rewari</option>
                      <option value="RiBhoi">Ri Bhoi</option>
                      <option value="Rohtak">Rohtak</option>
                      <option value="Rohtas">Rohtas</option>
                      <option value="Rudraprayag">Rudraprayag</option>
                      <option value="Rupnagar">Rupnagar</option>
                      <option value="Sabarkantha">Sabarkantha</option>
                      <option value="Sagar">Sagar</option>
                      <option value="Saharanpur">Saharanpur</option>
                      <option value="Saharsa">Saharsa</option>
                      <option value="Sahibganj">Sahibganj</option>
                      <option value="Saiha">Saiha</option>
                      <option value="Salem">Salem</option>
                      <option value="Samastipur">Samastipur</option>
                      <option value="Samba">Samba</option>
                      <option value="Sambalpur">Sambalpur</option>
                      <option value="Sangli">Sangli</option>
                      <option value="Sangrur">Sangrur</option>
                      <option value="SantKabirNagar">Sant Kabir Nagar</option>
                      <option value="SantRavidasNagar">Sant Ravidas Nagar</option>
                      <option value="Saran">Saran</option>
                      <option value="Satara">Satara</option>
                      <option value="Satna">Satna</option>
                      <option value="SawaiMadhopur">Sawai Madhopur</option>
                      <option value="Sehore">Sehore</option>
                      <option value="Senapati">Senapati</option>
                      <option value="Seoni">Seoni</option>
                      <option value="SeraikelaKharsawan">Seraikela Kharsawan</option>
                      <option value="Serchhip">Serchhip</option>
                      <option value="Shahdol">Shahdol</option>
                      <option value="Shahjahanpur">Shahjahanpur</option>
                      <option value="Shajapur">Shajapur</option>
                      <option value="Shamli">Shamli</option>
                      <option value="Sheikhpura">Sheikhpura</option>
                      <option value="Sheohar">Sheohar</option>
                      <option value="Sheopur">Sheopur</option>
                      <option value="Shimla">Shimla</option>
                      <option value="Shimoga">Shimoga</option>
                      <option value="Shivpuri">Shivpuri</option>
                      <option value="Shopian">Shopian</option>
                      <option value="Shravasti">Shravasti</option>
                      <option value="Sibsagar">Sibsagar</option>
                      <option value="Siddharthnagar">Siddharthnagar</option>
                      <option value="Sidhi">Sidhi</option>
                      <option value="Sikar">Sikar</option>
                      <option value="Simdega">Simdega</option>
                      <option value="Sindhudurg">Sindhudurg</option>
                      <option value="Singrauli">Singrauli</option>
                      <option value="Sirmaur">Sirmaur</option>
                      <option value="Sirohi">Sirohi</option>
                      <option value="Sirsa">Sirsa</option>
                      <option value="Sitamarhi">Sitamarhi</option>
                      <option value="Sitapur">Sitapur</option>
                      <option value="Sivaganga">Sivaganga</option>
                      <option value="Siwan">Siwan</option>
                      <option value="Solan">Solan</option>
                      <option value="Solapur">Solapur</option>
                      <option value="Sonbhadra">Sonbhadra</option>
                      <option value="Sonipat">Sonipat</option>
                      <option value="Sonitpur">Sonitpur</option>
                      <option value="South24Parganas">South 24 Parganas</option>
                      <option value="SouthDelhi">South Delhi</option>
                      <option value="SouthGaroHills">South Garo Hills</option>
                      <option value="SouthGoa">South Goa</option>
                      <option value="SouthSikkim">South Sikkim</option>
                      <option value="SouthTripura">South Tripura</option>
                      <option value="SouthWestDelhi">South West Delhi</option>
                      <option value="SriMuktsarSahib">Sri Muktsar Sahib</option>
                      <option value="Srikakulam">Srikakulam</option>
                      <option value="Srinagar">Srinagar</option>
                      <option value="Subarnapur(Sonepur)"> Subarnapur (Sonepur) </option>
                      <option value="Sultanpur">Sultanpur</option>
                      <option value="Sundergarh">Sundergarh</option>
                      <option value="Supaul">Supaul</option>
                      <option value="Surat">Surat</option>
                      <option value="Surendranagar">Surendranagar</option>
                      <option value="Surguja">Surguja</option>
                      <option value="Tamenglong">Tamenglong</option>
                      <option value="TarnTaran">Tarn Taran</option>
                      <option value="Tawang">Tawang</option>
                      <option value="TehriGarhwal">Tehri Garhwal</option>
                      <option value="Thane">Thane</option>
                      <option value="Thanjavur">Thanjavur</option>
                      <option value="TheDangs">The Dangs</option>
                      <option value="Theni">Theni</option>
                      <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                      <option value="Thoothukudi">Thoothukudi</option>
                      <option value="Thoubal">Thoubal</option>
                      <option value="Thrissur">Thrissur</option>
                      <option value="Tikamgarh">Tikamgarh</option>
                      <option value="Tinsukia">Tinsukia</option>
                      <option value="Tirap">Tirap</option>
                      <option value="Tiruchirappalli">Tiruchirappalli</option>
                      <option value="Tirunelveli">Tirunelveli</option>
                      <option value="Tirupur">Tirupur</option>
                      <option value="Tiruvallur">Tiruvallur</option>
                      <option value="Tiruvannamalai">Tiruvannamalai</option>
                      <option value="Tiruvarur">Tiruvarur</option>
                      <option value="Tonk">Tonk</option>
                      <option value="Tuensang">Tuensang</option>
                      <option value="Tumkur">Tumkur</option>
                      <option value="Udaipur">Udaipur</option>
                      <option value="Udalguri">Udalguri</option>
                      <option value="UdhamSinghNagar">Udham Singh Nagar</option>
                      <option value="Udhampur">Udhampur</option>
                      <option value="Udupi">Udupi</option>
                      <option value="Ujjain">Ujjain</option>
                      <option value="Ukhrul">Ukhrul</option>
                      <option value="Umaria">Umaria</option>
                      <option value="Una">Una</option>
                      <option value="Unnao">Unnao</option>
                      <option value="UpperSiang">Upper Siang</option>
                      <option value="UpperSubansiri">Upper Subansiri</option>
                      <option value="UttarDinajpur">Uttar Dinajpur</option>
                      <option value="UttaraKannada">Uttara Kannada</option>
                      <option value="Uttarkashi">Uttarkashi</option>
                      <option value="Vadodara">Vadodara</option>
                      <option value="Vaishali">Vaishali</option>
                      <option value="Valsad">Valsad</option>
                      <option value="Varanasi">Varanasi</option>
                      <option value="Vellore">Vellore</option>
                      <option value="Vidisha">Vidisha</option>
                      <option value="Viluppuram">Viluppuram</option>
                      <option value="Virudhunagar">Virudhunagar</option>
                      <option value="Visakhapatnam">Visakhapatnam</option>
                      <option value="Vizianagaram">Vizianagaram</option>
                      <option value="Vyara">Vyara</option>
                      <option value="Warangal">Warangal</option>
                      <option value="Wardha">Wardha</option>
                      <option value="Washim">Washim</option>
                      <option value="Wayanad">Wayanad</option>
                      <option value="WestChamparan">West Champaran</option>
                      <option value="WestDelhi">West Delhi</option>
                      <option value="WestGaroHills">West Garo Hills</option>
                      <option value="WestKameng">West Kameng</option>
                      <option value="WestKhasiHills">West Khasi Hills</option>
                      <option value="WestSiang">West Siang</option>
                      <option value="WestSikkim">West Sikkim</option>
                      <option value="WestSinghbhum">West Singhbhum</option>
                      <option value="WestTripura">West Tripura</option>
                      <option value="Wokha">Wokha</option>
                      <option value="Yadgir">Yadgir</option>
                      <option value="YamunaNagar">Yamuna Nagar</option>
                      <option value="Yanam">Yanam</option>
                      <option value="Yavatmal">Yavatmal</option>
                      <option value="Zunheboto">Zunheboto</option>
        </select>
    </div>

    <label class="control-label col-lg-2" for="address">Address -</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="address" name="address">
    </div>
</div>
    
<br>
               
<br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="experience">Experience in 
                        Relevant Field -</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="number" name="experience_relevant" required id="experience_relevant">
                            
                       
                    </div>
                     

                    <label class="control-label col-sm-2" for="work-experience">Work Experience -</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="number"name="work-experience" required id="work-experience">
                            
                    </div>
                </div>
<br>
<div class="form-group">
    <label class="control-label col-sm-2" for="skills">Keyskills -</label>
    <div class="col-sm-9">
        <select class="form-control skill-box" required multiple name="skills[]" id="skills">

            <option value="Lucid Chart">Lucid Chart</option>
            <option value="automation-testing">Automation Testing</option>
            <option value="agile">Agile</option>
            <option value="agile-testing">Agile Testing</option>
            <option value="agile-development">Agile Development</option>
            <option value="ab-initio">Ab Initio</option>
            <option value="aws">AWS</option>
            <option value="ajax">Ajax</option>
            <option value="accounting">Accounting</option>
            <option value="administration">Administration</option>
            <option value="aeronautical-engineering">Aeronautical Engineering</option>
            <option value="blue-prism">Blue Prism</option>
            <option value="c">C</option>
            <option value="c++">C++</option>
            <option value="cucumber">Cucumber</option>
            <option value="dreamweaver">Dreamweaver</option>
            <option value="datastage">Datastage</option>
            <option value="data-loader">Data Loader</option>
            <option value="devops">DevOps</option>
            <option value="flex">Flex</option>
            <option value="ghost">Ghost</option>
            <option value="informatica">Informatica</option>
            <option value="jenkins">Jenkins</option>
            <option value="jquery">jQuery</option>
            <option value="java">Java</option>
            <option value="jmeter">jMeter</option>
            <option value="jira">JIRA</option>
            <option value="load-runner">Load Runner</option>
            <option value="mysql">MySQL</option>
            <option value="oracle">Oracle</option>
            <option value="oracle-dba">Oracle DBA</option>
            <option value="pl/sql">PL/SQL</option>
            <option value="php">Php</option>
            <option value="python">Python</option>
            <option value="postman">Postman</option>
            <option value="perl">Perl</option>
            <option value="querysurge">QuerySurge</option>
            <option value="sqlserver">SQLServer</option>
            <option value="qtp">QTP</option>
            <option value="qlikview">Qlikview</option>
            <option value="quality-center">Quality Center</option>
            <option value="selenium">Selenium</option>
            <option value="silk-test">Silk Test</option>
            <option value="sap-abap">SAP ABAP</option>
            <option value="sap-basis">SAP Basis</option>
            <option value="sap-fico">SAP FICO</option>
            <option value="sap">SAP</option>
            <option value="sas">SAS</option>
            <option value="soapui">SoapUI</option>
            <option value="shell scripting">Shell Scripting</option>
            <option value="testingwhiz">TestingWhiz</option>
            <option value="tosca-testsuite">Tosca Testsuite</option>
            <option value="talend">Talend</option>
            <option value="teradata">Teradata</option>
            <option value="ui-path">UI Path</option>
            <option value="unix">Unix</option>
        </select>
    </div>
</div>
<br>
<div class="form-group">
    <label class="control-label col-sm-2" for="developer-type">Type of Developer -</label>
    <div class="col-sm-4">
    <select class="form-control" name="developer-type" required id="developer-type">
            <option>Select</option>
            <option value="web">Web Developer</option>
            <option value="flutter">Flutter Developer</option>
            <option value="java">Java Developer</option>
            <option value="mern">Mern Developer</option>
            <option value="mean">Mean Developer</option>
            <option value="lamp">Lamp Developer</option>
            <option value="php">PHP Developer</option>
            <option value="android">Android Developer</option>
            <option value="php">PHP Developer</option>
            <option value="asp">ASP Developer</option>
            
            
    </select>
       
    </div>
    <label class="control-label col-lg-2" for="notice_period">Expected Ctc:</label>
                    <div class="col-lg-4">
                        <input class="form-control" id="expected_ctc" name="expected_ctc">
                                               </div>

    <!-- <label class="control-label col-sm-2" for="skillset">Type of Skillset-</label>
    <div class="col-sm-4">
        <select class="form-control" name="skillset" required id="skillset">
            <option>Select</option>
            <option value="aspskills">ASP Developer</option>
            
            <option value="phpskills">ASP Developer</option>
    
            <option value="androidskills">ASP Developer</option>
            
            
            
            </select>
    </div> -->
</div>
<br>
<div class="form-group">
    <label class="control-label col-sm-2" for="graduation">Graduation type -</label>
    <div class="col-sm-4">
    <select class="form-control" name="graduation" required id="graduation">
            <option>Select</option>
            <option value="ug">Undergraduate</option>
            <option value="pg">Postgraduate</option>
            
            
            </select>
       
    </div>
     

    <label class="control-label col-sm-2" for="specification">Graduation Course -</label>
    <div class="col-sm-4">
        <select class="form-control" name="specification" required id="specification">
            <option>Select</option>
            
            
            
            </select>
    </div>
</div>
<br>
<div class="form-group">
            <label class="control-label col-sm-2" for="current_role" >Current Role -</label>
            <div class="col-sm-4">
                <input class="form-control"  id="current_role" name="current_role">
                    
                
            </div>

            <label class="control-label col-lg-2" for="current_company">Current Company
                 -</label>
            <div class="col-lg-4">
            <input class="form-control" id="current_company" name="current_company">
                             </div>
        </div>
<br>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="notice_period">Notice Period -</label>
                    <div class="col-sm-4">
                        <select class="form-control"  id="notice_period" name="notice_period">
                            <option>Days/Months</option>
                            <option value="7 Days">7 Days</option>
                            <option value="8 Days">8 Days</option>
                            <option value="10 Days">10 Days</option>
                            <option value="15 Days">15 Days </option>
                            <option value="20 Days">20 Days </option>
                            <option value="30 Days">30 Days </option>
                            <option value="1 Month ">1 Month </option>
                            <option value="1.5 Months">1.5 Months </option>
                            <option value="2 Month ">2 Month </option>
                            <option value="2.5 Months">2.5 Months </option>
                            <option value="3 Month ">3 Month </option>
                            
                        </select>                    </div>

                    <label class="control-label col-lg-2" for="notice_period">Current Ctc:</label>
                    <div class="col-lg-4">
                        <input class="form-control" id="current_ctc" name="current_ctc">
                                               </div>
                </div>
<br>


<div class="form-group">
    <label class="control-label col-sm-2" for="location"> Work Location -</label>
    <div class="col-sm-4">
    <select class="form-control" required name="work_location" id="location">
    <option >Select location</option>
        <option value="Adilabad">Adilabad</option>
        <option value="Agra">Agra</option>
        <option value="Ahmedabad">Ahmedabad</option>
        <option value="Ahmednagar">Ahmednagar</option>
        <option value="Aizawl">Aizawl</option>
        <option value="Ajitgarh(Mohali)">Ajitgarh (Mohali)</option>
        <option value="Ajmer">Ajmer</option>
        <option value="Akola">Akola</option>
        <option value="Alappuzha">Alappuzha</option>
        <option value="Aligarh">Aligarh</option>
        <option value="Alirajpur">Alirajpur</option>
        <option value="Allahabad">Allahabad</option>
        <option value="Almora">Almora</option>
        <option value="Alwar">Alwar</option>
        <option value="Ambala">Ambala</option>
        <option value="AmbedkarNagar">Ambedkar Nagar</option>
        <option value="Amravati">Amravati</option>
        <option value="Amrelidistrict">Amreli district</option>
        <option value="Amritsar">Amritsar</option>
        <option value="Anand">Anand</option>
        <option value="Anantapur">Anantapur</option>
        <option value="Anantnag">Anantnag</option>
        <option value="Angul">Angul</option>
        <option value="Anjaw">Anjaw</option>
        <option value="Anuppur">Anuppur</option>
        <option value="Araria">Araria</option>
        <option value="Ariyalur">Ariyalur</option>
        <option value="Arwal">Arwal</option>
        <option value="AshokNagar">Ashok Nagar</option>
        <option value="Auraiya">Auraiya</option>
        <option value="Aurangabad">Aurangabad</option>
        <option value="Aurangabad">Aurangabad</option>
        <option value="Azamgarh">Azamgarh</option>
        <option value="Badgam">Badgam</option>
        <option value="Bagalkot">Bagalkot</option>
        <option value="Bageshwar">Bageshwar</option>
        <option value="Bagpat">Bagpat</option>
        <option value="Bahraich">Bahraich</option>
        <option value="Baksa">Baksa</option>
        <option value="Balaghat">Balaghat</option>
        <option value="Balangir">Balangir</option>
        <option value="Balasore">Balasore</option>
        <option value="Ballia">Ballia</option>
        <option value="Balrampur">Balrampur</option>
        <option value="Banaskantha">Banaskantha</option>
        <option value="Banda">Banda</option>
        <option value="Bandipora">Bandipora</option>
        <option value="BangaloreRural">Bangalore Rural</option>
        <option value="BangaloreUrban">Bangalore Urban</option>
        <option value="Banka">Banka</option>
        <option value="Bankura">Bankura</option>
        <option value="Banswara">Banswara</option>
        <option value="Barabanki">Barabanki</option>
        <option value="Baramulla">Baramulla</option>
        <option value="Baran">Baran</option>
        <option value="Bardhaman">Bardhaman</option>
        <option value="Bareilly">Bareilly</option>
        <option value="Bargarh(Baragarh)">Bargarh (Baragarh)</option>
        <option value="Barmer">Barmer</option>
        <option value="Barnala">Barnala</option>
        <option value="Barpeta">Barpeta</option>
        <option value="Barwani">Barwani</option>
        <option value="Bastar">Bastar</option>
        <option value="Basti">Basti</option>
        <option value="Bathinda">Bathinda</option>
        <option value="Beed">Beed</option>
        <option value="Begusarai">Begusarai</option>
        <option value="Belgaum">Belgaum</option>
        <option value="Bellary">Bellary</option>
        <option value="Betul">Betul</option>
        <option value="Bhadrak">Bhadrak</option>
        <option value="Bhagalpur">Bhagalpur</option>
        <option value="Bhandara">Bhandara</option>
        <option value="Bharatpur">Bharatpur</option>
        <option value="Bharuch">Bharuch</option>
        <option value="Bhavnagar">Bhavnagar</option>
        <option value="Bhilwara">Bhilwara</option>
        <option value="Bhind">Bhind</option>
        <option value="Bhiwani">Bhiwani</option>
        <option value="Bhojpur">Bhojpur</option>
        <option value="Bhopal">Bhopal</option>
        <option value="Bidar">Bidar</option>
        <option value="Bijapur">Bijapur</option>
        <option value="Bijapur">Bijapur</option>
        <option value="Bijnor">Bijnor</option>
        <option value="Bikaner">Bikaner</option>
        <option value="Bilaspur">Bilaspur</option>
        <option value="Bilaspur">Bilaspur</option>
        <option value="Birbhum">Birbhum</option>
        <option value="Bishnupur">Bishnupur</option>
        <option value="Bokaro">Bokaro</option>
        <option value="Bongaigaon">Bongaigaon</option>
        <option value="Boudh(Bauda)">Boudh (Bauda)</option>
        <option value="Budaun">Budaun</option>
        <option value="Bulandshahr">Bulandshahr</option>
        <option value="Buldhana">Buldhana</option>
        <option value="Bundi">Bundi</option>
        <option value="Burhanpur">Burhanpur</option>
        <option value="Buxar">Buxar</option>
        <option value="Cachar">Cachar</option>
        <option value="CentralDelhi">Central Delhi</option>
        <option value="Chamarajnagar">Chamarajnagar</option>
        <option value="Chamba">Chamba</option>
        <option value="Chamoli">Chamoli</option>
        <option value="Champawat">Champawat</option>
        <option value="Champhai">Champhai</option>
        <option value="Chandauli">Chandauli</option>
        <option value="Chandel">Chandel</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Chandrapur">Chandrapur</option>
        <option value="Changlang">Changlang</option>
        <option value="Chatra">Chatra</option>
        <option value="Chennai">Chennai</option>
        <option value="Chhatarpur">Chhatarpur</option>
        <option value="ChhatrapatiShahujiMaharajNagar"> Chhatrapati Shahuji Maharaj Nagar </option>
        <option value="Chhindwara">Chhindwara</option>
        <option value="Chikkaballapur">Chikkaballapur</option>
        <option value="Chikkamagaluru">Chikkamagaluru</option>
        <option value="Chirang">Chirang</option>
        <option value="Chitradurga">Chitradurga</option>
        <option value="Chitrakoot">Chitrakoot</option>
        <option value="Chittoor">Chittoor</option>
        <option value="Chittorgarh">Chittorgarh</option>
        <option value="Churachandpur">Churachandpur</option>
        <option value="Churu">Churu</option>
        <option value="Coimbatore">Coimbatore</option>
        <option value="CoochBehar">Cooch Behar</option>
        <option value="Cuddalore">Cuddalore</option>
        <option value="Cuttack">Cuttack</option>
        <option value="DadraandNagarHaveli"> Dadra and Nagar Haveli </option>
        <option value="Dahod">Dahod</option>
        <option value="DakshinDinajpur">Dakshin Dinajpur</option>
        <option value="DakshinaKannada">Dakshina Kannada</option>
        <option value="Daman">Daman</option>
        <option value="Damoh">Damoh</option>
        <option value="Dantewada">Dantewada</option>
        <option value="Darbhanga">Darbhanga</option>
        <option value="Darjeeling">Darjeeling</option>
        <option value="Darrang">Darrang</option>
        <option value="Datia">Datia</option>
        <option value="Dausa">Dausa</option>
        <option value="Davanagere">Davanagere</option>
        <option value="Debagarh(Deogarh)">Debagarh (Deogarh)</option>
        <option value="Dehradun">Dehradun</option>
        <option value="Deoghar">Deoghar</option>
        <option value="Deoria">Deoria</option>
        <option value="Dewas">Dewas</option>
        <option value="Dhalai">Dhalai</option>
        <option value="Dhamtari">Dhamtari</option>
        <option value="Dhanbad">Dhanbad</option>
        <option value="Dhar">Dhar</option>
        <option value="Dharmapuri">Dharmapuri</option>
        <option value="Dharwad">Dharwad</option>
        <option value="Dhemaji">Dhemaji</option>
        <option value="Dhenkanal">Dhenkanal</option>
        <option value="Dholpur">Dholpur</option>
        <option value="Dhubri">Dhubri</option>
        <option value="Dhule">Dhule</option>
        <option value="DibangValley">Dibang Valley</option>
        <option value="Dibrugarh">Dibrugarh</option>
        <option value="DimaHasao">Dima Hasao</option>
        <option value="Dimapur">Dimapur</option>
        <option value="Dindigul">Dindigul</option>
        <option value="Dindori">Dindori</option>
        <option value="Diu">Diu</option>
        <option value="Doda">Doda</option>
        <option value="Dumka">Dumka</option>
        <option value="Dungapur">Dungapur</option>
        <option value="Durg">Durg</option>
        <option value="EastChamparan">East Champaran</option>
        <option value="EastDelhi">East Delhi</option>
        <option value="EastGaroHills">East Garo Hills</option>
        <option value="EastKhasiHills">East Khasi Hills</option>
        <option value="EastSiang">East Siang</option>
        <option value="EastSikkim">East Sikkim</option>
        <option value="EastSinghbhum">East Singhbhum</option>
        <option value="Eluru">Eluru</option>
        <option value="Ernakulam">Ernakulam</option>
        <option value="Erode">Erode</option>
        <option value="Etah">Etah</option>
        <option value="Etawah">Etawah</option>
        <option value="Faizabad">Faizabad</option>
        <option value="Faridabad">Faridabad</option>
        <option value="Faridkot">Faridkot</option>
        <option value="Farrukhabad">Farrukhabad</option>
        <option value="Fatehabad">Fatehabad</option>
        <option value="FatehgarhSahib">Fatehgarh Sahib</option>
        <option value="Fatehpur">Fatehpur</option>
        <option value="Fazilka">Fazilka</option>
        <option value="Firozabad">Firozabad</option>
        <option value="Firozpur">Firozpur</option>
        <option value="Gadag">Gadag</option>
        <option value="Gadchiroli">Gadchiroli</option>
        <option value="Gajapati">Gajapati</option>
        <option value="Ganderbal">Ganderbal</option>
        <option value="Gandhinagar">Gandhinagar</option>
        <option value="Ganganagar">Ganganagar</option>
        <option value="Ganjam">Ganjam</option>
        <option value="Garhwa">Garhwa</option>
        <option value="GautamBuddhNagar">Gautam Buddh Nagar</option>
        <option value="Gaya">Gaya</option>
        <option value="Ghaziabad">Ghaziabad</option>
        <option value="Ghazipur">Ghazipur</option>
        <option value="Giridih">Giridih</option>
        <option value="Goalpara">Goalpara</option>
        <option value="Godda">Godda</option>
        <option value="Golaghat">Golaghat</option>
        <option value="Gonda">Gonda</option>
        <option value="Gondia">Gondia</option>
        <option value="Gopalganj">Gopalganj</option>
        <option value="Gorakhpur">Gorakhpur</option>
        <option value="Gulbarga">Gulbarga</option>
        <option value="Gumla">Gumla</option>
        <option value="Guna">Guna</option>
        <option value="Guntur">Guntur</option>
        <option value="Gurdaspur">Gurdaspur</option>
        <option value="Gurgaon">Gurgaon</option>
        <option value="Gwalior">Gwalior</option>
        <option value="Hailakandi">Hailakandi</option>
        <option value="Hamirpur">Hamirpur</option>
        <option value="Hamirpur">Hamirpur</option>
        <option value="Hanumangarh">Hanumangarh</option>
        <option value="Harda">Harda</option>
        <option value="Hardoi">Hardoi</option>
        <option value="Haridwar">Haridwar</option>
        <option value="Hassan">Hassan</option>
        <option value="Haveridistrict">Haveri district</option>
        <option value="Hazaribag">Hazaribag</option>
        <option value="Hingoli">Hingoli</option>
        <option value="Hissar">Hissar</option>
        <option value="Hooghly">Hooghly</option>
        <option value="Hoshangabad">Hoshangabad</option>
        <option value="Hoshiarpur">Hoshiarpur</option>
        <option value="Howrah">Howrah</option>
        <option value="Hyderabad">Hyderabad</option>
        <option value="Hyderabad">Hyderabad</option>
        <option value="Idukki">Idukki</option>
        <option value="ImphalEast">Imphal East</option>
        <option value="ImphalWest">Imphal West</option>
        <option value="Indore">Indore</option>
        <option value="Jabalpur">Jabalpur</option>
        <option value="Jagatsinghpur">Jagatsinghpur</option>
        <option value="JaintiaHills">Jaintia Hills</option>
        <option value="Jaipur">Jaipur</option>
        <option value="Jaisalmer">Jaisalmer</option>
        <option value="Jajpur">Jajpur</option>
        <option value="Jalandhar">Jalandhar</option>
        <option value="Jalaun">Jalaun</option>
        <option value="Jalgaon">Jalgaon</option>
        <option value="Jalna">Jalna</option>
        <option value="Jalore">Jalore</option>
        <option value="Jalpaiguri">Jalpaiguri</option>
        <option value="Jammu">Jammu</option>
        <option value="Jamnagar">Jamnagar</option>
        <option value="Jamtara">Jamtara</option>
        <option value="Jamui">Jamui</option>
        <option value="Janjgir-Champa">Janjgir-Champa</option>
        <option value="Jashpur">Jashpur</option>
        <option value="Jaunpurdistrict">Jaunpur district</option>
        <option value="Jehanabad">Jehanabad</option>
        <option value="Jhabua">Jhabua</option>
        <option value="Jhajjar">Jhajjar</option>
        <option value="Jhalawar">Jhalawar</option>
        <option value="Jhansi">Jhansi</option>
        <option value="Jharsuguda">Jharsuguda</option>
        <option value="Jhunjhunu">Jhunjhunu</option>
        <option value="Jind">Jind</option>
        <option value="Jodhpur">Jodhpur</option>
        <option value="Jorhat">Jorhat</option>
        <option value="Junagadh">Junagadh</option>
        <option value="JyotibaPhuleNagar">Jyotiba Phule Nagar</option>
        <option value="Kabirdham(formerlyKawardha)"> Kabirdham (formerly Kawardha) </option>
        <option value="Kadapa">Kadapa</option>
        <option value="Kaimur">Kaimur</option>
        <option value="Kaithal">Kaithal</option>
        <option value="Kakinada">Kakinada</option>
        <option value="Kalahandi">Kalahandi</option>
        <option value="Kamrup">Kamrup</option>
        <option value="KamrupMetropolitan">Kamrup Metropolitan</option>
        <option value="Kanchipuram">Kanchipuram</option>
        <option value="Kandhamal">Kandhamal</option>
        <option value="Kangra">Kangra</option>
        <option value="Kanker">Kanker</option>
        <option value="Kannauj">Kannauj</option>
        <option value="Kannur">Kannur</option>
        <option value="Kanpur">Kanpur</option>
        <option value="KanshiRamNagar">Kanshi Ram Nagar</option>
        <option value="Kanyakumari">Kanyakumari</option>
        <option value="Kapurthala">Kapurthala</option>
        <option value="Karaikal">Karaikal</option>
        <option value="Karauli">Karauli</option>
        <option value="KarbiAnglong">Karbi Anglong</option>
        <option value="Kargil">Kargil</option>
        <option value="Karimganj">Karimganj</option>
        <option value="Karimnagar">Karimnagar</option>
        <option value="Karnal">Karnal</option>
        <option value="Karur">Karur</option>
        <option value="Kasaragod">Kasaragod</option>
        <option value="Kathua">Kathua</option>
        <option value="Katihar">Katihar</option>
        <option value="Katni">Katni</option>
        <option value="Kaushambi">Kaushambi</option>
        <option value="Kendrapara">Kendrapara</option>
        <option value="Kendujhar(Keonjhar)"> Kendujhar (Keonjhar) </option>
        <option value="Khagaria">Khagaria</option>
        <option value="Khammam">Khammam</option>
        <option value="Khandwa(EastNimar)">Khandwa (East Nimar)</option>
        <option value="Khargone(WestNimar)"> Khargone (West Nimar) </option>
        <option value="Kheda">Kheda</option>
        <option value="Khordha">Khordha</option>
        <option value="Khowai">Khowai</option>
        <option value="Khunti">Khunti</option>
        <option value="Kinnaur">Kinnaur</option>
        <option value="Kishanganj">Kishanganj</option>
        <option value="Kishtwar">Kishtwar</option>
        <option value="Kodagu">Kodagu</option>
        <option value="Koderma">Koderma</option>
        <option value="Kohima">Kohima</option>
        <option value="Kokrajhar">Kokrajhar</option>
        <option value="Kolar">Kolar</option>
        <option value="Kolasib">Kolasib</option>
        <option value="Kolhapur">Kolhapur</option>
        <option value="Kolkata">Kolkata</option>
        <option value="Kollam">Kollam</option>
        <option value="Koppal">Koppal</option>
        <option value="Koraput">Koraput</option>
        <option value="Korba">Korba</option>
        <option value="Koriya">Koriya</option>
        <option value="Kota">Kota</option>
        <option value="Kottayam">Kottayam</option>
        <option value="Kozhikode">Kozhikode</option>
        <option value="Krishna">Krishna</option>
        <option value="Kulgam">Kulgam</option>
        <option value="Kullu">Kullu</option>
        <option value="Kupwara">Kupwara</option>
        <option value="Kurnool">Kurnool</option>
        <option value="Kurukshetra">Kurukshetra</option>
        <option value="KurungKumey">Kurung Kumey</option>
        <option value="Kushinagar">Kushinagar</option>
        <option value="Kutch">Kutch</option>
        <option value="LahaulandSpiti">Lahaul and Spiti</option>
        <option value="Lakhimpur">Lakhimpur</option>
        <option value="LakhimpurKheri">Lakhimpur Kheri</option>
        <option value="Lakhisarai">Lakhisarai</option>
        <option value="Lalitpur">Lalitpur</option>
        <option value="Latehar">Latehar</option>
        <option value="Latur">Latur</option>
        <option value="Lawngtlai">Lawngtlai</option>
        <option value="Leh">Leh</option>
        <option value="Lohardaga">Lohardaga</option>
        <option value="Lohit">Lohit</option>
        <option value="LowerDibangValley">Lower Dibang Valley</option>
        <option value="LowerSubansiri">Lower Subansiri</option>
        <option value="Lucknow">Lucknow</option>
        <option value="Ludhiana">Ludhiana</option>
        <option value="Lunglei">Lunglei</option>
        <option value="Madhepura">Madhepura</option>
        <option value="Madhubani">Madhubani</option>
        <option value="Madurai">Madurai</option>
        <option value="MahamayaNagar">Mahamaya Nagar</option>
        <option value="Maharajganj">Maharajganj</option>
        <option value="Mahasamund">Mahasamund</option>
        <option value="Mahbubnagar">Mahbubnagar</option>
        <option value="Mahe">Mahe</option>
        <option value="Mahendragarh">Mahendragarh</option>
        <option value="Mahoba">Mahoba</option>
        <option value="Mainpuri">Mainpuri</option>
        <option value="Malappuram">Malappuram</option>
        <option value="Maldah">Maldah</option>
        <option value="Malkangiri">Malkangiri</option>
        <option value="Mamit">Mamit</option>
        <option value="Mandi">Mandi</option>
        <option value="Mandla">Mandla</option>
        <option value="Mandsaur">Mandsaur</option>
        <option value="Mandya">Mandya</option>
        <option value="Mansa">Mansa</option>
        <option value="Marigaon">Marigaon</option>
        <option value="Mathura">Mathura</option>
        <option value="Mau">Mau</option>
        <option value="Mayurbhanj">Mayurbhanj</option>
        <option value="Medak">Medak</option>
        <option value="Meerut">Meerut</option>
        <option value="Mehsana">Mehsana</option>
        <option value="Mewat">Mewat</option>
        <option value="Mirzapur">Mirzapur</option>
        <option value="Moga">Moga</option>
        <option value="Mokokchung">Mokokchung</option>
        <option value="Mon">Mon</option>
        <option value="Moradabad">Moradabad</option>
        <option value="Morena">Morena</option>
        <option value="MumbaiCity">Mumbai City</option>
        <option value="Mumbaisuburban">Mumbai suburban</option>
        <option value="Munger">Munger</option>
        <option value="Murshidabad">Murshidabad</option>
        <option value="Muzaffarnagar">Muzaffarnagar</option>
        <option value="Muzaffarpur">Muzaffarpur</option>
        <option value="Mysore">Mysore</option>
        <option value="Nabarangpur">Nabarangpur</option>
        <option value="Nadia">Nadia</option>
        <option value="Nagaon">Nagaon</option>
        <option value="Nagapattinam">Nagapattinam</option>
        <option value="Nagaur">Nagaur</option>
        <option value="Nagpur">Nagpur</option>
        <option value="Nainital">Nainital</option>
        <option value="Nalanda">Nalanda</option>
        <option value="Nalbari">Nalbari</option>
        <option value="Nalgonda">Nalgonda</option>
        <option value="Namakkal">Namakkal</option>
        <option value="Nanded">Nanded</option>
        <option value="Nandurbar">Nandurbar</option>
        <option value="Narayanpur">Narayanpur</option>
        <option value="Narmada">Narmada</option>
        <option value="Narsinghpur">Narsinghpur</option>
        <option value="Nashik">Nashik</option>
        <option value="Navsari">Navsari</option>
        <option value="Nawada">Nawada</option>
        <option value="Nawanshahr">Nawanshahr</option>
        <option value="Nayagarh">Nayagarh</option>
        <option value="Neemuch">Neemuch</option>
        <option value="Nellore">Nellore</option>
        <option value="NewDelhi">New Delhi</option>
        <option value="Nilgiris">Nilgiris</option>
        <option value="Nizamabad">Nizamabad</option>
        <option value="North24Parganas">North 24 Parganas</option>
        <option value="NorthDelhi">North Delhi</option>
        <option value="NorthEastDelhi">North East Delhi</option>
        <option value="NorthGoa">North Goa</option>
        <option value="NorthSikkim">North Sikkim</option>
        <option value="NorthTripura">North Tripura</option>
        <option value="NorthWestDelhi">North West Delhi</option>
        <option value="Nuapada">Nuapada</option>
        <option value="Ongole">Ongole</option>
        <option value="Osmanabad">Osmanabad</option>
        <option value="Pakur">Pakur</option>
        <option value="Palakkad">Palakkad</option>
        <option value="Palamu">Palamu</option>
        <option value="Pali">Pali</option>
        <option value="Palwal">Palwal</option>
        <option value="Panchkula">Panchkula</option>
        <option value="Panchmahal">Panchmahal</option>
        <option value="PanchsheelNagardistrict(Hapur)"> Panchsheel Nagar district (Hapur) </option>
        <option value="Panipat">Panipat</option>
        <option value="Panna">Panna</option>
        <option value="PapumPare">Papum Pare</option>
        <option value="Parbhani">Parbhani</option>
        <option value="PaschimMedinipur">Paschim Medinipur</option>
        <option value="Patan">Patan</option>
        <option value="Pathanamthitta">Pathanamthitta</option>
        <option value="Pathankot">Pathankot</option>
        <option value="Patiala">Patiala</option>
        <option value="Patna">Patna</option>
        <option value="PauriGarhwal">Pauri Garhwal</option>
        <option value="Perambalur">Perambalur</option>
        <option value="Phek">Phek</option>
        <option value="Pilibhit">Pilibhit</option>
        <option value="Pithoragarh">Pithoragarh</option>
        <option value="Pondicherry">Pondicherry</option>
        <option value="Poonch">Poonch</option>
        <option value="Porbandar">Porbandar</option>
        <option value="Pratapgarh">Pratapgarh</option>
        <option value="Pratapgarh">Pratapgarh</option>
        <option value="Pudukkottai">Pudukkottai</option>
        <option value="Pulwama">Pulwama</option>
        <option value="Pune">Pune</option>
        <option value="PurbaMedinipur">Purba Medinipur</option>
        <option value="Puri">Puri</option>
        <option value="Purnia">Purnia</option>
        <option value="Purulia">Purulia</option>
        <option value="Raebareli">Raebareli</option>
        <option value="Raichur">Raichur</option>
        <option value="Raigad">Raigad</option>
        <option value="Raigarh">Raigarh</option>
        <option value="Raipur">Raipur</option>
        <option value="Raisen">Raisen</option>
        <option value="Rajauri">Rajauri</option>
        <option value="Rajgarh">Rajgarh</option>
        <option value="Rajkot">Rajkot</option>
        <option value="Rajnandgaon">Rajnandgaon</option>
        <option value="Rajsamand">Rajsamand</option>
        <option value="RamabaiNagar(KanpurDehat)"> Ramabai Nagar (Kanpur Dehat) </option>
        <option value="Ramanagara">Ramanagara</option>
        <option value="Ramanathapuram">Ramanathapuram</option>
        <option value="Ramban">Ramban</option>
        <option value="Ramgarh">Ramgarh</option>
        <option value="Rampur">Rampur</option>
        <option value="Ranchi">Ranchi</option>
        <option value="Ratlam">Ratlam</option>
        <option value="Ratnagiri">Ratnagiri</option>
        <option value="Rayagada">Rayagada</option>
        <option value="Reasi">Reasi</option>
        <option value="Rewa">Rewa</option>
        <option value="Rewari">Rewari</option>
        <option value="RiBhoi">Ri Bhoi</option>
        <option value="Rohtak">Rohtak</option>
        <option value="Rohtas">Rohtas</option>
        <option value="Rudraprayag">Rudraprayag</option>
        <option value="Rupnagar">Rupnagar</option>
        <option value="Sabarkantha">Sabarkantha</option>
        <option value="Sagar">Sagar</option>
        <option value="Saharanpur">Saharanpur</option>
        <option value="Saharsa">Saharsa</option>
        <option value="Sahibganj">Sahibganj</option>
        <option value="Saiha">Saiha</option>
        <option value="Salem">Salem</option>
        <option value="Samastipur">Samastipur</option>
        <option value="Samba">Samba</option>
        <option value="Sambalpur">Sambalpur</option>
        <option value="Sangli">Sangli</option>
        <option value="Sangrur">Sangrur</option>
        <option value="SantKabirNagar">Sant Kabir Nagar</option>
        <option value="SantRavidasNagar">Sant Ravidas Nagar</option>
        <option value="Saran">Saran</option>
        <option value="Satara">Satara</option>
        <option value="Satna">Satna</option>
        <option value="SawaiMadhopur">Sawai Madhopur</option>
        <option value="Sehore">Sehore</option>
        <option value="Senapati">Senapati</option>
        <option value="Seoni">Seoni</option>
        <option value="SeraikelaKharsawan">Seraikela Kharsawan</option>
        <option value="Serchhip">Serchhip</option>
        <option value="Shahdol">Shahdol</option>
        <option value="Shahjahanpur">Shahjahanpur</option>
        <option value="Shajapur">Shajapur</option>
        <option value="Shamli">Shamli</option>
        <option value="Sheikhpura">Sheikhpura</option>
        <option value="Sheohar">Sheohar</option>
        <option value="Sheopur">Sheopur</option>
        <option value="Shimla">Shimla</option>
        <option value="Shimoga">Shimoga</option>
        <option value="Shivpuri">Shivpuri</option>
        <option value="Shopian">Shopian</option>
        <option value="Shravasti">Shravasti</option>
        <option value="Sibsagar">Sibsagar</option>
        <option value="Siddharthnagar">Siddharthnagar</option>
        <option value="Sidhi">Sidhi</option>
        <option value="Sikar">Sikar</option>
        <option value="Simdega">Simdega</option>
        <option value="Sindhudurg">Sindhudurg</option>
        <option value="Singrauli">Singrauli</option>
        <option value="Sirmaur">Sirmaur</option>
        <option value="Sirohi">Sirohi</option>
        <option value="Sirsa">Sirsa</option>
        <option value="Sitamarhi">Sitamarhi</option>
        <option value="Sitapur">Sitapur</option>
        <option value="Sivaganga">Sivaganga</option>
        <option value="Siwan">Siwan</option>
        <option value="Solan">Solan</option>
        <option value="Solapur">Solapur</option>
        <option value="Sonbhadra">Sonbhadra</option>
        <option value="Sonipat">Sonipat</option>
        <option value="Sonitpur">Sonitpur</option>
        <option value="South24Parganas">South 24 Parganas</option>
        <option value="SouthDelhi">South Delhi</option>
        <option value="SouthGaroHills">South Garo Hills</option>
        <option value="SouthGoa">South Goa</option>
        <option value="SouthSikkim">South Sikkim</option>
        <option value="SouthTripura">South Tripura</option>
        <option value="SouthWestDelhi">South West Delhi</option>
        <option value="SriMuktsarSahib">Sri Muktsar Sahib</option>
        <option value="Srikakulam">Srikakulam</option>
        <option value="Srinagar">Srinagar</option>
        <option value="Subarnapur(Sonepur)"> Subarnapur (Sonepur) </option>
        <option value="Sultanpur">Sultanpur</option>
        <option value="Sundergarh">Sundergarh</option>
        <option value="Supaul">Supaul</option>
        <option value="Surat">Surat</option>
        <option value="Surendranagar">Surendranagar</option>
        <option value="Surguja">Surguja</option>
        <option value="Tamenglong">Tamenglong</option>
        <option value="TarnTaran">Tarn Taran</option>
        <option value="Tawang">Tawang</option>
        <option value="TehriGarhwal">Tehri Garhwal</option>
        <option value="Thane">Thane</option>
        <option value="Thanjavur">Thanjavur</option>
        <option value="TheDangs">The Dangs</option>
        <option value="Theni">Theni</option>
        <option value="Thiruvananthapuram">Thiruvananthapuram</option>
        <option value="Thoothukudi">Thoothukudi</option>
        <option value="Thoubal">Thoubal</option>
        <option value="Thrissur">Thrissur</option>
        <option value="Tikamgarh">Tikamgarh</option>
        <option value="Tinsukia">Tinsukia</option>
        <option value="Tirap">Tirap</option>
        <option value="Tiruchirappalli">Tiruchirappalli</option>
        <option value="Tirunelveli">Tirunelveli</option>
        <option value="Tirupur">Tirupur</option>
        <option value="Tiruvallur">Tiruvallur</option>
        <option value="Tiruvannamalai">Tiruvannamalai</option>
        <option value="Tiruvarur">Tiruvarur</option>
        <option value="Tonk">Tonk</option>
        <option value="Tuensang">Tuensang</option>
        <option value="Tumkur">Tumkur</option>
        <option value="Udaipur">Udaipur</option>
        <option value="Udalguri">Udalguri</option>
        <option value="UdhamSinghNagar">Udham Singh Nagar</option>
        <option value="Udhampur">Udhampur</option>
        <option value="Udupi">Udupi</option>
        <option value="Ujjain">Ujjain</option>
        <option value="Ukhrul">Ukhrul</option>
        <option value="Umaria">Umaria</option>
        <option value="Una">Una</option>
        <option value="Unnao">Unnao</option>
        <option value="UpperSiang">Upper Siang</option>
        <option value="UpperSubansiri">Upper Subansiri</option>
        <option value="UttarDinajpur">Uttar Dinajpur</option>
        <option value="UttaraKannada">Uttara Kannada</option>
        <option value="Uttarkashi">Uttarkashi</option>
        <option value="Vadodara">Vadodara</option>
        <option value="Vaishali">Vaishali</option>
        <option value="Valsad">Valsad</option>
        <option value="Varanasi">Varanasi</option>
        <option value="Vellore">Vellore</option>
        <option value="Vidisha">Vidisha</option>
        <option value="Viluppuram">Viluppuram</option>
        <option value="Virudhunagar">Virudhunagar</option>
        <option value="Visakhapatnam">Visakhapatnam</option>
        <option value="Vizianagaram">Vizianagaram</option>
        <option value="Vyara">Vyara</option>
        <option value="Warangal">Warangal</option>
        <option value="Wardha">Wardha</option>
        <option value="Washim">Washim</option>
        <option value="Wayanad">Wayanad</option>
        <option value="WestChamparan">West Champaran</option>
        <option value="WestDelhi">West Delhi</option>
        <option value="WestGaroHills">West Garo Hills</option>
        <option value="WestKameng">West Kameng</option>
        <option value="WestKhasiHills">West Khasi Hills</option>
        <option value="WestSiang">West Siang</option>
        <option value="WestSikkim">West Sikkim</option>
        <option value="WestSinghbhum">West Singhbhum</option>
        <option value="WestTripura">West Tripura</option>
        <option value="Wokha">Wokha</option>
        <option value="Yadgir">Yadgir</option>
        <option value="YamunaNagar">Yamuna Nagar</option>
        <option value="Yanam">Yanam</option>
        <option value="Yavatmal">Yavatmal</option>
        <option value="Zunheboto">Zunheboto</option>

    </select>
    </div>

    <label class="control-label col-lg-2" for="freelance">Ready To Work As a Freelancer? -</label>
    <div class="col-lg-4">
        <select class="form-control" id="freelance" name="freelance">
            <option>Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            
        </select>    </div>
</div>
    
<br>
               
<br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="device">Device Available -</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="device" name="device">
                            <option>Select</option>
                            <option value="laptop">Laptop</option>
                            <option value="desktop">Desktop</option>
                            
                        </select>
                       
                    </div>
                     

                    <label class="control-label col-sm-2" for="type_ofjob">Type of Job -</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="type_ofjob" name="type_ofjob" >
                            <option>Select</option>
                            <option value="on-site">On Site</option>
                            <option value="remote">Remote</option>
                            <option value="hybrid">Hybrid </option>
                            
                        </select>
                    </div>
                </div>
<br>
<br>
<div class="form-group">
    <label class="control-label col-sm-2" for="date_of_join">Joining Date -</label>
    <div class="col-sm-4">
        <input type="date"   class="form-control" id="date_of_join" name="date_of_join">
    </div>

    <label class="control-label col-lg-2" for="linkedin">Linkedin -</label>
    <div class="col-lg-4">
        <input type="text" class="form-control" id="linkedin" name="linkedin">
    </div>
</div>
<br>

<div class="form-group">
    <label class="control-label col-sm-2" for="rate">Rate Per Hour -</label>
    <div class="col-lg-4">
    <select name="rateph" class="form-control">
            <option value="">select</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="175">175</option>
            <option value="200">200</option>
            <option value="250">250</option>


            
        </select>    </div>

    <label class="control-label col-sm-2" for="resource-type">Type of Resource -</label>
    <div class="col-sm-4">
    <select class="form-control" name="resource-type" required id="resource-type">
            <option>Select</option>
            <option value="IT">I.T</option>
            <option value="Non-IT">Non I.T</option>
            
            
            </select>
       
    </div>
</div>
                

                
<br>
                
<br>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="file-upload">Upload Resume -</label>
                    <div class="col-sm-4">
                    <input type="file" accept=".doc,.rtf,.docx,.pdf" id="file-upload" name="upcv" required style="width:100%;border:none;border-radius:5px;color:white;color: transparent; " />
                    </div>

                    <label class="control-label col-sm-2" for="linkedin">Upload Picture -</label>
                    <div class="col-sm-4">
                    <input type="file" required name="pic" id="pic" style="width:100%;border:none;border-radius:5px;" accept=".jpg,.png,.jpeg" />
                    </div>
                </div>
                       


                <div class="submit">
                   
                        <button type="submit" name="upload" >Submit</button>
                   
                </div>

            </form>
</div>
      </div>
       
    </main>

    <script>
    
        
        </script>

</body>
</html>
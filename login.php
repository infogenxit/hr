<?php
require('dbconnection.php');
session_start();

if(isset($_SESSION['IS_LOGIN'])){
	header('location:dashboard.php');
	die();
}
if(isset($_REQUEST['signup'])) {
    header('location:signup.php');
}
if(isset($_REQUEST['submit'])){

    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
	$res=mysqli_query($con,"select * from `log-cred` where email ='$email'");
	
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$verify=password_verify($password,$row['password']);

		if($verify==1) {
            $_SESSION['IS_LOGIN']=true;
			$_SESSION['recruiter']=$row['employee_id'];
			header('location:dashboard.php');
			die();

		}else{

            ?><script type="text/javascript">alert("Password Dosen't match");</script><?php   		}
	}
    else{

        ?><script type="text/javascript">alert("Username Dosen't match");</script><?php   	}
	
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
</head>
<body>
    <div class="main">
        
    <div class="backdrop">
    </div>
    <div class="login_wrapper">
        <div class="form-wrapper" style="padding-top: 25px;">
            <img src="https://infogenx.com/productspg/img/logo/logo.png" alt="logo" class="logo-sty" width="250" style="margin-left: -15px;">
            <h5 class="link-wrapper">IGX-Human Resource Management</h5>
            <br>
            <form class="login-form" method="post">
                <label>Email </label>
                <input type="text" name="email" id="user-input" class="log-inputs" placeholder="Enter Email">
                <br>
                <label>Password  </i></label>
                <input type="Password" name="password" id="pass-input" class="log-inputs" placeholder="Enter Password">
                <div class="button-wrapper">
                    <button class="log-btn" type="submit" name="submit">Login</button>
                    <button class="log-btn signup" name="signup" >Signup</button>
                </div>
            </form>
        </div>
        <div class="asset-wrapper">
           <img class="login-vector" src="assets/Computer login-rafiki.png" />
        </div>
    </div>
</div>
</body>
</html>
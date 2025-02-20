<?php
require("dbconnection.php");
if(isset($_REQUEST["submit"]))
	{
        $fname = $_REQUEST["fname"];
        $lname = $_REQUEST["lname"];
        $email = $_REQUEST["email"];
        $pass = $_REQUEST["password"];

        $pages = range(100000,900000);
        // Shuffle numbers
        shuffle($pages);
        // Get a page
        $hrid = array_shift($pages);

        if( $fname !== "" && $lname !== "" && $email  !=="" && $pass !=="" ){

        if(mysqli_num_rows(mysqli_query($con,"select * from `log-cred` where email='$email'"))>0){
             
            echo "Userame already present"; 
        }
        else{

            $password=password_hash($pass,PASSWORD_DEFAULT);
		    $res=mysqli_query($con,"insert into `log-cred` (name,email,password,employee_id) values('$fname $lname','$email','$password','$hrid')");

            if($res)
            {
                header('location:login.php');
            }
            else{

                ?><script type="text/javascript">alert("Please try again");</script><?php             }

        }
    }
    else{

        ?><script type="text/javascript">alert("Please Fill all the fields correctly");</script><?php      
    }

    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        
    <div class="backdrop">
    </div>
    <div class="backdrop-oval">
    </div>
    <div class="signup_wrapper">
        <div class="form-wrapper" style="padding-top: 25px;">
            <img src="https://infogenx.com/productspg/img/logo/logo.png" alt="logo" class="logo-sty" width="250" style="margin-left: -15px;">
            <h5 class="link-wrapper">IGX-Human Resource Management</h5><br>
            <form class="signup-form" action="" method="post">
            <input type="text" name="fname"  class="signup-inputs" placeholder="First Name ">
            <br>
            <input type="text" name="lname"  class="signup-inputs" placeholder="Last Name ">
            <br>
            <input type="email" name="email"  class="signup-inputs" placeholder="Email Address">
            <br>
            <input type="Password" name="password" class="signup-inputs" placeholder="Password">
            <div class="button-wrapper">
                <button class="log-btn" name="submit">Signup</button>
                <div class="link-wrapper">
                    <h5>Already a Member?<a href="./login.php"> Login Instead </a> </h5>
                    <h4>Forgot Password ?</h4>
                </div>
            </div>
            
            </form>
        </div>
        <div class="asset-wrapper">
           <img class="login-vector" src="assets/Sign up-rafiki.png" />
        </div>
    </div>
</div>
</body>
</html>
<?php
require('dbconnection.php');
session_start();



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
    <title>Document</title>
</head>
<body>
    <div class="main">
        
    <div class="backdrop">
    </div>
    <div class="backdrop-oval">
    </div>
    <div class="resource-container">

<form action="filter-results.php" id="resource-filter-form" method="post">
    <!-- dropdown -->
    <div class="resource-element">
        <label class="resource-label" for="type">Type of Resource
        </label>
        <select name="resource_type" class="resource-select">
            <option value="">select</option>
            <option value="it">It</option>
            <option value="non-it">Non I.T</option>
        </select>
    </div>

    <!-- dropdown -->
    <div class="resource-element">
        <label class="resource-label" for="type">Type of Employment
        </label>
        <select name="employment_type" class="resource-select">
            <option value="">select</option>
            <option value="freelance_ft">Freelancer(Full Time)</option>
            <option value="freelance_pt">Freelancer(Part Time)</option>
            <option value="permanent_ft">Permanant Employee(Full Time)</option>
            <option value="permanent_pt">Permanant Employee(Part Time)</option>
            <option value="intern">Intern</option>
        </select>
    </div>

    <!-- dropdown -->
    <div class="resource-element">
        <label class="resource-label" for="type">Type of Developer
        </label>
        <select class="resource-select" name="developer_type"  id="filter_developer_type">

            <option value=''>Select</option>
            <option value="webdev">Web Developer</option>
            <option value="mobiledev">Mobile Developer</option>
            <option value="uidev">Ui Developer</option>
            
            
    </select>
    <select class="resource-select" name="skillset"  id="filter_skillset">
            <option value=''>Select</option>
            
            
            
            </select>
    </div>

    <div class="resource-element">
        <label class="resource-label" for="type">Experience
        </label>
        <select name="experience" class="resource-select">
       <option value="">Select</option>
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
    <div class="resource-element">
        <label class="resource-label" for="type">Rate Per Hour(In Rupees)
        </label>
        <select name="rateph" class="resource-select">
            <option value="">select</option>
            <option value="50-100">50-100</option>
            <option value="100-150">100-150</option>
            <option value="150-200">150-200</option>
            <option value="200-250">200-250</option>


            
        </select>
    </div>

   <div class="filter-btn-wraper">
        <button type="submit">Search</button>
</div>
</form>

</div>
</div>
</body>
</html>
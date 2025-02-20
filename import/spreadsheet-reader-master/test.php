<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */
	header('Content-Type: text/plain');

	if (isset($argv[1]))
	{
		$Filepath = $argv[1];
	}
	elseif (isset($_GET['File']))
	{
		$Filepath = $_GET['File'];
	}
	else
	{
		if (php_sapi_name() == 'cli')
		{
			echo 'Please specify filename as the first argument'.PHP_EOL;
		}
		else
		{
			echo 'Please specify filename as a HTTP GET parameter "File", e.g., "/test.php?File=test.xlsx"';
		}
		exit;
	}

	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');

	date_default_timezone_set('UTC');

	$StartMem = memory_get_usage();
	echo '---------------------------------'.PHP_EOL;
	echo 'Starting memory: '.$StartMem.PHP_EOL;
	echo '---------------------------------'.PHP_EOL;

	try
	{
		$Spreadsheet = new SpreadsheetReader($Filepath);

		$Sheets = $Spreadsheet -> Sheets();

		echo '---------------------------------'.PHP_EOL;
		echo 'Spreadsheets:'.PHP_EOL;
		print_r($Sheets);
		echo '---------------------------------'.PHP_EOL;
		echo '---------------------------------'.PHP_EOL;

		foreach ($Sheets as $Index => $SheetName)
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
						$qualification = $Row[4];
					}
					if (isset($Row[5])) {
						$skills = $Row[5];
					}
					if (isset($Row[6])) {
						$location = $Row[6];
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

					$res = mysqli_query($con, 
						"INSERT INTO `resources`(`sheetName`, `name`, `mobile`, `email`, `location`, `qualification`, `skills`, `location`, `workExperience`, `linkedinURL`, `resume`, `currentRole`, `currentCompany`, `gender`, `languageKnown`, `noticePeriod`, `serviceNoticePeriod`, `expectedCtc`, `currentCtc`, `hourlyRate`, `weekend`, `partTimeOrFullTime`, `computer`, 'canJoinImmediately', `appliedDate`, `contactedDate`, `contactedBy`, `status`, `remark`) VALUES ('$SheetName', '$name', '$mobile','$email','$location','$qualification', '$location', '$workExperience', '$linkedinURL', '$resume', '$currentRole', '$currentCompany', '$gender', '$languageKnown', '$noticePeriod', '$serviceNoticePeriod', '$expectedCtc', '$currentCtc', '$hourlyRate', '$weekend', '$partTimeOrFullTime', '$computer', '$canJoinImmediately', '$appliedDate', '$contactedDate', '$contactedBy', '$status', '$remark')");
                    if($res) {
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
		}
	}

	catch (Exception $E)
	{
		echo $E -> getMessage();
	}
?>

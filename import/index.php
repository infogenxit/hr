<?php
$con=mysqli_connect('localhost','root','','hrapp');
if(isset($_POST['submit'])){
	$file=$_FILES['doc']['tmp_name'];
	
	$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
	if($ext=='xls'){
		require('PHPExcel/PHPExcel.php');
		require('PHPExcel/PHPExcel/IOFactory.php');
		
		
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
					$res = mysqli_query($con,"INSERT INTO`resources`(`name`, `resource_id`, `mobile`, `email`, `location`, `address`, `experience in relevant field`, `work experience`, `skills`, `developer-type`, `developer-skillset`, `graduation-course`, `graduation-type`, `resume`, `picture`, `current role`, `current company`, `notice period`, `current ctc`, `work_location`, `freelance ready`, `device available`, `type of job`, `joining date`, `linkedin`, `rate per-hour`, `resource_type`, `recruiter`, `shortlist_status`, `project_assigned`) values('$name','$resource_id','$mobile','$email','$location','$address','$experience_field','$work_experience','$skills','$developer_type','$skillset','$graduation_course','$graduation_type','$resume','$picture','$current_role','$current_company','$notice_period','$current_ctc','$work_location','$freelance','$device','$job_type','$joining_date','$linkedin','$rate','$resource_type','$recruiter','$shortlist_status','$project_assigned')");
				}
			}
		}
	}
	else{
		echo "Invalid file format";
	}
}
?>
<form method="post" enctype="multipart/form-data">
	<input type="file" name="doc"/>
	<input type="submit" name="submit"/>
</form>
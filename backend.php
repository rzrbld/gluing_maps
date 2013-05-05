<?php
include('config.php');
include('class.php');

switch (@$_GET['action']) {
	case 'getImage':
		//filter
		$width=PCREFunctions::inputFilter($_GET['width'],'num');
		$height=PCREFunctions::inputFilter($_GET['height'],'num');
		$size=PCREFunctions::inputFilter($_GET['size'],'num');

		$key=PCREFunctions::inputFilter($_GET['key'],'key');
		$centerN=PCREFunctions::inputFilter($_GET['centerN'],'coords');
		$centerE=PCREFunctions::inputFilter($_GET['centerE'],'coords');
		$zoom=PCREFunctions::inputFilter($_GET['zoom'],'num');
		$scale=PCREFunctions::inputFilter($_GET['scale'],'num');
		$ctocE=PCREFunctions::inputFilter($_GET['ctocE'],'coords');
		$ctocN=PCREFunctions::inputFilter($_GET['ctocN'],'coords');

		//get calculation
		$calcResult=MapConstructor::calculateImage($width,$height,$size);
		$cols=$calcResult['cols'];
		$queries=$calcResult['queries'];

		//echo "$width,$height,$size,$key,$centerN,$centerE,$zoom,$scale,$ctocE,$ctocN,$queries,$cols<br>";
		//make a map
		$ImageUrl=MapConstructor::makeImage($width,$height,$size,$key,$centerN,$centerE,$zoom,$scale,$ctocE,$ctocN,$queries,$cols);
		echo $ImageUrl;
		break;
	case 'getPreview':
		$size=PCREFunctions::inputFilter($_GET['size'],'num');
		$key=PCREFunctions::inputFilter($_GET['key'],'key');
		$centerN=PCREFunctions::inputFilter($_GET['centerN'],'coords');
		$centerE=PCREFunctions::inputFilter($_GET['centerE'],'coords');
		$zoom=PCREFunctions::inputFilter($_GET['zoom'],'num');
		$scale=PCREFunctions::inputFilter($_GET['scale'],'num');

		$ImageUrl=MapConstructor::getPreview($size,$key,$centerN,$centerE,$zoom,$scale);
		echo "$ImageUrl";
		break;
	case 'getMenu':
		if(empty($_GET['zoom'])){
			$zoom=16;
		}else{
			$zoom=PCREFunctions::inputFilter($_GET['zoom'],'num');
		}
		echo "<script>";
		if(empty($config['Menu']['zoom'][$zoom])){
			echo "alert('ther is no center to center values for this zoom, value set to default');";
			$zoom=16;
		}
		foreach ($config['Default'] as $key => $value) {
			if($key=='zoom'){
				$value=$zoom;
			}
			echo "$('#".$key."').val('".$value."');";
		}

		foreach ($config['Menu']['zoom'][$zoom] as $key => $value) {
			echo "$('#".$key."').val('".$value."');";
		}
		echo "</script>";
		break;
	default:
		die('// Unexpected action, dunno what to do.');
		break;
}

?>
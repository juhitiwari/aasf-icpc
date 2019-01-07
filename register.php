<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();
	include('dbcon.php');
	$team = $_POST['teamName'];
	$fn = $_POST['fMem'];
	$fd = $_POST['fDet'];
	$fy = $_POST['fYear'];
	$sn = $_POST['sMem'];
	$sd = $_POST['sDet'];
	$sy = $_POST['sYear'];
	
	$tn = ""; $td = "";$ty="";
	
	if(isset($_POST['tMem'])){
		$tn = $_POST['tMem'];
	}
	else
		$tn = "-1";
	if(isset($_POST['tDet'])){
		$td = $_POST['tDet'];
	}
	else
		$td = "-1";
	if(isset($_POST['tYear'])){
		$ty = $_POST['tYear'];
	}
	else
		$ty = "-1";
		
	$email = $_POST['email'];
	
	//echo $team." ".$fn." ".$fd." ".$fy." ".$sn." ".$sd." ".$sy." ".$tn." ".$td." ".$ty." ".$email;
	
	$fd = $fd."".$fy;
	$sd = $sd."".$sy;
	$td = $td."".$ty;
	$team = strtolower($team);
	$qr = "SELECT * FROM `teams` WHERE `name` = '".$team."'";
	//$rr = mysql_query($qr);
	$result = $con->query($qr);
		$c = 0;
					while($row = $result->fetch_assoc()){
						$c = $c + 1;
					}

	
	
	if($c == 0){
		$q = "INSERT INTO `teams` (`name`, `fname`, `frol`, `sname`, `srol`, `tname`, `trol`, `email`, `verified`) VALUES('".$team."', '".$fn."','".$fd."', '".$sn."', '".$sd."', '".$tn."', '".$td."', '".$email."', '0')";
		//$result = mysql_query($q);
		    $result = $con->prepare($q);

		    if($con->query($result)==TRUE) {

		    }
		    else{
		    	echo "yo";
		    }
		    	
		$_SESSION['res'] = 1;
		    
	}
	else{
		$_SESSION['res'] = 0;
	}
		
	header('location:index.php');
?>
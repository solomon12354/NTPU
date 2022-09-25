<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=”viewport” content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>國立台北大學法案公告</title>
    <style>
    .outer {
  	background-color: #95afba;
    }
    .inner {
  	background-color: #d5e1a3;
  	display: flex; 
  	height: 300px;
  	align-items: center; 
	text-align: center;
    }
    .button { background-color: #4CAF50; 
		
		color: white; 
		padding: 16px 600px; 
		
		text-decoration: none; 
		display: block; 
		font-size: 32px; 
		margin: 8px 2px; 
		width: auto;
		
		
		overflow : hidden;
		text-overflow : ellipsis;
		white-space : nowrap;
		max-width: 30ch;
	}
    .myTitle {
		color: white; 
		padding: 16px 60%; 
		text-align: center; 
		text-decoration: none; 
		display: block; 
		font-size: 32px; 
		margin: 8px 2px; 
		width: auto;
		
		
		overflow : hidden;
		text-overflow : ellipsis;
		white-space : nowrap;
		max-width: 13ch;
	}
    .a{
    	text-decoration:none;
    }
    a:hover{text-decoration:none}
    </style>
</head>
    <CENTER><head> <h1><B><a href='index.php'>國立台北大學法案公告</a></B></h1> </head></CENTER>
    <?php
	require_once "conn.php";
	function injectProtection($str) {
  		$str = str_replace("<script>","", $str);
		$str = str_replace("</script>","", $str);
		$str = str_replace("<?php","", $str);
		$str = str_replace("?>","", $str);
		$str = strip_tags($str);
		return $str;
	}
	$query = "SELECT * FROM law_text Order by No DESC";
	$result = $conn -> query($query);
	session_start();
	$_SESSION['Lawname'] = addslashes($_POST['Lawname']);
	$_SESSION['date'] = $_POST['date'];
	$str = addslashes($_POST['context']);
	$date = $_POST['date'];
	$str = injectProtection($str);
	
	$_SESSION['context'] = $str;
	if(!empty($_POST)){
		//INSERT INTO `law_text` (`No`, `Date`, `Title`, `Text`) VALUES ('1324', '2022-09-13', 'r2r3', 'gerwgr');
		$number = $result->num_rows;
		$insert = "INSERT INTO law_text VALUES (" . $number . ", '" . $_SESSION["date"] . "' ," . $_SESSION["Lawname"] . ",\"" . $_SESSION["context"] . "\")";
		echo $insert;
		mysqli_query($conn,$insert);
	}
	if(isset($_SESSION["Lawname"])) echo $_SESSION["Lawname"] . "<br>";
	if(isset($_SESSION["date"])) echo $_SESSION["date"] . "<br>";
	if(isset($_SESSION["context"])) echo $_SESSION["context"] . "<br>";
	if(isset($_SESSION["submit"])) echo $_SESSION["submit"] . "<br>";
	if (count($_SESSION) > 0) {
		
   		$_SESSION = array();
	}
	if (count($_POST) > 0) {
		
   		$_POST = array();
	}//
    ?>
    <CENTER>
    
    </CENTER>
</html>
<script>window.location.href='input.php';</script>
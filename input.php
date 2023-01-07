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
		padding: 16px 600px; 
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
	$query = "SELECT * FROM law_text Order by No DESC";
	$result = $conn -> query($query);
	session_start();
	if(isset($_POST['Lawname'])){
		$_SESSION['Lawname'] = addslashes($_POST['Lawname']);
		$_SESSION['date'] = addslashes($_POST['date']);
		$_SESSION['context'] = addslashes($_POST['context']);
	}
	
	if(!empty($_SESSION)){
		$number = $result->num_rows;
		$insert = "INSERT INTO law_text VALUES (" . $number . ", '" . $_SESSION["date"] . "' ,'" . $_SESSION["Lawname"] . "',\"" . $_SESSION["context"] . "\")";
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
    ?>
    <CENTER>
    <form method="post" action="sendToBase.php">
        <input type="text" name="Lawname" placeholder="法條名字" size="70" required="required"><br>
	發布日期: <input type="date" name="date" placeholder="發布日期" min="1949-01-01" max="<?php echo date("Y-m-d") ?>" required="required"></input><br>
        <textarea name="context" placeholder="法條內容" rows="50" cols="70" resize="none" required="required"></textarea><br>
	<input type="hidden" name="send" value="send">
        <input type="submit" name="submit" value="送出" onclick="sendToBase.php"></input>
	
    </form>
    </CENTER>
</html>

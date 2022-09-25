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
		width: 70%;
		 
		text-align: left;
		padding-left: 10;
		text-decoration: none; 
		display: block; 
		font-size: 50px; 
		margin: 8px 2px; 
		width: auto;
		
		
		overflow : hidden;
		text-overflow : ellipsis;
		white-space : nowrap;
		max-width: 80%;
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
		max-width: 80ch;
	}
    .a{
    	text-decoration:none;
    }
    a:hover{text-decoration:none}
    </style>
</head>
    <CENTER><head> <h1><B><a href='index.php'>國立台北大學法案公告</a></B></h1> </head></CENTER>
    <br><br>
    <?php
	$page = 1;
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
	
	
    ?>
    <CENTER>
    <div style="border-width: 3px; border-style:solid ; width: auto;  border-color: rgb(0, 0, 0); padding: 5px; max-width: 80%;"><article-content>
    <?php
	$numberPerPage = 10;
	require_once "conn.php";
	$query = "SELECT * FROM law_text Order by No DESC";
	//$query = "SELECT * FROM law_text";
	$result = $conn -> query($query);
	$stack = array();
	while($row = $result->fetch_assoc()){
		array_push( $stack, $row );
	}
	$num = mysqli_num_rows($result);
	//$row = $result->fetch_assoc();
	$counter = 0;
	for ($i = $numberPerPage*($page-1); $i < ($numberPerPage*($page-1) + $numberPerPage) && $i < $num; $i++ ) {	
    ?>
		<CENTER><a href='text.php?No=<?php echo $stack[$i]['No']; ?>' class="button" name="No" title="<?php echo $stack[$i]['Title']; ?>"><LEFT> <?php echo $stack[$i]['Title']; ?></LEFT><br></a></CENTER><br>
    <?php
	$counter++;
	}
	if($counter == 0){
    ?>
	<CENTER><h2><B><a>抱歉，找不到該網頁。</a></B></h2></CENTER>
    <?php }?>
    </article-content>
    </div>
    </CENTER>
    <br><br><br><br><CENTER>頁面:<select onchange="javascript:location.href=this.value;" selected="selected" >
	<option value="" selected disabled hidden><?php echo $page;?></option>
    <?php
    	for($i = 1; $i < $num/$numberPerPage +1 ; $i++){
		if($i != $page){
    ?>
	<option name="page" value = "<?php echo "index.php?page=" . $i ;?>"><?php echo $i;?></option>
    <?php } }?>
    </select>
    <CENTER>
</html>

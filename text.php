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
		border: 1px; 
		color: white; 
		padding: 32px 900px; 
		text-align: center; 
		text-decoration: none; 
		display: inline-block; 
		font-size: 32px; 
		margin: 8px 2px; 
		cursor: pointer;
		position: static;
		
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
		word-break: break-all;
		word-wrap: break-word;
	}
	.article-content{
		font-size:15px;
		line-height:25px;
		word-wrap:break-word;
		text-indent:2em;}
    .a{
    	text-decoration:none;
    }
    a:hover{text-decoration:none}
    .option{
      width:150px;   
    }
    </style>
</head>
<CENTER><head> <h1><B><a href='index.php' position='absolute'>國立台北大學法案公告</a></B></h1> </head></CENTER><br><br>
<?php
	require_once "conn.php";
	$law = $_GET['No'];
	
	$law = addslashes($law);
	$query = "SELECT * FROM law_text WHERE No = " . $law . " ;";
	$result = $conn -> query($query);
	$row = $result->fetch_assoc();
	
	
	function tab2space($line, $tab = 4, $nbsp = FALSE) {
    		while (($t = mb_strpos($line,"\t")) !== FALSE) {
        		$preTab = $t?mb_substr($line, 0, $t):'';
        		$line = $preTab . str_repeat($nbsp?chr(7):' ', $tab-(mb_strlen($preTab)%$tab)) . mb_substr($line, $t+1);
    		}
    		return  $nbsp?str_replace($nbsp?chr(7):' ', '&nbsp;', $line):$line;
	}
	if($result->num_rows > 0){
?>
    <CENTER><head> <h1><B><myTitle><?php echo $row['Title'];?></B></myTitle></h1> </head></CENTER>
    <CENTER><head> <h2>發布日期:<?php echo $row['Date'];?></h2> </head></CENTER>
    <CENTER>
    <div style="border-width: 3px; border-style:solid ; width: auto;  border-color: rgb(255, 172, 85); padding: 5px; max-width: 80%;"><article-content>
    <?php
	echo tab2space(nl2br($row['Text']));
    ?>
    </article-content>
    </div>
    <?php
	}else{
    ?>
    <CENTER><head> <h1><B><myTitle><?php echo "抱歉，找不到該法條。";?></B></myTitle></h1> </head></CENTER>
    <CENTER>
    <div style="border-width: 3px; border-style:solid ; width: 1200px;  border-color: rgb(255, 172, 85); padding: 5px; "><article-content>
    <CENTER><head> <h1><B><myTitle><?php echo "10秒後返回主頁...";?></B></myTitle></h1> </head></CENTER>
    <script>setTimeout("javascript:location.href='index.php'", 10000);
	    
    </script>
    </article-content>
    </div>
    </CENTER>
    <?php
	}
    ?>
    <script>
    function jump(){
        	
    	    };
    </script>
    <CENTER><input type="button" value="回到上頁" onclick="javascript:history.back()"></CENTER>
    </CENTER>
    
</html>

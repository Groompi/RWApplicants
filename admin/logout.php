<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
$Username = $_SESSION['Username'];
$ID = $_SESSION['ID'];
include('./include/nav.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCRW: Home Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-extensions.css" rel="stylesheet"> 
  </head>

<body>

	<?php


	if($Username && $ID){
		echo $naviYes;
		echo "you have been logged out. <a href='./index.php'>Home</a>";
		session_destroy();
	}else{
		echo $naviNo;
		echo "you are not logged in. <a href='./index.php'>Click Here</a> to login";
	}

	?>
</body>

</html>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo basename($_SERVER['PHP_SELF']);?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/main.js"></script>

</head>
<body>
<div class="contianer">
<ul class="main-nav">
	<li class="left"><a href="index.php"><img src="../img/logo.png"  height="20" width="30"></a></li>
	<li class="left" id="title">BOOK EVERY WEEK</li>
<?php if(basename($_SERVER['PHP_SELF']) ==="index.php" ):?>
	<li class="right"><a href="contact.php">Contat Us</a></li>
	<li class="right"><a href="articles.php">Articles</a></li>
	<li class="right"><a href="login.php">Log in</a></li>
<?php elseif(basename($_SERVER['PHP_SELF']) ==="user.php"  ):?>
	<li class="right"><a href="logout.php">logOut</a></li>
<?php elseif(basename($_SERVER['PHP_SELF']) ==="articles.php"  ):?>
	<li class="right"><input id="search" type="text" name="search" placeholder="Search for .. "></li>
	<li class="right"><button id="btn-search">Search</button></li>
<?php endif;?>
</ul>
<!--<div class="clear"></div> -->




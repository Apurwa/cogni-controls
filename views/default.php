<!DOCTYPE HTML>
<html>
<head>
	<title>Controls - Cognizance, IIT Rookee</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="public/css/main.css" />
	<script type="text/javascript" src="public/js/jquery-1.12.1.min.js"></script>
	<script type="text/javascript" src="public/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="/public/images/favicon.ico" />
</head>
<body>
<div id="header" class="col-sm-12">
	<h3 class="col-sm-6"><a href="/">Controls, Cognizance IIT Roorkee</a></h3>
	<?php if ( isset($_SESSION['admin']) && $_SESSION['admin'] ){ ?>
		<h4 class="col-sm-offset-2 col-sm-1"><a href="/manage?control_num=1">Control-1</a></h4>
		<h4 class="col-sm-1"><a href="/manage?control_num=2">Control-2</a></h4>
		<h4 class="col-sm-1"><a href="/manage?control_num=3">Control-3</a></h4>
		<h4 class="	col-sm-1"><a href="/logout">Logout</a></h4>
	<?php } elseif (isset($_SESSION['control_num'])){ ?>
		<h4 class="col-sm-offset-5 col-sm-1"><a href="/logout">Logout</a></h4>
	<?php } ?>
</div>

<div id="page" class="container">
	<?php echo $content; ?>
</div>

<div id="footer" class="col-sm-12">
	<span><a href="https://github.com/Apurwa/cogni-controls" target="_blank">source</a></span>
</div>
</body>
</html>